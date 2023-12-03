<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\User;
use Illuminate\Support\Facades\Mail;
use PDF;
use Notification;
use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;
use App\emails\OrderConfirmationMail;
use PDFDom;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Dompdf\Dompdf;
use Dompdf\Options;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::orderBy('id','DESC')->paginate(10);
        return view('backend.order.index')->with('orders',$orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'address1' => 'string|required',
            'address2' => 'string|nullable',
            'coupon' => 'nullable|numeric',
            'phone' => 'numeric|required',
            'post_code' => 'string|nullable',
            'email' => 'string|required',
            'selected_size' => 'nullable|array',
        ]);

        if (empty(Cart::where('user_id', auth()->user()->id)->where('order_id', null)->first())) {
            request()->session()->flash('error', 'Cart is Empty!');
            return back();
        }

        $order = new Order();

        $order_data = $request->all();
        $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
        $order_data['user_id'] = $request->user()->id;
        $order_data['shipping_id'] = $request->shipping;
        $shipping = Shipping::where('id', $order_data['shipping_id'])->pluck('price');
        $order_data['sub_total'] = Helper::totalCartPrice();
        $order_data['quantity'] = Helper::cartCount();
        $order_data['selected_size'] = json_encode($request->input('selected_size'));
        $selectedSizes = [];



        foreach (Helper::getAllProductFromCart() as $cart) {
            $selectedSizes[] = $cart->selected_size;
        }
        $order_data['selected_size'] = implode(', ', $selectedSizes);




        if (session('coupon')) {
            $order_data['coupon'] = session('coupon')['value'];
        }

        if ($request->shipping) {
            if (session('coupon')) {
                $order_data['total_amount'] = Helper::totalCartPrice() + $shipping[0] - session('coupon')['value'];
            } else {
                $order_data['total_amount'] = Helper::totalCartPrice() + $shipping[0];
            }
        } else {
            if (session('coupon')) {
                $order_data['total_amount'] = Helper::totalCartPrice() - session('coupon')['value'];
            } else {
                $order_data['total_amount'] = Helper::totalCartPrice();
            }
        }

        $order_data['status'] = "new";

        if (request('payment_method') == 'paypal') {
            $order_data['payment_method'] = 'paypal';
            $order_data['payment_status'] = 'paid';
        } else {
            $order_data['payment_method'] = 'cod';
            $order_data['payment_status'] = 'Unpaid';
        }

        $order->fill($order_data);

        $status = $order->save();

        if ($status) {
            // Send the order confirmation email
            try {
                Mail::to($order->email)
                    ->bcc($order->semail)
                    ->cc('veronica.professionnel@gmail.com')
                    ->send(new OrderConfirmationMail($order, $order_data['total_amount']));

                // Update the carts to associate them with the order
                Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

                request()->session()->flash('success', 'Your product successfully placed in order');
                return redirect()->route('home');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to send order confirmation email: ' . $e->getMessage());
            }
        }



        if($order)
        // dd($order->id);

        $users=User::where('role','admin')->first();
        $details=[
            'title'=>'New order created',
            'actionURL'=>route('order.show',$order->id),
            'fas'=>'fa-file-alt'
        ];
        Notification::send($users, new StatusNotification($details));
        if(request('payment_method')=='paypal'){
            return redirect()->route('payment')->with(['id'=>$order->id]);
        }
        else{
            session()->forget('cart');
            session()->forget('coupon');
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

        // dd($users);
        request()->session()->flash('success','Your product successfully placed in order');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);


        // Check if selected_size is not null
        if ($order->selected_size !== null) {
            $selectedSize = $order->selected_size;
        } else {
            $selectedSize = 'Not specified'; // Provide a default value or message
        }

        return view('backend.order.show', compact('order', 'selectedSize'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::find($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order can not deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){
        // return $request->all();
        $order=Order::where('user_id',auth()->user()->id)->where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Votre commande a été passée. Veuillez patienter.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Votre commande est en cours de traitement s’il vous plaît attendre.');
                return redirect()->route('home');

            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Votre commande est livrée avec succès.');
                return redirect()->route('home');

            }
            else{
                request()->session()->flash('error','Votre commande annulée. veuillez réessayer');
                return redirect()->route('home');

            }
        }
        else{
            request()->session()->flash('error','Numéro de commande non valide, veuillez réessayer');
            return back();
        }
    }

    public function pdf(Request $request, $id)
    {
        try {
            // Log start of PDF generation
            \Log::info('PDF generation started.');

            // Set a higher execution time limit
            set_time_limit(300);

            // Retrieve the order based on the provided ID
            $order = Order::findOrFail($id);

            // Generate the PDF using the 'backend.order.pdf' view
            \Log::info('PDF View Data: ' . json_encode(compact('order')));
            $pdf = \PDF::loadView('backend.order.pdf', compact('order'));

            // Create a DomPDF options instance
            $options = new Options();

            // Enable debugging for PNG images
            $options->set('debugPng', true);

            // Create a DomPDF instance with the configured options
            $dompdf = new Dompdf($options);

            // Set the file name for the downloaded PDF
            $file_name = $order->order_number . '-' . $order->first_name . '.pdf';

            // Log completion of PDF generation
            \Log::info('PDF generation completed.');

            // Return the PDF as a download response
            return $pdf->download($file_name);
        } catch (ImageException $e) {
            // Log any image-related errors for debugging
            \Log::error('Image Exception: ' . $e->getMessage());

            // Return a JSON response with the error message
            return response()->json(['error' => 'Image-related error. Check logs for details.'], 500);
        } catch (\Exception $e) {
            // Log any other errors for debugging
            \Log::error('PDF Generation Error: ' . $e->getMessage());

            // Return a JSON response with the error message
            return response()->json(['error' => 'PDF generation failed. Check logs for details.'], 500);
        }
    }





    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
