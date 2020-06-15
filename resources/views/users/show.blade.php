@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>User {{ $user->id }}</h1>

    <ul>
        <li>Nom: {{ $user->name }}</li>
        <li>E-mail: {{ $user->email }}</li>
        <li>Entreprise: {{ $user->company}}</li>
        <li>Numéro de téléphone: {{ $user->phone_number }}</li>
        <li>Rôle : {{$role}}</li>
    </ul>

    <a href="/users/{{ $user->id }}/edit"> Edition </a>

    <form method="POST" action="/users/{{ $user->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer" />
    </form>

    <a href="/users"> Retourner à la liste des articles </a>

@endsection
