@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Article {{ $article->id }}</h1>

        <ul>
          <li>Nom: {{ $article->name }}</li>
          <li>Prix: {{ $article->price }}</li>
          <li>Description: {{ $article->description }}</li>
          <li>Dimensions: {{ $article->dimensions }}</li>
          <li>Caté : {{$category}}</li>
        </ul>

    <a href="/articles/{{ $article->id }}/edit"> Edition </a>

    <form method="POST" action="/articles/{{ $article->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer" />
    </form>

    <a href="/articles"> Retourner à la liste des articles </a>

    <form action="/commands/" method="POST">
        @csrf
        {{ method_field('PATCH') }}

        <input type="hidden" name="article_id" value="{{ $article->id }}"/>

        <button type="submit"> Ajouter à la commande</button>
    </form>

@endsection
