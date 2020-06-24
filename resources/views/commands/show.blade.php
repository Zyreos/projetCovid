@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Détail de la commande - {{ $command->id }}</h1>

    <div>
        <li>Date de validation: {{ $command->date_validation }}</li>
        <li>Total: {{ $command->total }}</li>
        <br/>
        @foreach($command->addresses as $address)
        @if($address->is_bill == 0)
        <li>Adresse de livraison: {{$address->address1}} & {{ $address->address2 }} </li>
        <li>Code postal: {{$address->postcode}}</li>
        <li>Ville: {{$address->city}}</li>
        <li>Pays: {{$address->country}}</li>
        @else
        <br/>
        <li>Adresse de facturation: {{$address->address1}} & {{ $address->address2 }} </li>
        <li>Code postal: {{$address->postcode}}</li>
        <li>Ville: {{$address->city}}</li>
        <li>Pays: {{$address->country}}</li>
        <li>{{$big_user}}</li>
        <br/>
            @endif
        @endforeach
        <li>User :{{$user->name}}</li>
    <!-- Il faut conserver ce code :)-->
        <br/>
        <h1> Les articles de la commande</h1>
        @foreach($command->articles as $article)
            <li>{{ $article->name }}</li>
        @endforeach

    </div>

    <a href="/commands/{{ $command->id }}/editFacturation"> Edition avec addresse de facturation </a>
    <br/>
    <a href="/commands/{{ $command->id }}/editDelivery"> Edition de livraison</a>
    <br/>
    <a href="/commands/{{ $command->id }}/edit"> Edition </a>


    <form method="POST" action="/commands/{{ $command->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer" />
    </form>

    <a href="/commands"> Retourner à la liste des commandes </a>

@endsection
