@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_articles.css') }}" />
@endsection

@section('content')
    <section class="article_container">


        <section class="article">
            <h1>{{ $article->name }}</h1>
            <article class="article_show">
                <div id="image3" class="image"></div>
            </article>
        </section>

        <section class="article_details">

            @if(!Auth::user() && (!$commands || $commands=="[]") || !Auth::user())

                <input type="hidden" id="id" name="id" value="{{ $article->id }}">
                <p>NO COMMAND NO USER</p>
                <!--<input id="quantity" name="quantity" type="number" value="1" min="1">
                <label for="quantity">Quantité</label> -->

                <div class="add_to_cart">
                    <h1>{{ $article->price }} €</h1>
                    <button type="submit"><a href="{{route('login')}}" id="addCommand"> AJOUTER AU PANIER </a></button>
                </div>

            @elseif($commands=="[]" || !$commands )
                <form action="{{route('commands.store', $command)}}" method="POST">
                    @csrf

                    <p>NO COMMAND BUT USER LOGGED IN</p>
                    <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                    <div class="add_to_cart">
                        <h1>{{ $article->price }} €</h1>
                        <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                    </div>
                </form>
            @endif

            @foreach($commands as $command)

                @if (Auth::user() && $command->user_id == Auth::id() && $command->status_id == 1)
                    <form action="{{route('commands.updateWithArticle', $command)}}" method="POST">
                        @csrf

                        <p>USER ALREADY HAS A CART</p>
                        <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                        <div class="add_to_cart">
                            <h1>{{ $article->price }} €</h1>
                            <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                        </div>
                    </form>
                @elseif(Auth::user() && $command->user_id == Auth::id() && $command->status_id != 1)
                    <form action="{{route('commands.store', $command)}}" method="POST">
                        @csrf

                        <p>USER HASN'T ANY CART</p>
                        <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                        <div class="add_to_cart">
                            <h1>{{ $article->price }} €</h1>
                            <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                        </div>
                    </form>
                @else
                        <form action="{{route('commands.store', $command)}}" method="POST">
                            @csrf

                            <p>IS IT WORKING?</p>
                            <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                            <div class="add_to_cart">
                                <h1>{{ $article->price }} €</h1>
                                <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                            </div>
                        </form>
                @endif
            @endforeach

            <h3>{{ $article->dimensions }}</h3>
            <h3>{{ $article->description }}</h3>

            <div class="article_admin">
                    <button><a href="/articles/{{ $article->id }}/edit"> Editer </a></button>

                    <form method="POST" action="/articles/{{ $article->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <button><a href="/articles/{{ $article->id }}/delete"> Supprimer </a></button>
                        <button><a href="/articles"> Retourner à la liste des articles </a></button>
                    </form>
            </div>
        </section>

    </section>

@endsection
