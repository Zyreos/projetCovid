@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    @foreach ($commands as $command)
        <h1> Command {{ $command->id }} </h1>
        <ul>
            <li>Adresse de facturation : {{ $command->bill_address }}</li>
            <li>Date de validation : {{ $command->date_validation }}</li>
            <li>Total : {{ $command->total_definitve }}</li>
            @foreach($statuses as $status)
                @if($status->id == $command->status_id)
                    <li>Statut : {{ $status->name }}</li>
                @endif
            @endforeach
            @foreach($deliveries as $delivery)
                @if($delivery->id == $command->delivery_id)
                    <li>Mode de livraison : {{ $delivery->mode }}</li>
                    <li>Adresse : {{ $delivery->address1}} {{ $delivery->address2}}</li>
                    <li>Code postal : {{ $delivery->postCode }}</li>
                    <li>Ville : {{ $delivery->city }}</li>
                    <li>Pays : {{ $delivery->country }}</li>
                @endif
            @endforeach
            @foreach($users as $user)
                @if($user->id == $command->user_id)
                    <li>Client : {{ $user->name }}</li>
                @endif
            @endforeach
        </ul>
    @endforeach

@endsection
