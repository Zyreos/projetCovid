@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Article {{ $article->id }}</h1>

        <ul>
          <li>Nom: {{ $article->name }}</li>
          <li>Prix: {{ $article->price }}</li>
          <li>Description: {{ $article->description }}</li>
          <li>Dimensions: {{ $article->dimensions }}</li>
          <li>Caté : {{$category}}</li>
        </ul>

    <a href="/articles/{{ $article->id }}/edit"> Edition </a>

    <form method="POST" action="/articles/{{ $article->id }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Supprimer" />
    </form>

    <a href="/articles"> Retourner à la liste des articles </a>

    @if(!Auth::user() && (!$commands || $commands=="[]") || !Auth::user())

        <input type="hidden" id="id" name="id" value="{{ $article->id }}">
        <!--<input id="quantity" name="quantity" type="number" value="1" min="1">
        <label for="quantity">Quantité</label> -->

        <a href="{{route('login')}}" id="addCommand"> Ajouter à la commande</a>

    @elseif($commands=="[]" || !$commands )
        <form action="{{route('commands.store')}}" method="POST">
            @csrf

            <p>NO COMMAND BUT USER LOGGED IN</p>
            <input type="hidden" id="id" name="id" value="{{ $article->id }}">

            <button type="submit" id="addCommand"> Ajouter à la commande</button>
        </form>
    @endif

    @foreach($commands as $command)

        @if ($command->user_id == Auth::id() && $command->status_id == 1)
            <form action="{{route('commands.updateWithArticle', $command)}}" method="POST">
                @csrf

                <p>USER ALREADY HAS A CART</p>
                <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                <button type="submit" id="addCommand"> Ajouter à la commande</button>
            </form>
        @elseif(Auth::user() && $command->status_id != 1)
            <form action="{{route('commands.store')}}" method="POST">
                @csrf

                <p>USER HASN'T ANY CART</p>
                <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                <button type="submit" id="addCommand"> Ajouter à la commande</button>
            </form>
        @endif
    @endforeach


@endsection
