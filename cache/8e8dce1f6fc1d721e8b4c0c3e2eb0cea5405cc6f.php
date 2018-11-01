<?php $__env->startSection('head'); ?>

    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/
    
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Naam</th>
            <th scope="col"></th>
            <th scope="col">Prijs</th>
        </tr>
        </thead>
        <tbody>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <tr>
            <td><img src="https://res.cloudinary.com/teepublic/image/private/s--tM4JElmV--/t_Preview/b_rgb:191919,c_limit,f_auto,h_313,q_90,w_313/v1491250418/production/designs/1381795_1" class="img-thumbnail"></td>
            <td><h3><?php echo e($product->StockItemName); ?></h3><br>
                <b><h5>Categorie </h5></b>
                <?php echo e($product->StockGroupName); ?>

                <br>
                <br>
                <b><h5>Beschrijving</h5></b>
                <?php echo e($product->SearchDetails); ?></td>
            <td>
                <a href="#<?php echo e($product->StockItemName); ?>" class="btn btn-primary" role="button" aria-pressed="true" target="_blank">Lees meer</a>
            </td>
            <td>€<?php echo e($product->UnitPrice); ?></td>

        </tr>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

    </table>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>