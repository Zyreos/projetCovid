@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/users.css') }}" />
@endsection

@section('content')

    <section class="user-container">

        <div class="navig-links">
            <a class="button" href="">Comptes</a>
            <a class="button" href="/indexM">Commandes</a>
            <a class="button" href="">Articles</a>
        </div>

        <div class="main-infos">

            <div class="commands-infos">
                <h1 class="title">Listes des comptes</h1>

                <table>
                    <tr>
                        <th class="table-header">Nom</th>
                        <th class="table-header">Prénom</th>
                        <th class="table-header">Entreprise</th>
                        <th class="table-header">Téléphone</th>
                        <th class="table-header">E-mail</th>
                        <th class="table-header">Rôle</th>
                    </tr>
                    @foreach($users as $user)


                            <tr>
                                <td class="table-row"><a class="links-to-cmd" href="/users/{{$user->id}}/editM">{{$user->first_name}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/users/{{$user->id}}/editM">{{$user->last_name}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/users/{{$user->id}}/editM">{{$user->company}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/users/{{$user->id}}/editM">{{$user->phone_number}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/users/{{$user->id}}/editM">{{$user->email}}</a></td>
                                <td class="table-row"><a class="links-to-cmd" href="/users/{{$user->id}}/editM">{{$user->role->name}}</a></td>
                            </tr>

                    @endforeach
                </table>
            </div>
        </div>

    </section>


@endsection
