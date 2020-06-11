@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Article {{ $article->id }} Edition :</h1>


    <form action="/articles/{{$article->id}}" method="POST">
      @csrf
      {{ method_field('PATCH') }}

        <div>
          <input type="text" name="name" value="{{ $article-> name }}" placeholder="Nouveau nom">
        </div>

        <div>
          <input type="number" name="price" value= "{{ $article-> price}}" placeholder="Nouveau prix">
        </div>

        <div>
          <textarea name="description" placeholder="Nouvelle description">{{ $article-> description }}</textarea>
        </div>

        <div>
          <input type="text" name="dimensions" value="{{ $article-> dimensions }}" placeholder="Nouvelles dimensions">
        </div>

        <div>
          <button type="submit"> Editer </button>
          <a href="/articles/{{$article->id}}"> Annuler </a>
        </div>
    </form>

@endsection
