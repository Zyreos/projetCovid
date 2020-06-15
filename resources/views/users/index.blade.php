@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    @foreach ($user as $user)
        <h1> Article {{ $user->id }} </h1>
        <ul>
            <li>Nom: {{ $user->name }}</li>
            <li>E-mail: {{ $user->email }}</li>
            @foreach($roles as $role)
                @if($role->id == $user->role_id)
                    <li>Catégorie: {{ $role->name }}</li>
                @endif
            @endforeach
        </ul>
    @endforeach

@endsection
