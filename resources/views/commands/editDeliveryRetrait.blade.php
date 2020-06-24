@extends('template_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1>1 LIVRAISON</h1>
    <h3>2 PAIEMENT</h3>
    <h3>3 VERIFICATION</h3>

    <h2>Adresse de livraison</h2>
    <hr>
    <section>
    <form action="{{ route('commands.updateWithDeliveryRetrait', $command) }}" method="POST" >
        @csrf

            <input type="radio" name="mode" id="chk1">
            <label>Livraison à Domicile</label>

            <input type="radio" name="delivery_id" value="{{$goodDelivery->id}}" id="chk2" checked>
            <label>Livraison en Retrait</label>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#chk1').click(function(){
                    window.location.href = "{{ route('commands.editDelivery', [$command->id])}}";
                });
            });
        </script>
        <hr>

        <div>
        <h3>Sélectionner votre mode de livraison</h3>
        <div class="select">
            <select name="id">
                @foreach($addresses as $address)
                    <option value="{{ $address->id }}">{{ $address->address1}}</option>
                @endforeach
            </select>
        </div>
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


