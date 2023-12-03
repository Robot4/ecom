@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Accueil<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Paiement</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <form class="form" method="POST" action="{{route('cart.order')}}">
                @csrf
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Effectuez votre paiement ici</h2>
                            <p>Merci de vous inscrire pour pouvoir payer plus rapidement</p>
                            <!-- Form -->
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Prénom<span>*</span></label>
                                        <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}" value="{{old('first_name')}}">
                                        @error('first_name')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Nom<span>*</span></label>
                                        <input type="text" name="last_name" placeholder="" value="{{old('lat_name')}}">
                                        @error('last_name')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Adresse e-mail<span>*</span></label>
                                        <input type="email" name="email" placeholder="" value="{{old('email')}}">
                                        @error('email')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Numéro de téléphone <span>*</span></label>
                                        <input type="number" name="phone" placeholder="" required value="{{old('phone')}}">
                                        @error('phone')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Ville<span>*</span></label>
                                        <select name="country" id="country" required>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Fes">Fes</option>
                                            <option value="Salé">Salé</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tangier">Tangier</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Meknes">Meknes</option>
                                            <option value="Oujda">Oujda</option>
                                            <option value="Kenitra">Kenitra</option>
                                            <option value="Agadir">Agadir</option>
                                            <option value="Tetuan">Tetuan</option>
                                            <option value="Safi">Safi</option>
                                            <option value="Temara">Temara</option>
                                            <option value="Inzegan">Inzegan</option>
                                            <option value="Mohammedia">Mohammedia</option>
                                            <option value="Laayoune">Laayoune</option>
                                            <option value="Khouribga">Khouribga</option>
                                            <option value="Beni Mellal">Beni Mellal</option>
                                            <option value="Jdida">Jdida</option>
                                            <option value="Taza">Taza</option>
                                            <option value="Ait Melloul">Ait Melloul</option>
                                            <option value="Nador">Nador</option>
                                            <option value="Settat">Settat</option>
                                            <option value="Ksar El Kbir">Ksar El Kbir</option>
                                            <option value="Larache">Larache</option>
                                            <option value="Khmisset">Khmisset</option>
                                            <option value="Guelmim">Guelmim</option>
                                            <option value="Berrechid">Berrechid</option>
                                            <option value="Wad Zam">Wad Zam</option>
                                            <option value="Fkih BenSaleh">Fkih BenSaleh</option>
                                            <option value="Taourirt">Taourirt</option>
                                            <option value="Berkane">Berkane</option>
                                            <option value="Sidi Sliman">Sidi Sliman</option>
                                            <option value="Errachidia">Errachidia</option>
                                            <option value="Sidi Kacem">Sidi Kacem</option>
                                            <option value="Khenifra">Khenifra</option>
                                            <option value="Tifelt">Tifelt</option>
                                            <option value="Essaouira">Essaouira</option>
                                            <option value="Taroudant">Taroudant</option>
                                            <option value="Kelaat Sraghna">Kelaat Sraghna</option>
                                            <option value="Oulad Teima">Oulad Teima</option>
                                            <option value="Youssoufia">Youssoufia</option>
                                            <option value="Sefrou">Sefrou</option>
                                            <option value="Ben Guerir">Ben Guerir</option>
                                            <option value="Tan-Tan">Tan-Tan</option>
                                            <option value="Ouazzane">Ouazzane</option>
                                            <option value="Guercif">Guercif</option>
                                            <option value="Dakhla">Dakhla</option>
                                            <option value="Hoceima">Hoceima</option>
                                            <option value="Fnideq">Fnideq</option>
                                            <option value="Ouarzazate">Ouarzazate</option>
                                            <option value="Tiznit">Tiznit</option>
                                            <option value="Suq Sebt Oulad Nama">Suq Sebt Oulad Nama</option>
                                            <option value="Azrou">Azrou</option>
                                            <option value="Lahraouyine">Lahraouyine</option>
                                            <option value="Bensliman">Bensliman</option>
                                            <option value="Midelt">Midelt</option>
                                            <option value="Jrada">Jrada</option>
                                            <option value="Skhirat">Skhirat</option>
                                            <option value="Souk Larbaa">Souk Larbaa</option>
                                            <option value="Aïn Harrouda">Aïn Harrouda</option>
                                            <option value="Bejaad">Bejaad</option>
                                            <option value="Kasbat Tadla">Kasbat Tadla</option>
                                            <option value="Sidi Bennour">Sidi Bennour</option>
                                            <option value="Martil">Martil</option>
                                            <option value="Lqliaa">Lqliaa</option>
                                            <option value="Boujdor">Boujdor</option>
                                            <option value="Azemour">Azemour</option>
                                            <option value="M'dyaq">M'dyaq</option>
                                            <option value="Tinghir">Tinghir</option>
                                            <option value="El Arwi">El Arwi</option>
                                            <option value="Chefchawn">Chefchawn</option>
                                            <option value="M'Rirt">M'Rirt</option>
                                            <option value="Zagora">Zagora</option>
                                            <option value="El Aioun Sidi Mellouk">El Aioun Sidi Mellouk</option>
                                            <option value="Lamkansa">Lamkansa</option>
                                            <option value="Smara">Smara</option>
                                            <option value="Taounate">Taounate</option>
                                            <option value="Bin Anşār">Bin Anşār</option>
                                            <option value="Sidi Yahya El Gharb">Sidi Yahya El Gharb</option>
                                            <option value="Zaio">Zaio</option>
                                            <option value="Amalou Ighriben">Amalou Ighriben</option>
                                            <option value="Assilah">Assilah</option>
                                            <option value="Azilal">Azilal</option>
                                            <option value="Mechra Bel Ksiri">Mechra Bel Ksiri</option>
                                            <option value="El Hajeb">El Hajeb</option>
                                            <option value="Bouznika">Bouznika</option>
                                            <option value="Imzouren">Imzouren</option>
                                            <option value="Tahla">Tahla</option>
                                            <option value="BouiZazarene Ihaddadene">BouiZazarene Ihaddadene</option>
                                            <option value="Ain El Aouda">Ain El Aouda</option>
                                            <option value="Bouarfa">Bouarfa</option>
                                            <option value="Arfoud">Arfoud</option>
                                            <option value="Demnate">Demnate</option>
                                            <option value="Sidi sliman echraa">Sidi sliman echraa</option>
                                            <option value="Zawiyat cheikh">Zawiyat cheikh</option>
                                            <option value="Ain Taoujdat">Ain Taoujdat</option>
                                            <option value="Echemaia">Echemaia</option>
                                            <option value="Aourir">Aourir</option>
                                            <option value="Sabaa Aiyoun">Sabaa Aiyoun</option>
                                            <option value="Oulad Ayad">Oulad Ayad</option>
                                            <option value="Ben Ahmed">Ben Ahmed</option>
                                            <option value="Tabounte">Tabounte</option>
                                            <option value="Jorf El Melha">Jorf El Melha</option>
                                            <option value="Missour">Missour</option>
                                            <option value="Laataouia">Laataouia</option>
                                            <option value="Errich">Errich</option>
                                            <option value="Zeghanghan">Zeghanghan</option>
                                            <option value="Rissani">Rissani</option>
                                            <option value="Sidi Taibi">Sidi Taibi</option>
                                            <option value="Sidi Ifni">Sidi Ifni</option>
                                            <option value="Ait Ourir">Ait Ourir</option>
                                            <option value="Ahfir">Ahfir</option>
                                            <option value="El Ksiba">El Ksiba</option>
                                            <option value="El Gara">El Gara</option>
                                            <option value="Drargua">Drargua</option>
                                            <option value="Imin tanout">Imin tanout</option>
                                            <option value="Goulmima">Goulmima</option>
                                            <option value="Karia Ba Mohamed">Karia Ba Mohamed</option>
                                            <option value="Mehdya">Mehdya</option>
                                            <option value="El Borouj">El Borouj</option>
                                            <option value="Bouhdila">Bouhdila</option>
                                            <option value="Chichaoua">Chichaoua</option>
                                            <option value="Beni Bouayach">Beni Bouayach</option>
                                            <option value="Oulad Berhil">Oulad Berhil</option>
                                            <option value="Jmaat Shaim">Jmaat Shaim</option>
                                            <option value="Bir Jdid">Bir Jdid</option>
                                            <option value="Tata">Tata</option>
                                            <option value="Boujniba">Boujniba</option>
                                            <option value="Temsia">Temsia</option>
                                            <option value="Mediouna">Mediouna</option>
                                            <option value="Kelat Megnouna">Kelat Megnouna</option>
                                            <option value="Sebt Gzoula">Sebt Gzoula</option>
                                            <option value="Outat El Haj">Outat El Haj</option>
                                            <option value="Imouzzer Kandar">Imouzzer Kandar</option>
                                            <option value="Ain Bni Mathar">Ain Bni Mathar</option>
                                            <option value="Bouskoura">Bouskoura</option>
                                            <option value="Agourai">Agourai</option>
                                            <option value="Midar">Midar</option>
                                            <option value="Lalla Mimouna">Lalla Mimouna</option>
                                            <option value="Ribat El Kheir">Ribat El Kheir</option>
                                            <option value="Moulay Driss zarhoun">Moulay Driss zarhoun</option>
                                            <option value="Figuig">Figuig</option>
                                            <option value="Boumia">Boumia</option>
                                            <option value="Tamallalt">Tamallalt</option>
                                            <option value="Nouaceur">Nouaceur</option>
                                            <option value="Rommani">Rommani</option>
                                            <option value="Jorf">Jorf</option>
                                            <option value="Ifran">Ifran</option>
                                            <option value="Bouizakarn">Bouizakarn</option>
                                            <option value="Oulad Mbarek">Oulad Mbarek</option>
                                            <option value="Afourar">Afourar</option>
                                            <option value="Zmamra">Zmamra</option>
                                            <option value="Ait Ishaq">Ait Ishaq</option>
                                            <option value="Tit Mellil">Tit Mellil</option>
                                            <option value="Tarfaya">Tarfaya</option>
                                            <option value="Foum El Oued">Foum El Oued</option>
                                            <option value="Ben Ahmed Chala">Ben Ahmed Chala</option>
                                            <option value="Zaouiat Sidi Kacem">Zaouiat Sidi Kacem</option>
                                            <option value="Ait Daoud">Ait Daoud</option>
                                            <option value="Dar Bouazza">Dar Bouazza</option>
                                            <option value="Sidi Rahal">Sidi Rahal</option>
                                        </select>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address 1<span>*</span></label>
                                        <input type="text" name="address1" placeholder="" value="{{old('address1')}}">
                                        @error('address1')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Address 2</label>
                                        <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                        @error('address2')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Code Postal </label>
                                        <input type="text" name="post_code" placeholder="" value="{{old('post_code')}}">
                                        @error('post_code')
                                        <span class='text-danger'>{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>TOTAUX DU PANIER</h2>
                                <div class="content">
                                    <ul>
                                        <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">Sous-total du panier<span>{{number_format(Helper::totalCartPrice(),0)}} Dhs</span></li>
                                        <li class="shipping">
                                            Frais de Livraison                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                <select name="shipping" class="nice-select">
                                                    <option value="">Sélectionnez votre adresse</option>
                                                    @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}} : {{$shipping->price}} Dhs</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <span>Free</span>
                                            @endif
                                        </li>

                                        @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">Vous économisez<span>{{number_format(session('coupon')['value'],0)}} Dhs</span></li>
                                        @endif
                                        @php
                                            $total_amount=Helper::totalCartPrice();
                                            if(session('coupon')){
                                                $total_amount=$total_amount-session('coupon')['value'];
                                            }
                                        @endphp
                                        @if(session('coupon'))
                                            <li class="last"  id="order_total_price">Total<span>{{number_format($total_amount,0)}} Dhs</span></li>
                                        @else
                                            <li class="last"  id="order_total_price">Total<span>{{number_format($total_amount,0)}} Dhs</span></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                        <form-group>
                                            <input name="payment_method"  type="radio" value="cod" REQUIRED> <label> Paiement à la Livraison</label><br>
                                            <input name="payment_method"  type="radio" value="paypal" REQUIRED> <label> PayPal</label>
                                        </form-group>

                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" class="btn">Passer à La Caisse</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-rocket"></i>
                        <h4>LIVRAISON GRATUITE</h4>
                        <p>Commandes Plus De 300 Dhs</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-reload"></i>
                        <h4>RETOUR GRATUIT</h4>
                        <p>Retours sous 30 jours</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-lock"></i>
                        <h4>PAIEMENT SÉCURISÉ</h4>
                        <p>Paiement 100% sécurisé</p>
                    </div>
                    <!-- End Single Service -->
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Single Service -->
                    <div class="single-service">
                        <i class="ti-tag"></i>
                        <h4>MEILLEUR PRIX</h4>
                        <p>Prix garanti</p>
                    </div>
                    <!-- End Single Service -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Services -->

    <!-- Start Shop Newsletter  -->
    <section class="shop-newsletter section">
        <div class="container">
            <div class="inner-top">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-12">
                        <!-- Start Newsletter Inner -->
                        <div class="inner">
                            <h4>Newsletter</h4>
                            <p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                                <input name="EMAIL" placeholder="Your email address" required="" type="email">
                                <button class="btn">Subscribe</button>
                            </form>
                        </div>
                        <!-- End Newsletter Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop Newsletter -->
@endsection
@push('styles')
    <style>
        li.shipping{
            display: inline-flex;
            width: 100%;
            font-size: 14px;
        }
        li.shipping .input-group-icon {
            width: 100%;
            margin-left: 10px;
        }
        .input-group-icon .icon {
            position: absolute;
            left: 20px;
            top: 0;
            line-height: 40px;
            z-index: 3;
        }
        .form-select {
            height: 30px;
            width: 100%;
        }
        .form-select .nice-select {
            border: none;
            border-radius: 0px;
            height: 40px;
            background: #f6f6f6 !important;
            padding-left: 45px;
            padding-right: 40px;
            width: 100%;
        }
        .list li{
            margin-bottom:0 !important;
        }
        .list li:hover{
            background:#F7941D !important;
            color:white !important;
        }
        .form-select .nice-select::after {
            top: 14px;
        }
    </style>
@endpush
@push('scripts')
    <script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() { $("select.select2").select2(); });
        $('select.nice-select').niceSelect();
    </script>
    <script>
        function showMe(box){
            var checkbox=document.getElementById('shipping').style.display;
            // alert(checkbox);
            var vis= 'none';
            if(checkbox=="none"){
                vis='block';
            }
            if(checkbox=="block"){
                vis="none";
            }
            document.getElementById(box).style.display=vis;
        }
    </script>
    <script>
        $(document).ready(function(){
            $('.shipping select[name=shipping]').change(function(){
                let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
                let subtotal = parseFloat( $('.order_subtotal').data('price') );
                let coupon = parseFloat( $('.coupon_price').data('price') ) || 0;
                // alert(coupon);
                $('#order_total_price span').text((subtotal + cost-coupon).toFixed(0)+' Dhs');
            });

        });

    </script>

@endpush
