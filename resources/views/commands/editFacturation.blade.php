@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <div>
    <h3>1 LIVRAISON</h3>
    <h1>2 PAIEMENT</h1>
    <h3>3 VERIFICATION</h3>
    </div>

    <h1 class="t1">Adrese de Facturation</h1>
    <hr>


    <form action="{{ route('commands.updateWithAddress', $command->id) }}" method="POST" >
        @csrf

        <div>
            <label>Prénom
                <input type="text" name="first_name" value="{{Auth::name()}}">
            </label>

            <label>Nom
                <input type="text" name="last_name" value="{{Auth::name()}}">
            </label>

            <label>Téléphone
                <input type="number" name="phone_number" value="{{Auth::phone_number()}}">
            </label>

            <label>Adresse 1
                <input type="text" name="address1"  placeholder="Addresse 1">
            </label>

            <label>Adresse2
                <input type="text" name="address2" placeholder="Addresse 2">
            </label>

            <label>Ville
                <input type="text" name="city" placeholder="Ville">
            </label>

            <label>Code Postal
                <input type="number" name="postcode" placeholder="Code postal">
            </label>

            <label>Pays
                <input type="text" name="country" placeholder="Pays">
            </label>
        </div>

        <div>
            <h2>Récapitulatif de la commande</h2>
            <hr>
                <p>TOTAL: {{$command->total}}</p>
                <input type="hidden" name="total" value="{{$command->total}}">
        </div>

        <input type="hidden" name="is_bill" value="1">

        <button type="submit"> Continuer </button>
        <a href="/commands"> Annuler </a>
    </form>
    <hr>

    <h2>Information de paiement</h2>


@endsection

