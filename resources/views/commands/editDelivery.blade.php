@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editDelivery.css') }}" />
@endsection

@section('content')

    <div class="command-steps">
        <h1 class="current-step">1 LIVRAISON</h1>
        <h3 class="off-step">2 PAIEMENT</h3>
        <h3 class="off-step">3 VERIFICATION</h3>
    </div>
    <hr class="little-hr">


    <section>

    <form class="global-body" action="{{ route('commands.updateWithDelivery', $command->id) }}" method="POST" >
        @csrf


        <div class="create-address">
            <div class="title-group">
                <h2 class="title">Adresse de livraison</h2>
                <hr class="under-title">
            </div>
            <div class="choice">

                <input type="radio" name="delivery_id" value="{{$goodDelivery->id}}" id="chk1" checked><label for="chk1">Livraison à Domicile</label>
                <input type="radio" name="mode" id="chk2" ><label for="chk2">Livraison en retrait</label>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $('#chk2').click(function(){
                            window.location.href = "{{ route('commands.editDeliveryRetrait', [$command->id])}}";
                        });
                    });
                </script>
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

            <label> Adresse 1
                <input type="text" name="address1"  placeholder="Addresse 1">
            </label>

            <label> Adresse 2
                <input type="text" name="address2" placeholder="Addresse 2">
            </label>

            <label> Code postal
                <input type="text" name="postcode" placeholder="Code postal">
            </label>

            <label> Ville
                <input type="text" name="city" placeholder="Ville">
            </label>

            <label> Pays
                <input type="text" name="country" placeholder="Pays">
            </label>

            <input type="hidden" name="is_bill" value="0">

        </div>

        <div class="recap-div">

            <h2 class="sec-title">Récapitulatif de la commande</h2>
            <div class="global-infos-div">
            <p class="global-infos">Sous-total :</p><p class="global-infos">{{$command->total}} € </p>
            </div>
                <div class="global-infos-div">
            <p class="global-infos">Livraison :</p><p class="global-infos">{{$goodDelivery->price}}€</p>
                </div>
            <hr class="recap-hr">
                    <div class="global-infos-div">
            <p class="global-infos">TOTAL :</p><p class="global-infos">{{$command->total + $goodDelivery->price}} €</p>
                    </div>

            <input type="hidden" name="total" value="{{$command->total + $goodDelivery->price}}">
            <a class="submit-button"  href="{{ route('commands.editFacturation', [$command->id])}}" > Continuer </a>

        </div>

    </form>
    </section>

@endsection

