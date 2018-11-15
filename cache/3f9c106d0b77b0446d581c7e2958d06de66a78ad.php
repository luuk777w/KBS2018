<?php $__env->startSection('head'); ?>

    <style>

.red{
    color: red;
}


    </style>

    <?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>



<br>
<div style="alignment: center">
    <a href="https://ikbenrapper.corgiorgy.com"><div class="progress" style="width: 30rem; height: 1.5rem;">
        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div></a>

</div>



<?php if(!empty($_POST["send"])): ?>

    <?php 
$code = filter_input(INPUT_POST, "code");
$vnaam = filter_input(INPUT_POST, "vnaam");
$anaam = filter_input(INPUT_POST, "anaam");
$tvnaam = filter_input(INPUT_POST, "tvnaam");
$email = filter_input(INPUT_POST, "email");


$num = filter_input(INPUT_POST, "num");

if($msg == "Het adres lijkt te bestaan!"){

print('<div class="alert alert-success" role="alert">'.$msg.'</div>');


}else{

print('<div class="alert alert-danger" role="alert">'.$msg.'</div>');

}

 ?>

    <div class="row">

        <div class="col-5">
            <h2 class="text-center">Uw gegevens</h2>
    <form method="post" action="/postcodecheck/check">
        <div class="red">* Verplicht</div>
        Voornaam: <input class="form-control" type="text" name="vnaam" required value="<?php echo e($vnaam); ?>"><br>
    Tussenvoegsels: <input class="form-control" type="text" name='tvnaam'  value="<?php echo e($tvnaam); ?>"><br>
        <div class="red">* Verplicht</div>
        Achternaam: <input class="form-control" type="text" name="anaam" required value="<?php echo e($anaam); ?>"><br>
        <div class="red">* Verplicht</div>
        Postcode: <input class="form-control" type="text" name="code" required value="<?php echo e($code); ?>"><br>
        <div class="red">* Verplicht</div>
        Huisnummer: <input class="form-control" type="text" name="num" required value="<?php echo e($num); ?>"><br>
        <div class="red">* Verplicht</div><br>
    Emailadres: <input class="form-control" type="email" name='email' required value="<?php echo e($email); ?>"><br>
    <br>
    <input type="submit" name="send" class="btn btn-primary" value="Postcode Check">
    <br>

</form>
        </div>
        <div class="col-6" >

    <h3 class="text-center">Uw ingevulde gegevens</h3><br>
<table>
    <tr><td>Voornaam</td><td><?php echo e($data['vnaam']); ?></td></tr>
    <tr><td>Tussenvoegsels</td><td><?php echo e($data['tvnaam']); ?></td></tr>
    <tr><td>Achternaam</td><td><?php echo e($data['anaam']); ?></td></tr>
    <tr><td>Straat</td><td><?php echo e($data['street']); ?></td></tr>
    <tr><td>Huisnummer</td><td><?php echo e($data['huisnummer']); ?></td></tr>
    <tr><td>Postcode</td><td><?php echo e($data['code']); ?></td></tr>
    <tr><td>Provincie</td><td><?php echo e($data['province']); ?></td></tr>
    <tr><td>Stad</td><td><?php echo e($data['city']); ?></td></tr>
    <tr><td>Email-adres</td><td><?php echo e($data['email']); ?></td></tr>

</table>


    <?php if($msg == "Het adres lijkt te bestaan!" && !empty($vnaam) && !empty($anaam) && !empty($email) ): ?>

    <a href="#" class="btn btn-primary">Bezorgmoment kiezen</a>
<?php endif; ?>

        </div>
<?php else: ?>


            <div class="col-5">
                <h2 class="text-center">Uw gegevens</h2>
<form method="post" action="/postcodecheck/check">
    <div class="red">* Verplicht</div>
    Voornaam: <input class="form-control" type="text" name="vnaam" required value="" placeholder="Sjors"><br>
    Tussenvoegsels: <input class="form-control" type="text" name='tvnaam'  value="" placeholder="Rapper"><br>
    <div class="red">* Verplicht</div>
    Achternaam: <input class="form-control" type="text" name="anaam" required value="" placeholder="Peters"><br>
    <div class="red">* Verplicht</div>
    Postcode: <input class="form-control" type="text" name="code" required value="" placeholder="1234AA"><br>
    <div class="red">* Verplicht</div>
    Huisnummer: <input class="form-control" type="text" name="num" required value="" placeholder="12A"><br>
    <div class="red">* Verplicht</div>
    Emailadres: <input class="form-control" type="email" name='email' required value="" placeholder="sjorsbekendvantv@gmail.com"><br>
    <br>
    <input type="submit" name="send" class="btn btn-primary" value="Verzenden">
    <br>

</form>

            </div>
<?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>