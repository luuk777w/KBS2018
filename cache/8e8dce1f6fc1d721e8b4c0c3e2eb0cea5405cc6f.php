<?php $__env->startSection('head'); ?>


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wide World Importers GANG</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

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
        .prijsl{
            width: 4rem;
            float: center;
        }
        .prijsr{
            width: 4rem;
            /*float: right;*/
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


        

        <?php if($products == NULL): ?>

            
            <h4 style="color: #DB3544">Er zijn geen producten gevonden</h4>

            
        <?php else: ?>
                <?php 
                    if(!isset($_POST['orderby'])){
                        $_POST['orderby'] = "";
                    }

                    $orderby = $_POST['orderby'];
                    if($orderby == "orderbyname"){
                    $tekst = "A-Z";
                    } elseif($orderby == "orderbynamedesc"){
                    $tekst= "Z-A";
                    } elseif($orderby == "orderbyprijs"){
                    $tekst = "Prijs (Laag-Hoog)";
                    } elseif($orderby == "orderbyprijsdesc"){
                    $tekst = "Prijs(Hoog-Laag)";
                    } else{
                    $tekst = "sorteer op";
                    }
                 ?>

            <form method="post" action="/products">
                    <select name="orderby" class="custom-select mr-sm-2" id="inlineFormCustomSelect" onchange="this.form.submit()" style="width: 20rem">
                    <option value=<?php if(isset($_POST['orderby'])){ echo $_POST['orderby'];}?>><?php print($tekst); ?></option>
                    
                    <option value="orderbyname" >A-Z</option>
                    <option value="orderbynamedesc" >Z-A</option>
                    <option value="orderbyprijs" >Prijs(Laag-Hoog)</option>
                    <option value="orderbyprijsdesc" >Prijs(Hoog-Laag)</option>
                </select>
            </form>
            <br>Prijs</br>
            <form method="post" action="/products">
                <br>€
                <input type="number" min="0" class="prijsl" name="minprijs">
                tot<input type="number" min="0" max="90000" class="prijsr" name="maxprijs">
                <input name='sorteren' type="submit" value="filteren" class="btn btn-primary" style="height: 2rem; line-height: 1rem; margin-bottom: 0.3rem;">
                <br><br>
            </form>
            
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php 
                // Update de URL naar het volgende: /product/Het product id/de productnaam
             $url = "/product/". $product->StockItemID ."/". str_replace(' ', '-', $product->StockItemName);
             ?>

            <div class="card" style="width: 18rem; height:40rem;float:left;margin:10px">

                 
            <?php if($product->PrimaryMediaURL !== NULL): ?>

                    
                    <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($product->PrimaryMediaURL); ?>')"></div>
                    

                    
                <?php else: ?>

                    
                    <div class="card-img-top" style="background-image: url('/assets/img/placeholder.jpg')"></div>
                <?php endif; ?>

                
                <div class="card-body">

                    
                    <h5 class="card-title"><?php echo e($product->StockItemName); ?></h5>

                    
                    <h6 class="card-title">Prijs</h6>€<?php echo e($product->RecommendedRetailPrice); ?>

                    <br>

                    <h6 class="card-title">Categorie</h6>
                    <?php 
                        // voor iedere gekoppelde categorie print de categorie
                    foreach ($categories as $categorie){


                                    //  als de productID overeenkomt met wat er in de data uit de database komt, print dat de categorienaam met een break
                    if($categorie->stockitemID == $product->StockItemID){
                    print(" ".$categorie->stockgroupname."<br> ");
                    }
                    }
                    print("<br>");

                     ?>

                    
                    <p class="card-text" style="overflow: hidden; max-height: 3rem"><?php echo e($product->SearchDetails); ?></p>
                    <br>

                    

                    <?php if($isAdmin): ?>

                    <div class="btn-group" style="position: absolute; bottom:10px ">
                        <a href="/product/<?php echo e($product->StockItemID); ?>" class="btn btn-primary">Lees Meer</a>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <?php if(isset($product->RecommendedProductID)): ?>
                                <form action="/admin/spotlight/removeRecommendedProduct/<?php echo e($product->StockItemID); ?>" method="post">
                                    <input type="submit" style="cursor:pointer" class="dropdown-item" value="Verwijder als aanbeveling"/>
                                </form>
                            <?php else: ?>
                                <form action="/admin/spotlight/addRecommendedProduct/<?php echo e($product->StockItemID); ?>" method="post">
                                    <input type="submit" style="cursor:pointer" class="dropdown-item" value="Zet als aanbeveling"/>
                                </form>
                            <?php endif; ?>

                            <?php if(isset($product->CarouselProductID)): ?>
                                <form action="/admin/spotlight/removeCarouselProduct/<?php echo e($product->StockItemID); ?>" method="post">
                                    <input type="submit" style="cursor:pointer" class="dropdown-item" value="Verwijder van de carousel"/>
                                </form>
                            <?php else: ?>
                                <form action="/admin/spotlight/addCarouselProduct/<?php echo e($product->StockItemID); ?>" method="post">
                                    <input type="submit" style="cursor:pointer" class="dropdown-item" value="Voeg aan carousel toe"/>
                                </form>
                            <?php endif; ?>
                        </div>
                      </div>

                    <?php else: ?>

                        <a href="/product/<?php echo e($product->StockItemID); ?>" style="position: absolute; bottom:10px " class="btn btn-primary">Lees Meer</a>

                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>