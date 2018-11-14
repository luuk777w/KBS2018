<?php $__env->startSection('head'); ?>

    <style>




    </style>

    <?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>




    <h5>Een voortgangsbalkie hier</h5>
    <h2 class="text-center">Uw gegevens</h2>


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
print($msg.'<br>');

 ?>
<form method="post" action="/postcodecheck/check">
    Voornaam: <input type="text" name="vnaam" required value="<?php echo e($vnaam); ?>"><br>
    Tussenvoegsels: <input type="text" name='tvnaam'  value="<?php echo e($tvnaam); ?>"><br>
    Achternaam: <input type="text" name="anaam" required value="<?php echo e($anaam); ?>"><br>
    Postcode: <input type="text" name="code" required value="<?php echo e($code); ?>">
    Huisnummer: <input type="number" name="num" required value="<?php echo e($num); ?>"><br>
    Emailadres: <input type="text" name='email' required value="<?php echo e($email); ?>"><br>

    <input type="submit" name="send" class="btn btn-primary" value="Postcode Check">
    <br>

</form>

    <h3>Uw ingevulde gegevens</h3>
<table>
    <tr><td>Voornaam</td><td><?php echo e($data['vnaam']); ?></td></tr>
    <tr><td>Tussenvoegsels</td><td><?php echo e($data['tvnaam']); ?></td></tr>
    <tr><td>Achternaam</td><td><?php echo e($data['anaam']); ?></td></tr>
    <tr><td>Straat</td><td><?php echo e($data['street']); ?></td></tr>
    <tr><td>Huisnummer</td><td><?php echo e($data['huisnummer']); ?></td></tr>
    <tr><td>Provincie</td><td><?php echo e($data['province']); ?></td></tr>
    <tr><td>Stad</td><td><?php echo e($data['city']); ?></td></tr>

</table>
    <h3>Als dit de juiste gegevens zijn kunt u op de <b>Verder</b>-knop klikken</h3>


    <a href="#" class="btn btn-primary">Verder</a>



<?php else: ?>




<form method="post" action="/postcodecheck/check">
    Voornaam: <input type="text" name="vnaam" required value=""><br>
    Tussenvoegsels: <input type="text" name='tvnaam'  value=""><br>
    Achternaam: <input type="text" name="anaam" required value=""><br>
    Postcode: <input type="text" name="code" required value="">
    Huisnummer: <input type="text" name="num" required value=""><br>
    Emailadres: <input type="text" name='email' required value=""><br>
    <input type="submit" name="send" class="btn btn-primary" value="Verzenden">
    <br>

</form>

<?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>