<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Les Hydroalcooliques" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://getbootstrap.com/docs/4.5/getting-started/introduction/"></script>


        <title>Les Hydroalcooliques</title>
        <link rel="stylesheet" href="{{ asset('css/nav_bar.css') }}" />

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('css')

    </head>
    <body>

        <header>
            <nav class="nav_bar">
            <div class="logo">
                <a href="/"> <img  class="logo" src="/img/Capture.png" alt="logo"> </a>
            </div>
            <div class="links">
                <a class="accueil" href="/">ACCUEIL</a>
                <a href="{{route('articles.index')}}">PRODUITS</a>
            </div>

            <div class="auth">
                @if (Auth::user())

                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><img src="/img/logout1.png" alt="login"></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                        <a href="{{route('users.show', [Auth::user()->id])}}"><img src="/img/user.png" alt="user"> </a>
                        <a href="/"><img src="/img/smart-cart.png" alt="basket"> </a>

                @else
                    <a href="{{ route('login') }}"><img src="/img/login1.png" alt="login"></a>
                @endif

            </div>
            </nav>
        </header>

        @yield('content')

        <footer class="footer">
            <div class="logo">
                <img class="logo" src="/img/Capture.png" alt="logo">
            </div>

            <div class="footer_links">
                <a href="#">Politique de confidentialité</a>
                <a href="#">Conditions générales de vente</a>
                <a href="#">Nous contacter</a>
            </div>

            <div class="social">
                <a href="/"> <img src="/img/facebook.png" alt="facebook"> </a>
                <a href="/"> <img src="/img/linked.png" alt="linkedin"> </a>
            </div>

        </footer>
    </body>
</html>
