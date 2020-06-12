@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Article {{ $article->id }}</h1>

        <ul>
          <li>Nom: {{ $article->model }}</li>
          <li>Prix: {{ $article->prize }}</li>
          <li>Description: {{ $article->description }}</li>
          <li>Dimensions: {{ $article->dimensions }}</li>
            @foreach($categories as $category)
                @if($article->category_id = $category->category_id)
                    <li>Catégorie: {{ $category->name }}</li>
                @endif
            @endforeach
        </ul>

    <a href="/articles/{{ $article->id }}/edit"> Edition </a>
    <a href="/articles/{{ $article->id }}/delete"> Suppression </a>
    <a href="/articles"> Retourner à la liste des articles </a>

@endsection
