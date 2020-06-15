@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Création d'une catégorie</h1>

        <form action="{{route('categories.store')}}" method="POST">
            @csrf

            <div>
                <input type="text" name="name" placeholder="Nom de la catégorie">
            </div>

            <button type="submit"> Ajouter </button>
            <a href="/catégorie"> Annuler </a>

        </form>
    </section>

@endsection
