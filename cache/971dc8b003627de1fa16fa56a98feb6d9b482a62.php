<?php $__env->startSection('head'); ?>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wide World Importers GANG</title>


    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/
    
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

        <div style="margin: auto; width: 58rem">
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <div class="card" style="width: 18rem; height:25rem;float:left;margin:10px">
                <img class="card-img-top" src="https://res.cloudinary.com/teepublic/image/private/s--tM4JElmV--/t_Preview/b_rgb:191919,c_limit,f_auto,h_313,q_90,w_313/v1491250418/production/designs/1381795_1" class="img-thumbnail" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($category->StockGroupName); ?></h5>
                    <a href="/categories/<?php echo e($category->StockGroupID); ?>" style="position: absolute; bottom:10px " class="btn btn-primary">Bekijk Meer</a>

                </div>

            </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>