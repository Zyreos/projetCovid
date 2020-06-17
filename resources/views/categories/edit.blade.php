@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>Catégorie {{ $category->id }} Edition :</h1>


    <form action="/categories/{{$category->id}}" method="POST">
        @csrf
        {{ method_field('PATCH') }}

        <div>
            <input type="text" name="name" value="{{ $category-> name }}" placeholder="Nouveau nom">
        </div>

        <div>
            <button type="submit"> Editer </button>
            <a href="/catégorie/{{$category->id}}"> Annuler </a>
        </div>
    </form>

@endsection
