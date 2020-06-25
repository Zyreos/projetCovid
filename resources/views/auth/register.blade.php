@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection
@section('content')

                <h1 class="title">Inscription</h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="inscription-div">
                            <label for="name">Prénom*
                                <input id="name" type="text" class="basic-entry-rect @error('name') is-invalid @enderror" name="first_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="name">Nom*
                                <input id="last-name" type="text" class="basic-entry-rect @error('name') is-invalid @enderror" name="last_name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="email">E-Mail*
                                <input id="email" type="email" class="basic-entry-rect @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            </label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="company">Entreprise
                                <input id="company" type="text" class="basic-entry-rect @error('company') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="company">
                            </label>
                                @error('company')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="phone_number">Numéro de téléphone*
                                <input id="phone_number" type="text" class="basic-entry-rect @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                            </label>
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="password">Mot de passe*
                                <input id="password" type="password" class="basic-entry-rect @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </label>
                            <p>Minimum 8 caractères dont 1 chiffre et une majuscule.</p>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="password-confirm">Confirmation du Mot de passe*
                                <input id="password-confirm" type="password" class="basic-entry-rect" name="password_confirmation" required autocomplete="new-password">
                            </label>

                            <input type="hidden" name="role_id" value="1">

                            <strong class="obligatory">* Champs obligatoires</strong>
                            <div class="valid-insc">
                                <label> J'accepte les conditions d'utilisation
                                <input class="use-cond" type="checkbox">
                                </label>
                                <button type="submit" class="submit-button">
                                    S'inscrire
                                </button>
                            </div>

                        </div>

@endsection
