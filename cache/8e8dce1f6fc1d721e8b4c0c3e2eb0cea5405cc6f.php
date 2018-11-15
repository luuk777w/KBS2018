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
        <?php if(isset($searchTerm)): ?>
            <h1>zoekresultaten voor <?php echo e($searchTerm); ?></h1>
        <?php else: ?>
        <h1>Producten</h1>
        <?php endif; ?>

            <--Als er geen producten uit de database komen doe je dit-->
        <?php if($products == NULL): ?>

            /* Geef een header met de tekst Er zijn geen producten gevonden weer met een rooie kleur*/
            <h4 style="color: #DB3544">Er zijn geen producten gevonden</h4>

            /* Als er wel producten uit de database komen doe je dit*/
        <?php else: ?>

            /* Voor ieder product in de array uit de database die je dit*/
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php 
                /* Update de URL naar het volgende: /product/Het product id/de productnaam*/
             $url = "/product/". $product->StockItemID ."/". str_replace(' ', '-', $product->StockItemName);
             ?>

            <div class="card" style="width: 18rem; height:40rem;float:left;margin:10px">

                /* Als er een Primaire foto is aangegeven in de database dan die je dit*/
            <?php if($product->PrimaryMediaURL !== NULL): ?>

                    /* Laat de primaire foto zien in de productcard*/
                    <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($product->PrimaryMediaURL); ?>')"></div>
                    

                    /* Als er geen Primaire foto is aangegeven in de database dan die je dit*/
                <?php else: ?>

                    /* Aan de bovenkant van de productcard laat je de placeholder zien*/
                    <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
                <?php endif; ?>

                /* Dit is de body van de productcard*/
                <div class="card-body">

                    /* Laat de productnaam in H5 zien*/
                    <h5 class="card-title"><?php echo e($product->StockItemName); ?></h5>

                    /* Laat de prijs van het product zien in de productcard*/
                    <h6 class="card-title">Prijs</h6>€<?php echo e($product->UnitPrice); ?>

                    <br>

                    <h6 class="card-title">Categorie</h6>
                    <?php 
                        /* voor iedere gekoppelde categorie print de categorie*/
    foreach ($categories as $categorie){


                    /* als de productID overeenkomt met wat er in de data uit de database komt, print dat de categorienaam met een break*/
    if($categorie->stockitemID == $product->StockItemID){
    print(" ".$categorie->stockgroupname."<br> ");
    }
    }
    print("<br>");

                     ?>

                    /* Laat de descriptie van het product zien in de productcard*/
                    <p class="card-text" style="overflow: hidden; max-height: 3rem"><?php echo e($product->SearchDetails); ?></p>
                    <br>

                    /* Laat een knop naar de productpagina van het product zien in de productcard*/
                    <a href="/product/<?php echo e($product->StockItemID); ?>" style="position: absolute; bottom:10px " class="btn btn-primary">Lees Meer</a>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>