<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Wide World Importers</title>
    <style>
        .footer_background {
        "background-color: yellow"

        }
    </style>

    @yield('head')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


    <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/all.js" integrity="sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN" crossorigin="anonymous"></script>


</head>
<body>

<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="/">Wide World Importers</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/categories">Categorieën</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products">Producten</a>
                </li>
            </ul>

            <ul class="navbar-nav">

                <li class="nav-item">
                    @php
                        $aantalitems = 0;
<<<<<<< HEAD
                        $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                        $cart_data = json_decode($cookie_data, true);
                        foreach ($cart_data as $key => $value){
                            $aantalitems++;
=======
                        if(isset($_COOKIE['shopping_cart'])) {
                            $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                            $cart_data = json_decode($cookie_data, true);
                            if($cart_data == NULL) {
                                $cart_data = [];
                            }
                            foreach ($cart_data as $key => $value){
                                $aantalitems++;
                            }
                            if($aantalitems == 0){
                                $aantalitems = 0;
                            }
>>>>>>> 29ec776466f6f41afc6de58d74100749769cf443
                        }

                        print('<a href="/shoppingcart"><button type="button" class="btn btn-primary">
                                Winkelwagen <span class="badge badge-light">'.$aantalitems.'</span>
                                </button></a>');
                    @endphp
                </li>
                <li>
                    <li class="nav-item">
                    <a class="nav-link" href="/register">Registreer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>

            </ul>
        </div>
    </nav>

    @yield('body')

@yield('footer')
    <footer  class="page-footer font-small blue pt-4">

        <!-- Footer Links -->
        <div  class="container-fluid text-center text-md-left">

            <!-- Grid row -->
            <div class="row ">

                <!-- Grid column -->
                <div  class="col-md-6 mt-md-0 mt-3 bg-light">

                    <!-- Content -->
                    <h5 class="text-uppercase">Contactgegevens</h5>
                    <p>Email: <br>
                    Telefoon: <br>
                    Adres: </p>

                </div>
                <!-- Grid column -->

                <hr class="clearfix w-100 d-md-none pb-3 bg-light">

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 bg-light">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3 bg-light">

                    <!-- Links -->
                    <h5 class="text-uppercase">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

        </div>
        <!-- Footer Links -->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 bg-light">© 2018 Copyright:
            <a style="text-decoration: none; color: black" href="https://youtu.be/9Mq6u6zc7qU?t=18"> WWI</a>
        </div>
        <!-- Copyright -->

    </footer>
</div>



@yield('scripts')

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>
</html>


