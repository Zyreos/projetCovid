@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Création d'un article</h1>

        <form action="/articles" method="POST">
            @csrf

            <div>
              <input type="text" name="name" placeholder="Nom du produit">
            </div>

            <div>
              <input type="number" name="price" placeholder="Prix">
            </div>

            <div>
              <textarea name="description" rows="10" cols="30" placeholder="Description"></textarea>
            </div>

            <div>
              <input type="text" name="dimensions" placeholder="Dimensions du produit">
            </div>

            <div>
                <select name="Catégorie" size="1">
                    @foreach ($categories as $category)
                        <option> Catégorie {{ $category->name }}
                    @endforeach
                </select>
            <div>

              <button type="submit"> Ajouter </button>
              <a href="/articles"> Annuler </a>
            </div>
        </form>
    </section>

@endsection
