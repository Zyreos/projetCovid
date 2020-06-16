@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <section class="creation">
        <h1 class="t1">Edition d'une commande</h1>

        <form action="/commands/{{$command->id}}" method="POST" >
            @csrf
            {{ method_field('PATCH') }}
            <div>
                <input type="date" name="date_validation" placeholder="Date de validation">
            </div>

            <div>
                <input type="number" name="total" placeholder="Total">
            </div>

            <label class="label">Statut</label>
            <div class="select">
                <select name="satus_id">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <label class="label"> Mode de livraison</label>
            <div class="select">
                <select name="delivery_id">
                    @foreach($deliveries as $delivery)
                        <option value="{{ $delivery->id }}">{{ $delivery->mode }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="text" name="{{$address->address1}}" placeholder="Addresse 1">
            </div>
            <div>
                <input type="text" name="address" placeholder="Addresse 2">
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

            <button type="submit"> Ajouter </button>
            <a href="/commands"> Annuler </a>
        </form>
    </section>

@endsection

