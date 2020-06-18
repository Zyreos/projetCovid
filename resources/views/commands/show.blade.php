@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Commande {{ $command->id }}</h1>

    <ul>
        <li>Utilisateur: {{ $user->name }}</li>

        <li>Date de validation: {{ $command->date_validation }}</li>
        <li>Total: {{ $command->total }}</li>
        <br/>
        <li>Adresse de facturation: {{$bill_address->address1}} & {{ $bill_address->address2 }}</li>
        <li>Code postal: {{$bill_address->postcode}}</li>
        <li>Ville: {{$bill_address->city}}</li>
        <li>Pays: {{$bill_address->country}}</li>
        <br/>
        <li>Adresse de facturation: {{$delivery_address->address1}} & {{ $delivery_address->address2 }}</li>
        <li>Code postal: {{$delivery_address->postcode}}</li>
        <li>Ville: {{$delivery_address->city}}</li>
        <li>Pays: {{$delivery_address->country}}</li>
        <li>{{$big_user}}</li>
        <br/>
        @if(DateTime::diff($big_user->created_at))
            <h1 class="t1">Création d'une commande</h1>

            <form action="{{route('commands.store')}}" method="POST" >
                @csrf

                <button type="submit"> Ajouter </button>
                <a href="/commands"> Annuler </a>
            </form>
        @endif

        <li>User :{{$user->name}}</li>
    <!-- Il faut conserver ce code :)-->
        <br/>
        <h1> Les articles de la commande</h1>
        @foreach($command->articles as $article)
            <li>{{ $article->name }}</li>
        @endforeach
    </ul>

    <a href="/commands/{{ $command->id }}/edit"> Edition </a>

    <form method="POST" action="/commands/{{ $command->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer" />
    </form>

    <a href="/commands"> Retourner à la liste des commandes </a>

@endsection
