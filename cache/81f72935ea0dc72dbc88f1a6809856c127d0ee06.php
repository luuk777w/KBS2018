<!doctype html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wide World Importers</title>
        <style>
            html, body{ height:100%; margin:0; }

            body{ 
                display:flex; 
                flex-direction:column; 
            }

            .page-footer{
                margin-top:auto; 
                width: 100%; 
                display: block;
                background-color: #f8f9fa!important;
                padding-top: 0.5rem !important; 
            }


        </style>

        <?php
        session_start();
        ?>
        <?php echo $__env->yieldContent('head'); ?>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">


        <script defer src="https://use.fontawesome.com/releases/v5.4.2/js/all.js" integrity="sha384-wp96dIgDl5BLlOXb4VMinXPNiB32VYBSoXOoiARzSTXY+tsK8yDTYfvdTyqzdGGN" crossorigin="anonymous"></script>


    </head>
    <body>

            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height:80px; display:block;">
                <div class="container">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img style="max-height: 3rem" src="/assets/img/WWI.PNG"></a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="/categories">Categorieën</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/products">Producten</a>
                            </li>

                            <form method="get" class="form-inline my-2 my-lg-0" action="/products/">
                                <input class="form-control mr-sm-2" type="search" placeholder="Uw zoekopdracht" name="q" aria-label="Search">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>
                        </ul>


                        <ul class="navbar-nav">

                            <li class="nav-item">
                                <?php 
                                $aantalitems = 0;

                                if(isset(($_COOKIE['shopping_cart']))) {

                                    $cookie_data = stripslashes($_COOKIE['shopping_cart']);
                                    $cart_data = json_decode($cookie_data, true);

                                    foreach ($cart_data as $key => $value){
                                        $aantalitems++;
                                    }

                                    if($aantalitems == 0){
                                        $aantalitems = 0;
                                    }
                                }
                                 ?>
                                <a href="/shoppingcart"><button type="button" class="btn btn-primary">
                                    Winkelwagen <span class="badge badge-light"><?php echo e($aantalitems); ?></span>
                                </button></a>
                            </li>
                            <li>

                            <?php if(isset($_SESSION['UserId'])): ?>
                                <li class="nav-item"><a class="nav-link" href="/account">Mijn Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="/logout">Uitloggen</a></li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">Registreer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">Login</a>
                                </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">

            <?php echo $__env->yieldContent('body'); ?>

            </div>

            <?php echo $__env->yieldContent('footer'); ?>
            <br>
            <footer class="page-footer font-small blue">
                <div  class="container text-center text-md-left">
                    <div class="row ">
                        <div  class="col-md-6 mt-md-0 mt-3 bg-light">

                            <h5 class="text-uppercase">Contactgegevens</h5>
                            <p>Email: contact@wide-world-importers.cf<br>
                                Telefoon: 088 - 5762300<br>
                                Adres: Campus 2, 8017 CA Zwolle</p>
                        </div>

                        <hr class="clearfix w-100 d-md-none pb-3 bg-light">

                        <div class="col-md-3 mb-md-0 mb-3 bg-light">

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
                        <div class="col-md-3 mb-md-0 mb-3 bg-light">

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
                    </div>
                </div>

                <div class="footer-copyright text-center py-3 bg-light">© 2018 Copyright:
                    <a style="text-decoration: none; color: black" href="https://www.youtube.com/watch?v=Frtax3pXPtg"> WWI</a>
                </div>
            </footer>



        <?php echo $__env->yieldContent('scripts'); ?>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
            </body>
</html>


