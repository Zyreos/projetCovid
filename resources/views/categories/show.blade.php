@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Category {{ $category->id }}</h1>

    <ul>
        <li>Nom: {{ $category->name }}</li>
    </ul>

    <a href="/categories/{{ $category->id }}/edit"> Edition </a>
    <a href="/categories/{{ $category->id }}/delete"> Suppression </a>
    <a href="/articles"> Retourner à la liste des articles </a>

@endsection
