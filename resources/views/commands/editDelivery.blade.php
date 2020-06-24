@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <div>
    <h1>1 LIVRAISON</h1>
    <h3>2 PAIEMENT</h3>
    <h3>3 VERIFICATION</h3>
    </div>
    <hr>

    <h2>Adresse de livraison</h2>
    <hr>
    <section>
    <form action="{{ route('commands.updateWithDelivery', $command->id) }}" method="POST" >
        @csrf

            <input type="radio" name="delivery_id" value="{{$goodDelivery->id}}" id="chk1" checked>
            <label>Livraison à Domicile</label>

            <input type="radio" name="mode" id="chk2" >
            <label>Livraison en retrait</label>


        <script type="text/javascript">
            $(document).ready(function(){
                $('#chk2').click(function(){
                    window.location.href = "{{ route('commands.editDeliveryRetrait', [$command->id])}}";
                });
            });
        </script>

        <div>
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

        <div>
            <h2>Récapitulatif de la commande</h2>

            <p>Sous-total : {{$command->total}} € </p>
            <p>Livraison : {{$goodDelivery->price}}€</p>

            <input type="hidden" name="price" value="10">

            <hr>
            <p>TOTAL : {{$command->total + $goodDelivery->price}} €</p>

            <input type="hidden" name="total" value="{{$command->total + $goodDelivery->price}}">
            <button type="submit"> Continuer </button>

        </div>



    </form>
    </section>

@endsection

