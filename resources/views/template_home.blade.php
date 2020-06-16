<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Les Hydroalcooliques" />
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <title>Les Hydroalcooliques</title>

        @yield('css')

    </head>
    <body>
        <header class="nav_bar">
            <img class="logo" src="img/Capture.png" alt="logo">
            
            <div class="links">
                <a href="#">ACCUEIL</a>
                <a href="#">PRODUITS</a>
            </div>
            
            <div class="auth">
                <img src="img/login1.png" alt="login">
                <img src="img/user.png" alt="user">
                <img src="img/smart-cart.png" alt="basket">
            </div>
        </header>

        @yield('content')

        <footer class="footer">
            <img class="logo" src="img/Capture.png" alt="logo">
            
            <div class="footer_links">
                <a href="#">Politique de confidentialité</a>
                <a href="#">Conditions générales de vente</a>
                <a href="#">Nous contacter</a>
            </div>

            <div class="social">
                <img src="img/facebook.png" alt="facebook">
                <img src="img/linkedin.png" alt="linkedin">
            </div>

        </footer>

    </body>
</html>
