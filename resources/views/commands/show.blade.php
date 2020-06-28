@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/commands_show.css') }}" />
@endsection

@section('content')


    <section class="user-container">

        <div class="navig-links">
            <a class="button" href="">Tableau de bord</a>
            <a class="button" href="/users/{{$user->id}}/edit">Mes informations</a>
        </div>


        <div class="main-infos">

            <h1 class="title">Détail de la commande - {{ $command->id }}</h1>

            <div class="commands-infos">

                <div class="articles">

                    <h2 class="title-sec">Montant</h2>

                    @foreach($command->articles as $article)
                        <div class="list-montant">
                            <p>{{ $article->name }} x{{$article->quantity}}</p>
                            <p>{{$article->total_price}} €</p>
                        </div>
                    @endforeach

                    <div class="list-montant">

                        <p>Livraison</p>
                        <p>{{$delivery->price}} €</p>

                    </div>

                    <div class="list-montant">

                        <p>TOTAL</p>
                        <p>{{$command->total}} €</p>
                    </div>

                </div>

                <div class="info">

                    @foreach($command->addresses as $address)

                    @if($address->is_bill == 1)
                            <h2 class="title-sec">Adresse de facturation</h2>
                    <p>{{$address->address1}}, {{$address->address2}}, {{$address->city}}, {{$address->postcode}}, {{$address->country}}</p>

                    @else($address->id_bill == 0)
                    <h2 class="title-sec">Adresse de livraison</h2>

                        <p>{{$address->address1}}, {{$address->address2}}, {{$address->city}}, {{$address->postcode}}, {{$address->country}}</p>
                    @endif

                    @endforeach
                    <h2 class="title-sec">Date de validation</h2>

                    <p>{{$command->date_validation}}</p>

                </div>


                </div>

                </div>


    </section>





@endsection
