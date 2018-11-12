<?php $__env->startSection('body'); ?>


    <br>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../../assets/img/milka.jpg" alt="Foto een">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../../assets/img/milka.jpg" alt="Foto twee">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://res.cloudinary.com/teepublic/image/private/s--tM4JElmV--/t_Preview/b_rgb:191919,c_limit,f_auto,h_313,q_90,w_313/v1491250418/production/designs/1381795_1" alt="Foto drie">
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
    <br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>