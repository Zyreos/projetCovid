@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_users.css') }}" />
@endsection

@section('content')
    
    <section class="user_container">
        <div class="user_infos">
            <ul>
                <li>{{ $user->last_name }}</li>
                <li>{{ $user->first_name }}</li>
                <li>{{ $user->company }}</li>
                <li>{{ $user->phone_number}}</li>
                <li>{{ $user->email }}</li>
            </ul>
        </div>
        
        <div class="users_edition">
            <a href="/users/{{ $user->id }}/edit"> Edition </a>

            <form method="POST" action="/users/{{ $user->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="submit" value="Supprimer" />
            </form>
        </div>
    </section>

    <a href="/users"> Retourner à la liste des comptes </a>
    

@endsection
