@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit_users.css') }}" />
@endsection

@section('content')

    
    <div class="form_container">
        <div class="nav_user">
            <button class="menu"><a href="/users/{{$user->id}}"> Tableau de bord </a></button>
            <button class="menu"><a href="/users/{{$user->id}}"> Mes informations </a></button>
            <button class="menu"><a href="/users/{{$user->id}}"> Historique des commandes </a></button>
        </div>

        <form action="/users/{{$user->id}}" method="POST">
            @csrf
            {{ method_field('PATCH') }}

            <label for="lname">Nom:</label>
            <input type="text" name="name" value="{{ $user->last_name }}" placeholder="Nouveau nom">

            <label for="fname">Prénom:</label>
            <input type="text" name="name" value="{{ $user->first_name }}" placeholder="Nouveau prénom">

            <label for="email">Entreprise:</label>
            <input type="text" name="email" value= "{{ $user->email}}" placeholder="Nouvel e-mail">

            <label for="comp">Téléphone:</label>
            <input type="text" name="company" value="{{ $user->company }}" placeholder="Nouvelle entreprise">

            <label for="phone">E-mail:</label>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}" placeholder="Nouveau numéro de téléphone">
        
            <!--<label class="label">Rôle</label>
            <div class="select">
                <select name="role_id">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>-->
            <div class="user_button">
                <button class="cancel"><a href="/users/{{$user->id}}"> Annuler </a></button>
                <button type="submit"> Enregistrer les modifications </button>
            </div>
            
        </form>
    </div>
    
@endsection
