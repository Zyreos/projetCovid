@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/users_show.css') }}" />
@endsection

@section('content')

    <section class="user-container">

        <div class="navig-links">
            <h2 class="button">Tableau de bord</h2>
            <h2 class="button">Mes informations</h2>
        </div>

        <div class="main-infos">
        <div class="user-infos-div">

                <h1 class="title">Bonjour, {{$user->first_name}} {{$user->last_name}}</h1>

                <h3 class="user-infos">{{ $user->email }}</h3>
                <h3 class="user-infos">{{ $user->company }}</h3>
                <h3 class="user-infos">{{ $user->phone_number}}</h3>
        </div>

        <div class="commands-infos">
            <h1 class="title">Historique des commandes</h1>

            <table>
                <tr>
                    <th class="table-header">Date</th>
                    <th class="table-header">Numéro commande</th>
                    <th class="table-header">Montant</th>
                    <th class="table-header">Statut</th>
                </tr>
                @foreach($commands as $command)
                    @if($command->user_id == $user->id)
                        <tr>
                            <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}">{{$command->date_validation}}</a></td>
                            <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}">{{$command->id}}</a></td>
                            <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}">{{$command->total}} €</a></td>
                            <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}">{{$command->status_id}}</a></td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        </div>

    </section>


@endsection
