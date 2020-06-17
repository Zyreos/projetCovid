@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>User {{ $user->id }} Edition :</h1>


    <form action="/users/{{$user->id}}" method="POST">
        @csrf
        {{ method_field('PATCH') }}

        <div>
            <input type="text" name="name" value="{{ $user->name }}" placeholder="Nouveau nom">
        </div>

        <div>
            <input type="text" name="email" value= "{{ $user->email}}" placeholder="Nouvelle e-mail">
        </div>

        <div>
            <input type="text" name="company" value="{{ $user->company }}" placeholder="Nouvelle entreprise">
        </div>

        <div>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}" placeholder="Nouveau numéro de téléphone">
        </div>

        <label class="label">Rôle</label>
        <div class="select">
            <select name="role_id">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit"> Editer </button>
            <a href="/users/{{$user->id}}"> Annuler </a>
        </div>
    </form>

@endsection
