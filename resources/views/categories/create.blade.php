@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Création d'une catégorie</h1>

        <form action="/categories" method="POST">
            @csrf

            <div>
                <input type="text" name="name" placeholder="Nom de la gatégorie">
            </div>

            <button type="submit"> Ajouter </button>
            <a href="/articles"> Annuler </a>

        </form>
    </section>

@endsection