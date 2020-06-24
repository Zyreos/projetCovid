@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/editDelivery.css') }}" />
@endsection

@section('content')

    <div class="command_steps">
        <h1 class="current_step">1 LIVRAISON</h1>
        <h3 class="off_step">2 PAIEMENT</h3>
        <h3 class="off_step">3 VERIFICATION</h3>
    </div>
    <hr class="little_hr">

    <!--<div class="title_group">
    <h2 class="title">Adresse de livraison</h2>
    <hr class="under_title">
    </div>-->


    <form action="{{ route('commands.updateWithDelivery', $command->id) }}" method="POST" >
        @csrf


        <section class="global_body">
        <div class="create_address">
            <div class="title_group">
                <h2 class="title">Adresse de livraison</h2>
                <hr class="under_title">
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
                <input type="text" name="first_name" value="Jolie">
            </label>

            <label>Nom
                <input type="text" name="last_name" value="Pute">
            </label>

            <label>Téléphone
                <input type="number" name="phone_number" value="0123456789">
            </label>

            <label> Adresse 1
                <input type="text" name="address1"  placeholder="Addresse 1">
            </label>

            <label> Adresse 2
                <input type="text" name="address2" placeholder="Addresse 2">
            </label>

            <label> Code postal
                <input type="number" name="postcode" placeholder="Code postal">
            </label>

            <label> Ville
                <input type="text" name="city" placeholder="Ville">
            </label>

            <label> Pays
                <input type="text" name="country" placeholder="Pays">
            </label>

            <input type="hidden" name="is_bill" value="0">

        </div>

        <div class="recap_div">

            <h2 class="sec_title">Récapitulatif de la commande</h2>
            <div class="global_infos_div">
            <p class="global_infos">Sous-total :</p><p class="global_infos">{{$command->total}} € </p>
            </div>
                <div class="global_infos_div">
            <p class="global_infos">Livraison :</p><p class="global_infos">{{$goodDelivery->price}}€</p>
                </div>
            <hr class="recap_hr">
                    <div class="global_infos_div">
            <p class="global_infos">TOTAL :</p><p class="global_infos">{{$command->total + $goodDelivery->price}} €</p>
                    </div>

            <input type="hidden" name="total" value="{{$command->total + $goodDelivery->price}}">
            <button class="submit_button" type="submit"> CONTINUER </button>

        </div>

    </form>
    </section>

@endsection

