@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show_users.css') }}" />
@endsection

@section('content')

    <section class="user-container">

        <div class="main-infos">
        <div class="user-infos">

                <h1 class="title">Bonjour, {{$user->name}}</h1>

                <h3 class="user-infos">{{ $user->email }}</h3>
                <h3 class="user-infos">{{ $user->company }}</h3>
                <h3 class="user-infos">{{ $user->phone_number}}</h3>
        </div>

        <div class="commands-infos">
            <h1 class="title">Historique des commandes</h1>

            <table>
                <tr>
                    <td class="table-header">Date</td>
                    <td class="table-header">Numéro commande</td>
                    <td class="table-header">Montant</td>
                    <td class="table-header">Statut</td>
                </tr>
                @foreach($commands as $command)
                    @if($command->user_id == $user->id)
                        <tr>
                            <td class="table-row"><a href="/">{{$command->date_validation}}</a></td>
                            <td class="table-row"><a href="/">{{$command->id}}</a></td>
                            <td class="table-row"><a href="/">{{$command->total}} €</a></td>
                            <td class="table-row"><a href="/">{{$command->status_id}}</a></td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        </div>

        <div class="navig-links">
            <h2 class="button">Tableau de bord</h2>
            <h2 class="button">Mes informations</h2>
        </div>



    </section>


@endsection
