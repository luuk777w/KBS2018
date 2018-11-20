<?php $__env->startSection('body'); ?>

    <body id="LoginForm">
    <div class="container col-5">
        <h1 class="form-heading">Inloggen</h1>
        <div class="login-form">
            <div class="main-div">
                <div class="panel">
                    <p>Vul hier uw gebruikersnaam en wachtwoord in</p>
                </div>
                <?php
                    //Print een eventuele msg uit de controller
                print($msg);
                ?>

                <form id="Login" method="post" action="/login/check">

                    <div class="form-group">

                        Gebruikersnaam
                        <input type="text" class="form-control" name="username" placeholder="Gebuikersnaam">

                    </div>

                    <div class="form-group">

                        Wachtwoord
                        <input type="password" class="form-control" name="password" placeholder="Wachtwoord">

                    </div>
                    <div class="forgot">
                        <a href="reset.html">Wachtwoord vergeten?</a>
                    </div>
                    <button type="submit" style="float: right" class="btn btn-primary">Login</button>

                </form>

            </div>
        </div>
    </div>
    </body>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>