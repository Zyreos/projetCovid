@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit_articles.css') }}" />
@endsection

@section('content')

  

  <section class="edition">
    <h1 class="t1">Edition de  {{ $article->name }} :</h1>
    
    <form action="/articles/{{$article->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      {{ method_field('PATCH') }}

        <label for="name">Nom:</label>
        <div>
          <input type="text" name="name" value="{{ $article-> name }}" placeholder="Nouveau nom">
        </div>

        <label for="price">Prix:</label>
        <div>
          <input type="number" name="price" value= "{{ $article-> price}}" placeholder="Nouveau prix">
        </div>

        <label for="description">Description:</label>
        <div>
        <textarea name="description" placeholder="Nouvelle description">{{ $article-> description }}</textarea>
        </div>

        <label for="dimensions">Dimensions:</label>
        <div>
        <input type="text" name="dimensions" value="{{ $article-> dimensions }}" placeholder="Nouvelles dimensions">
        </div>

        <label>Catégorie:</label>
        <div class="select">
          <select class="form-control" name="category_id">
              @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
          </select>
        </div>

        <label>Selectionnez une nouvelle image:</label>
        <div class="upload_img">
          <input type="file" name="pictures" class="form-control">
        </div>

        <div class="edit_article">
          <a href="/articles/{{$article->id}}"> Annuler </a>
          <button type="submit"> Editer </button>
        </div>
    </form>
  </section>

@endsection
