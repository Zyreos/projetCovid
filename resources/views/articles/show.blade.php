@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_articles.css') }}" />
@endsection

@section('content')
    <section class="article_container">


        <section class="article">
            <h1>{{ $article->name }}</h1>



            <article class="article_show">
                @if(isset($article->pictures))
                    @if(count($article->pictures))
                        @php

                            $imgElement = '<div class="img_article" style="background-image: url(\' ' . $article->pictures[0]->path . ' \')"></div>';

                        @endphp
                    @else
                        @php

                            $imgElement = '<div class="img_article" style="background-image: url(\'/img/article2.png\')"></div>';

                        @endphp
                    @endif

                    {!! $imgElement !!}
                @endif
            </article>
        </section>

        <section class="article_details">

            @if((!Auth::user() && (!$commands || $commands=="[]")) || !Auth::user())

                <input type="hidden" id="id" name="id" value="{{ $article->id }}">
                <p>NO COMMAND NO USER</p>

                <div class="add_to_cart">
                    <h1>{{ $article->price }} €</h1>
                    <a href="{{route('login')}}" id="addCommand"> AJOUTER AU PANIER </a>
                </div>
            @endif

            @if(Auth::user())

                @if($user->has_basket == true)

                        <form action="{{route('commands.updateWithArticle', $goodCommand)}}" method="POST">
                            @csrf

                            <p>USER ALREADY HAS A CART</p>
                            <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                            <div class="add_to_cart">
                                        <h1>{{ $article->price }} €</h1>
                                        <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                                    </div>
                                </form>


                            @else
                                <form action="{{route('commands.store')}}" method="POST">
                                    @csrf

                                    <p>USER HASN'T ANY CART</p>
                                    <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                                    <div class="add_to_cart">
                                        <h1>{{ $article->price }} €</h1>
                                        <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                                    </div>
                                </form>
                            @endif
                @endif

            <h3>Dimensions: {{ $article->dimensions }}</h3>
            <h3>Description: {{ $article->description }}</h3>

            <div class="article_admin">


                    <form method="POST" action="/articles/{{ $article->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <a href="/articles"> Retourner à la liste des articles </a>
                    </form>
            </div>
        </section>
                </div>

    </section>

@endsection
