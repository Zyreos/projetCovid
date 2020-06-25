@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editFacturation.css') }}" />
@endsection

@section('content')

    <div class="command_steps">
        <h3 class="off_step">1 LIVRAISON</h3>
        <h1 class="current_step">2 PAIEMENT</h1>
        <h3 class="off_step">3 VERIFICATION</h3>
    </div>
    <hr class="little_hr">

<section>

    <form class="global_body" action="{{ route('commands.updateWithAddress', $command->id) }}" method="POST" >
        @csrf

        <div class="create_address">

            <!-- j'ai ajouté une classe et modifié l'emplacement-->
            <div class="title_group">
                <h2 class="title">Adresse de facturation</h2>
                <hr class="under_title">
            </div>

            <label>Prénom
                <input type="text" name="first_name" value="Jolie">
            </label>

            <label>Nom
                <input type="text" name="last_name" value="Madame">
            </label>

            <label>Téléphone
                <input type="text" name="phone_number" value="0123456789">
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

            <hr class="under_title">

            <h2 class="sec_title">Information de paiement</h2>
            <img class="paypal_img" src="/img/Paypal.png" alt="PayPayl_img">

        </div>

        <div class="recap_div">
            <h2 class="sec_title">Récapitulatif de la commande</h2>
            <hr class="recap_hr">
            <div class="global_infos_div">
                <p class="global_infos">TOTAL :</p><p class="global_infos">{{$command->total}}</p>
            </div>
            <input type="hidden" name="total" value="{{$command->total}}">
            <button class="submit_button" type="submit"> CONTINUER </button>
        </div>

    </form>
</section>


@endsection

