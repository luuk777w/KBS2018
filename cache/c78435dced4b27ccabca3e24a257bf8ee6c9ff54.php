<style>

    .Loucasoutisme{
        text-align: left;


    }

    .Hoofdtitels{
        text-align: center;
        color:grey;
    }
    .carousel-image{
        width: 100%;
        height: 25rem;
        /*background-image: url("../../assets/img/milka.jpg");*/
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<?php $__env->startSection('head'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<br>
<div class="Hoofdtitels">
    <h3>Dit zijn de superaanbiedingen voor vandaag</h3>
</div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-image" style="background-image: url('/assets/img/milka.jpg');" ></div>
        </div>
        <div class="carousel-item">
            <div class="carousel-image" style="background-image: url('/assets/img/usb_missle_launcher_green_1.jpg');" ></div>
        </div>
        <div class="carousel-item">
            <div class="carousel-image" style="background-image: url('/assets/img/mug.jpeg');" ></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="Loucasoutisme">
    <h2>Actieartikelen</h2>
</div>
<br>
<div class="image1" >

    <img src="/assets/img/usb_missle_launcher_gray_1.jpg">
    <br>pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
    vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
    Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
    Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
    Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>