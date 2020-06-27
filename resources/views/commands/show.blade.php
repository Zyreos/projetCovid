@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')


    <section class="user-container">

        <div class="navig-links">
            <a class="button" href="">Tableau de bord</a>
            <a class="button" href="/users/{{$user->id}}/edit">Mes informations</a>
        </div>


        <div class="main-infos">

            <h1>Détail de la commande - {{ $command->id }}</h1>

            <div class="commands-infos">

                <div class="articles">

                    <h2>Montant :</h2>

                    @foreach($command->articles as $article)
                        <div>
                            <p>{{ $article->name }} x{{$article->quantity}}</p>
                            <p>{{$article->total_price}} €</p>
                        </div>
                    @endforeach

                    <div>

                        <p>Livraison</p>
                        <p>{{$delivery->price}}</p>

                    </div>

                    <div>

                        <p>TOTAL</p>
                        <p>{{$command->total}} €</p>
                    </div>

                </div>

                <div class="info">

                    @foreach($command->addresses as $address)

                    @if($address->is_bill == 1)
                            <h3>Adresse de facturation</h3>
                    <p>{{$address->address1}}, {{$address->address2}}, {{$address->city}}, {{$address->postcode}}, {{$address->country}}</p>

                    @else($address->id_bill == 0)
                    <h3>Adresse de livraison</h3>

                        <p>{{$address->address1}}, {{$address->address2}}, {{$address->city}}, {{$address->postcode}}, {{$address->country}}</p>
                    @endif

                    @endforeach
                    <h3>Date de validation</h3>

                    <p>{{$command->date_validation}}</p>

                </div>


                </div>

                </div>

    </section>


    <a href="/commands"> Retourner à la liste des commandes </a>

@endsection
