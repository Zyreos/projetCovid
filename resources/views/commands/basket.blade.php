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
            <li>Article id: {{$article->id}}</li>
            <li>Article price: {{$article->price}}</li>
            <li>Article quantity: {{$article->quantity}}</li>

            <form action="{{route('articles.updateQuantity', $article)}}" method="POST">
                @csrf
                <input id="quantity" name="quantity" value="{{$article->quantity}}" min="1">
                <label for="quantity">Quantité</label>
                <p>{{$article->price * $article->quantity}}</p>
                <input type="hidden" id="total_price" name="total_price" value="{{$article->price * $article->quantity}}">
                <button type="submit">Valider la quantité</button>
            </form>
        @endforeach

    </ul>

@endsection
