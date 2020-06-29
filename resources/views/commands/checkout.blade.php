@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection

@section('content')


    <div class="command-steps">
        <h3 class="off-step">1 LIVRAISON</h3>
        <h3 class="off-step">2 PAIEMENT</h3>
        <h1 class="current-step">3 VERIFICATION</h1>
    </div>
    <hr class="little-hr">

    <section class="global-body">

        <div class="create-address">
            <div class="title-group">
                <h2 class="title">Information de livraison</h2>
                <hr class="under-title">
                @foreach($command->addresses as $address)

                    @if($address->is_bill == 0)
                        <h3 class="title">Addresse de livraison :</h3>
                        <p class="address-delivery">{{$address->address1}}, {{$address->address2}}, {{$address->city}}, {{$address->postcode}}, {{$address->country}}</p>

                    @endif

                @endforeach
                <hr class="under-title">

                <h2 class="sec-title">Information de paiement</h2>
                <img class="paypal-img" src="/img/Paypal.png" alt="PayPayl_img">

            </div>
            </div>





    <div class="recap-div">

        <h2 class="sec-title">Récapitulatif de la commande</h2>
        <div class="global-infos-div">
            <p class="global-infos">Sous-total :</p><p class="global-infos">{{$command->total}} € </p>
        </div>
        <div class="global-infos-div">
            <p class="global-infos">Livraison :</p><p class="global-infos">{{$delivery->price}} €</p>
        </div>
        <hr class="recap-hr">
        <div class="global-infos-div">
            <p class="global-infos">TOTAL :</p><p class="global-infos">{{$command->total}} €</p>
        </div>

        <div id="paypal-button"></div>

    </div>
        <script>
            paypal.Button.render({
                env: 'sandbox', // Or 'production'
                // Set up the payment:
                // 1. Add a payment callback
                payment: function(data, actions) {
                    // 2. Make a request to your server
                    return actions.request.post('/api/create-payment', {total: {{$command->total}}})
                        .then(function(res) {
                            // 3. Return res.id from the response
                            //console.log(res);
                            return res.id;
                        });
                },
                // Execute the payment:
                // 1. Add an onAuthorize callback
                onAuthorize: function(data, actions) {
                    // 2. Make a request to your server
                    return actions.request.post('/api/execute-payment', {
                        paymentID: data.paymentID,
                        payerID:   data.payerID,
                    })
                        .then(function(res) {
                            //console.log(res);
                            window.location.href = "{{ route('commands.confirm', [$command->id])}}"
                            // 3. Show the buyer a confirmation message.
                        });
                }
            }, '#paypal-button');
        </script>
    </section>

@endsection

