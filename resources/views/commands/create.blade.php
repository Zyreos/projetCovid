@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Création d'une commande</h1>

        <form action="{{route('commands.store')}}" method="POST" >
            @csrf
            <div class="select">
            <select name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name}}</option>
            @endforeach
            </select>

                <select name="articles[]" multiple>
                    @foreach($articles as $article)
                        <option value="{{ $article->id }}" {{ in_array($article->id, old('articles') ?: []) ? 'selected' : '' }}>{{ $article->name }}</option>
                    @endforeach
                </select>


            <button type="submit"> Ajouter </button>
            <a href="/commands"> Annuler </a>
            </div>
        </form>
    </section>

@endsection

