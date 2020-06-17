@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    @foreach ($users as $user)
        <h1> User {{ $user->id }} </h1>
        <ul>
            <li>Nom: {{ $user->name }}</li>
            <li>E-mail: {{ $user->email }}</li>
            <li>Entreprise: {{ $user->company }}</li>
            <li>Numéro de téléphone {{ $user->phone_number }}</li>
            @foreach($roles as $role)
                @if($role->id == $user->role_id)
                    <li>Rôle: {{ $role->name }}</li>
                @endif
            @endforeach
        </ul>
        <a href="/users/{{$user->id}}"> Voir </a>
    @endforeach

@endsection
