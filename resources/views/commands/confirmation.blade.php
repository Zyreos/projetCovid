@extends('template_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />

@endsection

@section('content')


    <h1 class="title">Votre commande à été validé</h1>
    <p class="title">Total : {{$command->total}} €</p>
    <p class="title">Merci !</p>

    <style>


        .title
        {
            font-size: 30px;
            color: #57575F;
            text-align: center;
            margin-left: auto;
            margin-right: auto;

        }

    </style>

@endsection


