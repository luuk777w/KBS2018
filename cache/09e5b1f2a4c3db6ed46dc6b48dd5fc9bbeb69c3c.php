<?php $__env->startSection('head'); ?>
<style>



h1{
    text-align: center;
}

.imageContainer{
    width: 100%;
    height: 20rem;
    background-image: url('/assets/img/receipt-approved.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

</style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<br>

<div class="imageContainer">
</div>
<br>

<h1>Bedankt voor uw bestelling bij WWI.</h1>
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>