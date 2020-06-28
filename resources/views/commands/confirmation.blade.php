@extends('template_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />

@endsection

@section('content')

<h1>Détail de la commande - {{ $command->id }}</h1>

<div>
    <h1>Votre commande à été validé</h1>

    <li>Date de validation: {{ $command->date_validation }}</li>
    <li>Total: {{ $command->total }}</li>




    <a href="/commands"> Retourner à la liste des commandes </a>


    @endsection


