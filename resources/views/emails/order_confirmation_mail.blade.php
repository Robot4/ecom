<!doctype html>
<html lang="en">
<head>
    <title>Confirmation Commande</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">

            <p>Cher(e), {{ $details['first_name'] }}</p>
            <p>Nous tenons à vous remercier pour votre commande sur Veronica. Votre satisfaction est <br> notre priorité, et nous sommes ravis de vous servir. Voici les détails de votre commande :</p>
            <br/>
            <ul>
                <li><b>Numéro de commande : {{ $details['order_number'] }}</b></li>
                <li><b>Total de la commande : {{ $orderTotal }} Dhs</b></li>

                <!-- Include more order details here -->
            </ul>
            <br/>

            <p>Si vous souhaitez suivre l'état de votre commande, vous pouvez utiliser le numéro de commande ci-dessus sur notre site Web Veronica dans la section "Suivi de commande".</p>
            <br/>

            <p>Nous vous remercions de votre confiance en Veronica et espérons que vous apprécierez vos achats. Nous attendons avec impatience de vous servir à nouveau à l'avenir.</p>
            <br/>
            <br/>
            <p>Cordialement,</p>
            <p>L'équipe Veronica</p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
