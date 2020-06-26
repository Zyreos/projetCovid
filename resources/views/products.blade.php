@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />
@endsection

@section('content')

    <!--Test JS pour trier les articles en fonctions des catégories

            <script type="text/javascript">
            $(document).ready(function(){
                $('#category1').click(function(){
                    if()
                    ;
                });
            });
        </script>-->

    <!--Filtrage-->
    <section class="container">
        <div class="filter_container">
            <h1>Catégorie :</h1>

                <div class="form-check ml-5">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Supports
                    </label>
                </div>

                <div class="form-check ml-5">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Posters
                    </label>
                </div>

                <div class="form-check ml-5">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Impressions
                    </label>
                </div>

            <h1>Prix :</h1>

            <div class="form-check ml-5">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Croissant
                </label>
            </div>

            <div class="form-check ml-5">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Décroissant
                </label>
            </div>
        </div>
    

        <!-- Articles -->

        <div class="articles_container">
            @foreach ($articles as $article)
            <!--<h1> Article {{ $article->id }} </h1>

                    @foreach($categories as $category)
                @if($category->id == $article->category_id)
                    <li class="article_category">Catégorie: {{ $category->name }}</li>
                            @endif
                        @endforeach-->

                    <article class="article">
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
                        <div class="article_lign"></div>
                        <div class="article_info">
                            <h1>{{ $article->name }}</h1>
                            <h3>{{ $article->dimensions }}</h3>
                            <h2>{{ $article->price }} €</h2>
                        </div>

                        <div class="buy_button">
                            <a href="#">Ajouter au panier</a>
                        </div>
                    </article>

            @endforeach
        </div>
    </section>

@endsection
