@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editFacturation.css') }}" />
@endsection

@section('content')

    <div class="command-steps">
        <h3 class="off-step">1 LIVRAISON</h3>
        <h1 class="current-step">2 PAIEMENT</h1>
        <h3 class="off-step">3 VERIFICATION</h3>
    </div>
    <hr class="little-hr">

<section>

    <form class="global-body" action="{{ route('commands.updateWithAddress', $command->id) }}" method="POST" >
        @csrf

        <div class="create-address">

            <!-- j'ai ajouté une classe et modifié l'emplacement-->
            <div class="title-group">
                <h2 class="title">Adresse de facturation</h2>
                <hr class="under-title">
            </div>

            <label>Prénom
                <input type="text" name="first_name">
            </label>

            <label>Nom
                <input type="text" name="last_name">
            </label>

            <label>Téléphone
                <input type="text" name="phone_number">
            </label>

            <label>Adresse 1
                <input type="text" name="address1">
            </label>

            <label>Adresse2
                <input type="text" name="address2">
            </label>

            <label>Ville
                <input type="text" name="city">
            </label>

            <label>Code Postal
                <input type="number" name="postcode">
            </label>

            <label>Pays
                <input type="text" name="country">
            </label>

            <input type="hidden" name="is_bill" value="1">

            <hr class="under-title">

            <h2 class="sec-title">Information de paiement</h2>
            <img class="paypal-img" src="/img/Paypal.png" alt="PayPayl_img">

        </div>

        <div class="recap-div">
            <h2 class="sec-title">Récapitulatif de la commande</h2>
            <hr class="recap-hr">
            <div class="global-infos-div">
                <p class="global-infos">TOTAL :</p><p class="global-infos">{{$command->total}} €</p>
            </div>
            <input type="hidden" name="total" value="{{$command->total}}">
            <button class="submit-button"> Continuer </button>
        </div>

    </form>
</section>

@endsection

