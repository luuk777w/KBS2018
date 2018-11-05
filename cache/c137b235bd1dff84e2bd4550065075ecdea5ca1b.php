<?php $__env->startSection('head'); ?>

    <style>
        
        .image{
            width: 35rem;
            height: 26.25rem;
            /*background-image: url("../../assets/img/milka.jpg");*/
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .smallImages{
            margin-top: 1rem;
            margin-left: 1rem;
            width: 8rem;
            height: 6rem;
            float: left;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .firstSmallImage{
            margin-left: 0 !important;
        }

        .cartWishList-button{
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .cartWishList-text{
            display: inline-block;
            padding-top: 0.2rem;
            margin-left: -36px;
        }

        .cartWishList-icon{
            float: left;
        }

        .stock{
            text-align: center;
            margin-bottom: 5px;
        }

        .inStock{
            border: solid #24A647 1px;
            color: #24A647;
            width: 7rem;
        }

        .notInStock{
            border: solid #DB3544 1px;
            color: #DB3544;
            width: 9rem;
        }

        .deliveryTime{
            margin-bottom: 5px;
        }

        .cooledProduct{
            color: #107BFD;
        }

        .cooledProduct-icon{
            margin-right: 0.25rem;
        }

        .services-list{
            list-style: none;
            padding-left: 0;
            line-height: 1.8rem;
        }

        .services-check-icon{
            padding-right: 0.25rem;
            color: #24A647;
        }
    
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <br>

    <h1><?php echo e($productDetails->StockItemName); ?></h1>

    <div class="row">
        <div class="col-7" >
        

            <?php if($media !== NULL): ?>
                <div class="image" style="background-image: url('../../assets/img/<?php echo e($media[0]->MediaUrl); ?>');"></div>
            <?php else: ?>
                <div class="image" style="background-image: url('../../assets/img/img_placeholder.jpg');"></div>
            <?php endif; ?>

            <div class="smallImages firstSmallImage" style="background-image: url('../../assets/img/img_placeholder.jpg');"></div>
            <div class="smallImages" style="background-image: url('../../assets/img/img_placeholder.jpg');"></div>
            <div class="smallImages" style="background-image: url('../../assets/img/img_placeholder.jpg');"></div>
            <div class="smallImages" style="background-image: url('../../assets/img/img_placeholder.jpg');"></div>
        </div>
        <div class="col-5" >
            <h1>€<?php echo e($productDetails->UnitPrice); ?></h1>

            <?php if(true): ?>
                <p class="stock inStock">Op voorraad</p>
                <p class="deliveryTime">Voor 22:00 besteld, morgen in huis!</p>
            <?php else: ?>
                <p class="stock notInStock">Niet op voorraad</p>
            <?php endif; ?>

            <?php if($productDetails->IsChillerStock): ?>
                <p class="cooledProduct"><i class="fas fa-snowflake cooledProduct-icon"></i>Let op! dit is een gekoeld product.</p>
            <?php endif; ?>

            <form method="post" action="/product/addtocart/<?php echo e($productDetails->StockItemID); ?>">
                <button class="btn btn-success cartWishList-button" style="margin-top: 0.5rem;">
                    <i class="fas fa-shopping-cart fa-2x cartWishList-icon"></i>
                    <span class="cartWishList-text">In winkelwagen</span>
                </button>
            </form>

            <button class="btn btn-outline-danger cartWishList-button">
                    <i class="fas fa-heart fa-2x cartWishList-icon"></i>
                    <span class="cartWishList-text">Op verlanglijstje</span>
            </button>

            <ul class="services-list">
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Voor <b>22:00</b> besteld, morgen in huis</li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Gratis verzending boven de <b>€20</b></li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i><b>30</b> dagen niet goed, geld terug garantie</li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Onze klantenservice staat tot <b>22:00</b> voor je klaar</li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Betaal veilig met <b>iDeal</b></li>
            </ul>
        </div>

        <div class="col-12" >
            <hr>
        </div>

        <div class="col-7" >
            <h2>Productinformatie</h2>
            <p><?php echo e($productDetails->SearchDetails); ?></p>
        </div>
        <div class="col-5" >
    
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>