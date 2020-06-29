@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/users_show.css') }}" />
@endsection

@section('content')

    <section class="user-container">

        <div class="navig-links">
            <a class="button" href="">Comptes</a>
            <a class="button" href="">Commandes</a>
            <a class="button" href="">Articles</a>
            <form action="{{route('users.update', $user)}}" method="POST">
                @csrf
            <button class="button" type="submit">Enregistrer</button>
                <div>
                    <input type="radio" name="role_id" value="1" checked>
                    <label>Client</label>

                    <input type="radio" name="role_id" value="2">
                    <label>Administrateur</label>

                    <input type="radio" name="role_id" value="3">
                    <label>Master</label>
                </div>
            </form>
        </div>

        <div class="main-infos">

            <div class="user-infos-div">


                <h1 class="title">Bonjour, {{$user->first_name}} {{$user->last_name}}</h1>
                <div class="info">
                    <h3 class="user-infos">E-mail : {{ $user->email }}</h3>
                    <h3 class="user-infos">Entreprise : {{ $user->company }}</h3>
                    <h3 class="user-infos">Téléphone : {{ $user->phone_number}}</h3>
                </div>



            </div>

        </div>

    </section>


@endsection

