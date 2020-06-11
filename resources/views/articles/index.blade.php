@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    @foreach ($articles as $article)
    <h1> Article {{ $article->id }} </h1>
    <ul>
        <li>Nom: {{ $article->name }}</li>
        <li>Prix: {{ $article->price }}</li>
        <li>Description: {{ $article->description }}</li>
        <li>Dimensions: {{ $article->dimensions }}</li>
    </ul>
    @endforeach

@endsection
