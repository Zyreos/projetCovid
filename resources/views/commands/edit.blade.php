@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" />
@endsection

@section('content')

    <h1 class="t1">Edition d'une commande</h1>

    <form action="{{ route('commands.update', $command->id) }}" method="POST" >
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
        <label class="label"> Mode de livraison</label>
        <div class="select">
            <select name="delivery_id">
                @foreach($deliveries as $delivery)
                    <option value="{{ $delivery->id }}">{{ $delivery->mode }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"> Ajouter </button>
        <a href="/commands"> Annuler </a>

    </form>
@endsection
