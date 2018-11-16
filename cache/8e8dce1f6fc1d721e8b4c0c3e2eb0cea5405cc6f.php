<?php $__env->startSection('head'); ?>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wide World Importers GANG</title>

    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/

        .card-img-top{
            width: 100%;
            height: 15rem;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <div style="margin: auto; width: 58rem; overflow: auto;">
        <h1>Producten</h1>

        <?php if($products == NULL): ?>
            <h4 style="color: #DB3544">Er zijn geen producten gevonden</h4>
        <?php else: ?>
            <form method="post" action="products.blade.php">
                <select name="orderby">
                    <option value="order by stockitemname">A-Z</option>
                    <option value="order by stockitemname DESC">Z-A</option>
                </select>
            </form>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php 
                $url = "/product/". $product->StockItemID ."/". str_replace(' ', '-', $product->StockItemName);
             ?>

            <div class="card" style="width: 18rem; height:35rem;float:left;margin:10px">

                <?php if($product->PrimaryMediaURL !== NULL): ?>
                    <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($product->PrimaryMediaURL); ?>')"></div>
                    
                <?php else: ?>
                    <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
                <?php endif; ?>

                <div class="card-body">
                    <h5 class="card-title"><?php echo e($product->StockItemName); ?></h5>
                    <h6 class="card-title">Prijs</h6>€<?php echo e($product->UnitPrice); ?>

                    <br>
                    <h6 class="card-title">Categorie</h6>
                    <?php 
                    foreach ($categories as $categorie){

                    if($categorie->stockitemID == $product->StockItemID){
                    print(" ".$categorie->stockgroupname."<br> ");
                    }
                    }
                    print("<br>");

                     ?>

                    <p class="card-text" style="overflow: hidden; max-height: 3rem"><?php echo e($product->SearchDetails); ?></p>
                    <br>
                    <a href="/product/<?php echo e($product->StockItemID); ?>" style="position: absolute; bottom:10px " class="btn btn-primary">Lees Meer</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>