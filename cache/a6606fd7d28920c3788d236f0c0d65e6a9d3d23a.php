<?php $__env->startSection('head'); ?>

    <style>

.red{
    color: red;
    display: inline;
}


    </style>

    <?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>


<?php if(isset($data["send"])): ?>

    <?php 

        $vnaam = $data["vnaam"];
        $anaam = $data["anaam"];
        $tvnaam = $data["tvnaam"];
        $email = $data["email"];
        $username = $data["username"];
        $telefoonNr = $data["telefoonNr"];


    if(isset($msg)){
    if($msg == "Het adres lijkt te bestaan!"){

    print('<div class="alert alert-success" role="alert">'.$msg.'</div>');


    }else{

    print('<div class="alert alert-danger" role="alert">'.$msg.'</div>');

    }
        }

     ?>

    <div class="row">

        <div class="col-5">
            <h2 class="text-center">Uw gegevens</h2>
    <form method="post" action="register">
        <div class="red">*</div>
        Voornaam: <input class="form-control" type="text" name="vnaam" required value="<?php echo e($vnaam); ?>"><br>
    Tussenvoegsels: <input class="form-control" type="text" name='tvnaam'  value="<?php echo e($tvnaam); ?>"><br>
        <div class="red">*</div>
        Achternaam: <input class="form-control" type="text" name="anaam" required value="<?php echo e($anaam); ?>"><br>
        <div class="red">*</div>
    Emailadres: <input class="form-control" type="email" name='email' required value="<?php echo e($email); ?>"><br>
        <div class="red">*</div>
    TelefoonNr: <input class="form-control" type="text" name='telefoonNr' required value="<?php echo e($telefoonNr); ?>"><br>
        <div class="red">*</div>
        Gebruikersnaam: <input class="form-control" type="text" name='username' required value="<?php echo e($username); ?>" placeholder=""><br>
        <div class="red">*</div>
        Wachtwoord: <input class="form-control" type="password" name="ww1" required><br>
        <div class="red">*</div>
        Herhaal wachtwoord: <input class="form-control" type="password" name="ww2" required><br>
        <div class="red">* = Verplicht</div><br>
        <input type="submit" name="send" class="btn btn-primary" value="Registreren">
    <br>

</form>
        </div>
<?php else: ?>


            <div class="col-5" >
                <h2 class="text-center">Uw gegevens</h2>
            <form method="post" action="register">
    <div class="red">*</div>
    Voornaam: <input class="form-control" type="text" name="vnaam" required value="" placeholder="Sjors"><br>
    Tussenvoegsels: <input class="form-control" type="text" name='tvnaam'  value="" placeholder="Rapper"><br>
    <div class="red">*</div>
    Achternaam: <input class="form-control" type="text" name="anaam" required value="" placeholder="Peters"><br>
    <div class="red">*</div>
    Emailadres: <input class="form-control" type="email" name='email' required value="" placeholder="sjorsbekendvantv@gmail.com"><br>
    <div class="red">*</div>
    TelefoonNr: <input class="form-control" type="text" name='telefoonNr' required value="" placeholder="0612345678"><br>
    <div class="red">*</div>
    Gebruikersnaam: <input class="form-control" type="text" name='username' required value="" placeholder=""><br>
    <div class="red">*</div>
    Wachtwoord: <input class="form-control" type="password" name="ww1" required><br>
    <div class="red">*</div>
    Herhaal wachtwoord: <input class="form-control" type="password" name="ww2" required><br>
    <div class="red">* = Verplicht</div><br>
    <input type="submit" name="send" class="btn btn-primary" value="Registreren">
    <br>

</form>


            </div>
<?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>