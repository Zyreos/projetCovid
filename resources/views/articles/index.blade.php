@extends('template_home')


@section('css')
    <link rel="stylesheet" href="{{ asset('css/index_articles.css') }}" />
@endsection

@section('content')

    <!-- Carousel -->
    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarouse1" data-slide-to="1"></li>
            <li data-target="#myCarouse1" data-slide-to="2"></li>
        </ol>

        
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/monacoWeb.jpg" alt="Monaco" style="width:100%;">
            </div>

            <div class="item">
                <img src="img/covidsignWeb.jpg" alt="Panneau_Covid" style="width:100%;">
            </div>
            
            <div class="item">
                <img src="img/gelWeb.jpg" alt="Gel_mains" style="width:100%;">
            </div>
        </div>

        
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>

    <!-- Categories -->

    <section class="categ_container">

        <div class="categ_image">
            <img src="img/support.png" alt="Support_gel">
            <h1><a href="#"><button>Supports</button></a></h1>
        </div>
        <div class="categ_image">
            <img src="img/poster.jpg" alt="Poster">
            <h1><a href="#"><button>Posters</button></a></h1>
        </div>
        <div class="categ_image">
            <img src="img/impression.jpg" alt="Impression">
            <h1><a href="#"><button>Impressions</button></a></h1>
        </div>
    </section>

    <div class="lign">
    </div>


    <!-- Articles -->
    <section class="articles_container">
        @foreach ($articles as $article)
        <!--<h1> Article {{ $article->id }} </h1>

        @foreach($categories as $category)
                @if($category->id == $article->category_id)
            <li class="article_category">Catégorie: {{ $category->name }}</li>
                @endif
            @endforeach-->

        <article class="article">
            <div id="image1" class="article_image"></div>
            <div class="article_lign"></div>
            <div class="article_info">
                <h1>{{ $article->name }}</h1>
                <h3>{{ $article->dimensions }}</h3>
                <h2>{{ $article->price }} €</h2> 
            </div>
            <div class="buy_button">
                <a href="#"><button>Ajouter au panier</button></a>
            </div>
        </article>
        
        @endforeach
    </section>

@endsection
