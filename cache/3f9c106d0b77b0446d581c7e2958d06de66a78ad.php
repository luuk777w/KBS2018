<?php $__env->startSection('head'); ?>


    <?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>

<?php

if(!empty($_POST["send"])) {

$code = filter_input(INPUT_POST, "code");

$num = filter_input(INPUT_POST, "num");

print($msg.'<br>');
print_r($data);

?>
<form method="post" action="/postcodecheck/check">
    Postcode: <input type="text" name="code" value="<?php echo($code)?>">
    Huisnummer: <input type="text" name="num" value="<?php echo($num)?>">
    <input type="submit" name="send" value="Verzenden">
    <br>

</form>
<?php

}else{
?>

<form method="post" action="/postcodecheck/check">
    Postcode: <input type="text" name="code" value="">
    Huisnummer: <input type="text" name="num" value="">
    <input type="submit" name="send" value="Verzenden">
    <br>

</form>

<?php
}
?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>