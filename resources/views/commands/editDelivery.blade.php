@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1 class="t1">Edition d'une commande</h1>

    <form action="{{ route('commands.updateWithDelivery', $command->id) }}" method="POST" >
        @csrf
        <div>
            <input type="date" name="date_validation" placeholder="Date de validation">
        </div>

        <div>
            <input type="number" name="total" placeholder="Total">
        </div>

        <label class="label">Statut</label>
        <div class="select">
            <select name="status_id">
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                @endforeach
            </select>
        </div>

        <h1>Sélection du mode livraison</h1>
        <div>
            <input type="radio" name="mode" value="domicile" id="chk1" checked>
            <label>Livraison à Domicile</label>
        </div>
        <div>
            <input type="radio" name="mode" value="retrait"id="chk2" >
            <label>Livraison en retrait</label>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#chk2').click(function(){
                    window.location.href = "{{ route('commands.editDeliveryRetrait', [$command->id])}}";
                });
            });
        </script>
        <div>
            <input type="number" name="price" placeholder="Prix" value="7">
        </div>

        <h1 class="t1">Création d'une addresse de livraison à domicile </h1>
        <div>
            <input type="text" name="address1"  placeholder="Addresse 1">
        </div>
        <div>
            <input type="text" name="address2" placeholder="Addresse 2">
        </div>
        <div>
            <input type="number" name="postcode" placeholder="Code postal">
        </div>
        <div>
            <input type="text" name="city" placeholder="Ville">
        </div>
        <div>
            <input type="text" name="country" placeholder="Pays">
        </div>
        <div>
            <input type="hidden" name="is_bill" value="1">
        </div>



        <button type="submit"> Ajouter </button>
        <a href="/commands"> Annuler </a>

    </form>


@endsection

