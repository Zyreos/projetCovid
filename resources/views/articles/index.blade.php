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

    <div class="categ_images">
        <img src="img/support.png" alt="Support_gel">
        <img src="img/poster.jpg" alt="Poster">
        <img src="img/impression.jpg" alt="Impression">
    </div>

    <div class="categ_buttons">
        <a href="#"><button>Supports</button></a>
        <a href="#"><button>Posters</button></a>
        <a href="#"><button>Impressions</button></a>
    </div>


    <!-- Articles -->

    @foreach ($articles as $article)
    <h1> Article {{ $article->id }} </h1>

    @foreach($categories as $category)
            @if($category->id == $article->category_id)
        <li class="article_category">Catégorie: {{ $category->name }}</li>
            @endif
        @endforeach

    <ul class="article_info">
        <li class="article_name">Nom: {{ $article->name }}</li>
        <li class="article_dimensions">Dimensions: {{ $article->dimensions }}</li>
        <li class="article_price">Prix: {{ $article->price }}</li>
    </ul>
    @endforeach

@endsection
