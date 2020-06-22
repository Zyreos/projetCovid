@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Commande {{ $command->id }}</h1>
    <h2>Utilisateur: {{ $user->name }}</h2>

    <ul>

        @foreach($articles as $article)
            <li>Article name: {{$article->name}}</li>
            <li>Article price: {{$article->price}}</li>
            <li>Article quantity: {{$article->quantity}}</li>

            <form action="{{route('articles.updateQuantity', $article)}}" method="POST">
                @csrf
                <input id="quantity" name="quantity" type="number" value="1" min="1">
                <label for="quantity">Quantité</label>
                <button type="submit">Valider la quantité</button>
            </form>
        @endforeach
    </ul>

@endsection
