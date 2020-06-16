@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    @foreach ($commands as $command)
        <h1> Command {{ $command->id }} </h1>
        <ul>
            <li>Date de validation : {{ $command->date_validation }}</li>
            <li>Total : {{ $command->total }}</li>
            @foreach($statuses as $status)
                @if($status->id == $command->status_id)
                    <li>Statut : {{ $status->name }}</li>
                @endif
            @endforeach
            @foreach($users as $user)
                @if($user->id == $command->user_id)
                    <li>Client : {{ $user->name }}</li>
                @endif
            @endforeach
            @foreach($deliveries as $delivery)
                @if($delivery->id == $command->delivery_id)
                    <li>Mode de livraison : {{ $delivery->mode }}</li>
                    <li>Adresse de livraison : {{ $delivery->address->address1}} {{ $delivery->address->address2}}</li>
                    <li>Code postal : {{ $delivery->address->postcode }}</li>
                    <li>Ville : {{ $delivery->address->city }}</li>
                    <li>Pays : {{ $delivery->address->country }}</li>
                @endif
            @endforeach
            @foreach($addresses as $address)
                @if($address->id == $command->address_id)
                    <li>Adresse de facturation : {{ $address->address1}} {{ $address->address2}}</li>
                    <li>Code postal : {{ $address->postcode }}</li>
                    <li>Ville : {{ $address->city }}</li>
                    <li>Pays : {{ $address->country }}</li>
                @endif
            @endforeach
        </ul>
    @endforeach

@endsection
