@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Création d'une commande</h1>

        <form action="{{route('commands.store')}}" method="POST" >
            @csrf

            <button type="submit"> Ajouter </button>
            <a href="/commands"> Annuler </a>
        </form>
    </section>

@endsection

