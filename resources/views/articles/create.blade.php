@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/create_articles.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Ajout d'un article</h1>

        <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div>
              <input type="text" name="name" placeholder="Nom du produit">
            </div>

            <div>
              <input type="number" name="price" placeholder="Prix">
            </div>

            <div>
              <textarea name="description" rows="10" cols="125" placeholder="Description"></textarea>
            </div>

            <div>
              <input type="text" name="dimensions" placeholder="Dimensions du produit">
            </div>

            <label class="label">Catégorie</label>
            <div class="select">
                <select class="form-control selector" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="upload_img">
                <label class="label">Selectionnez une image</label>
                <input type="file" name="pictures" class="form-control">
            </div>

            <div class="add_article">
              <a href="/articles"> Annuler </a>
              <button type="submit"> Ajouter </button>
            </div>
        </form>
    </section>

@endsection
