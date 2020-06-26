@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
@endsection

@section('content')

    <h1>Détail de la commande - {{ $command->id }}</h1>

    <div>
        <li>Date de validation: {{ $command->date_validation }}</li>
        <li>Total: {{ $command->total }}</li>
        <li>User :{{$user->first_name}}</li>

        <input type="hidden" name="total" value="{{$command->total}}">

    <a href="/commands/{{ $command->id }}/basket"> Annuler </a>



    <a href="/commands"> Retourner à la liste des commandes </a>

        <div id="paypal-button"></div>

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
                            alert('Paiement accepté');
                            // 3. Show the buyer a confirmation message.
                        });
                }
            }, '#paypal-button');
        </script>
@endsection

