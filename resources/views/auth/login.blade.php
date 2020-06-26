@extends('template_home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection

@section('content')

                <h1 class="title">Connexion à votre compte</h1>

                <section class="card-body">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="connexion-div">
                            <label for="email">E-Mail
                                <input id="email" type="email" class="basic-entry-rect @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="password">Mot de passe
                                <input id="password" type="password" class="basic-entry-rect @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <div class="valid-remember">
                                <!--<label for="remember">Souvenez vous de moi
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                </label>-->
                                <button type="submit" class="submit-button">
                                    Se Connecter
                                </button>
                                <a class="submit-button" href="{{route('login')}}">
                                    S'inscrire
                                </a>

                            </div>

                                <!--@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Mot de passe oublié?
                                    </a>
                                @endif-->
                        </div>

                    </form>
                </section>
@endsection
