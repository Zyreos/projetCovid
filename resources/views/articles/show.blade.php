@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_articles.css') }}" />
@endsection

@section('content')
    <section class="article_container">


        <section class="article">
            <h1>{{ $article->name }}</h1>
            @foreach($article->pictures as $picture)
                @if(isset($article->pictures))

                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @php

                            $imgElement = '<div class="d-block w-20 img_article" style="background-image: url(\' ' . $article->pictures[0]->path . ' \')"></div>';

                        @endphp
                    </div>
                    
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                @else
                    @php

                        $imgElement = '<div class="img_article" style="background-image: url(\'/img/article2.png\')"></div>';

                    @endphp
                
                @endif
            @endforeach
            
            
            <!--<article class="article_show">
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
        </section>-->

        <section class="article_details">

            @if(!Auth::user() && (!$commands || $commands=="[]"))

                <input type="hidden" id="id" name="id" value="{{ $article->id }}">
                <!--<input id="quantity" name="quantity" type="number" value="1" min="1">
                <label for="quantity">Quantité</label> -->

                <div class="add_to_cart">
                    <h1>{{ $article->price }} €</h1>
                    <a href="{{route('login')}}" id="addCommand"> AJOUTER AU PANIER </a>
                </div>

            @elseif($commands=="[]" || !$commands )
                <form action="{{route('commands.store')}}" method="POST">
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

                @if ($command->user_id == Auth::id() && $command->status_id == 1)
                    <form action="{{route('commands.updateWithArticle', $command)}}" method="POST">
                        @csrf

                        <p>USER ALREADY HAS A CART</p>
                        <input type="hidden" id="id" name="id" value="{{ $article->id }}">

                        <div class="add_to_cart">
                            <h1>{{ $article->price }} €</h1>
                            <button type="submit" id="addCommand"> AJOUTER AU PANIER </button>
                        </div>
                    </form>
                @elseif(Auth::user() && $command->status_id != 1)
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
            @endforeach

            <h3>Dimensions: {{ $article->dimensions }}</h3>
            <h3>Description: {{ $article->description }}</h3>

            <div class="article_admin">
                    <button><a href="/articles/{{ $article->id }}/edit"> Editer </a></button>

                    <form method="POST" action="/articles/{{ $article->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <a href="/articles/{{ $article->id }}/delete"> Supprimer </a>
                        <a href="/articles"> Retourner à la liste des articles </a>
                    </form>
            </div>
        </section>

    </section>

@endsection
