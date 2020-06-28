@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}" />
@endsection

@section('content')

    <section class="global-body">

        <div class="basket">

            @foreach($articles as $article)
                <div class="article">

                <div id="image1" class="article_image"></div>

                <div class="article-info">

                    <h2 class="name">{{$article->name}}</h2>
                    <p>{{$article->dimensions}}</p>
                    <p class="price">Prix unitaire : {{$article->price}} €</p>

                </div>


                <form class="quantity" action="{{route('articles.updateQuantity', $article)}}" method="POST">
                    @csrf
                    <input id="quantity" name="quantity" value="{{$article->quantity}}" min="1">
                    <label for="quantity"></label>

                    <input type="hidden" id="total_price" name="total_price" value="{{$article->price * $article->quantity}}">
                    <button type="submit">Valider</button>
                </form>
                    <p class="s-price">{{$article->price * $article->quantity}} €</p>

                    <div class="delete">
                    <img class="delete" src="/img/quit.png" alt="delete">
                    </div>
                </div>
                <hr class="under-title">

            @endforeach
        </div>

    <div class="recap-div">
        <h2 class="sec-title">Récapitulatif de la commande</h2>
        <hr class="recap-hr">
        <div class="global-infos-div">
            <p class="global-infos">TOTAL :</p><p class="global-infos">{{$command->total}} €</p>
        </div>
        <input type="hidden" name="total" value="{{$command->total}}">
        <button class="submit-button" type="submit"> CONTINUER </button>
    </div>

    </section>
@endsection
