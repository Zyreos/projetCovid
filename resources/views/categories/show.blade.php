@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Catégorie {{ $category->id }}</h1>

    <ul>
        <li>Nom: {{ $category->name }}</li>
    </ul>

    <a href="/categories/{{ $category->id }}/edit"> Edition </a>

    <form method="POST" action="/categories/{{ $category->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer" />
    </form>

    <a href="/catégories"> Retourner à la liste des catégories </a>

@endsection
