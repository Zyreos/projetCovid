@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/commands.css') }}" />
@endsection

@section('content')

    <section class="user-container">

        <!--<div class="navig-links">
            <button class="button">Nouvelles commandes</button>
            <button class="button" >Commandes en cours</button>
            <button class="button" id="old">Commandes terminées</button>

        </div>-->

        <div class="navig-links">
            <a class="button" href="/users">Comptes</a>
            <a class="button" href="">Commandes</a>
            <a class="button" href="/articles">Articles</a>
        </div>
        <div class="main-infos">

            <div class="commands-infos">
                <h1 class="title">Nouvelles commandes</h1>

                <table id="table">
                    <tr>
                        <th class="table-header">Date</th>
                        <th class="table-header">Numéro commande</th>
                        <th class="table-header">Montant</th>
                        <th class="table-header">Statut</th>
                    </tr>
                    @foreach($commands as $command)
                        @if($command->status_id != 1)
                            <tr>
                                <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}/edit">{{$command->date_validation}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}/edit">{{$command->id}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}/edit">{{$command->total}} €</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/commands/{{$command->id}}">{{$command->status->name}}</a></td>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>


    </section>
@endsection

