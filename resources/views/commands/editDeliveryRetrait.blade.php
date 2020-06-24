@extends('template_home')

@section('css')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

<h1 class="t1">Edition d'une commande</h1>

    <form action="{{ route('commands.updateWithDeliveryRetrait', $command) }}" method="POST" >
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
            <input type="radio" name="mode" value="domicile" id="chk1">
            <label>Livraison à Domicile</label>
        </div>
        <div>
            <input type="radio" name="delivery" value="retrait" id="chk2" checked>
            <label>Livraison en retrait</label>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#chk1').click(function(){
                    window.location.href = "{{ route('commands.editDelivery', [$command->id])}}";
                });
            });
        </script>
        <div>
            <input type="number" name="price" placeholder="Prix" value="7">
        </div>

        <label class="label"> Addresses disponibles :</label>
        <div class="select">
            <select name="id">
                @foreach($addresses as $address)
                    <option value="{{ $address->id }}">{{ $address->address1}}</option>
                @endforeach
            </select name="id">
        </div>

        <button type="submit"> Ajouter </button>
        <a href="/commands"> Annuler </a>

    </form>


@endsection


