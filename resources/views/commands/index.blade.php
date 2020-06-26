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
                    <li>Client : {{ $user->first_name}} {{$user->last_name}}</li>
                @endif
            @endforeach
            @foreach($deliveries as $delivery)
                @if($delivery->id == $command->delivery_id)
                    <li>Mode de livraison : {{ $delivery->mode }}</li>
                @endif
            @endforeach

        </ul>
    @endforeach
@endsection
