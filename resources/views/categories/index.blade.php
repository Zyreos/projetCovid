@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    @foreach ($categories as $category)
        <h1> Catégorie: {{ $category->id }} </h1>
        <ul>
            <li>Nom: {{ $category->name }}</li>
        </ul>
    @endforeach
@endsection
