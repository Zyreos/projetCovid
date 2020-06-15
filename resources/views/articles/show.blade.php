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
    <a href="/articles/{{ $article->id }}/delete"> Suppression </a>
    <a href="/articles"> Retourner à la liste des articles </a>

@endsection
