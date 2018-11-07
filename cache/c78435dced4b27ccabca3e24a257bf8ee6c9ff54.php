<?php $__env->startSection('head'); ?>

<style>

    .img{
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    .services-check-icon{
        padding-right: 0.25rem;
        color: #24A647;
    }

    .carousel-control-next-icon{
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%707070' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
    }

    .carousel-control-prev-icon{
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%707070' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
    }


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

        .Percypestmij{
            margin: auto ;

        }
    </style>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('body'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm"><i class="fas fa-check services-check-icon"></i>
                Voor <b>22:00</b> besteld, morgen in huis
            </div>
            <div class="col-sm"><i class="fas fa-check services-check-icon"></i>
                Gratis verzending boven de <b>€20</b>
            </div>
            <div class="col-sm"><i class="fas fa-check services-check-icon"></i>
                <b>30</b> dagen niet goed, geld terug garantie
            </div>
        </div>
    </div>
    <br>
    <div class="Hoofdtitels">
        <h3>Dit zijn de superaanbiedingen voor vandaag</h3>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-image" style="background-image: url('/assets/img/milka.jpg');" ></div>
                <div class="Percypestmij">Een lekkere chocoladereep</div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image: url('/assets/img/usb_missle_launcher_green_1.jpg');" ></div>
                <div class="Percypestmij"> Om je ergste vijanden mee af te handelen.</div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image: url('/assets/img/mug.jpeg');" ></div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>De Mok</h5>
                    <p>MokkaMok</p>
                </div>
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

        <br>
        pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
        vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
        Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.
        Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
        Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>