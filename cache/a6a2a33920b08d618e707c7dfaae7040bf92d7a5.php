<?php $__env->startSection('head'); ?>

    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/
    
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <form action="/products" method="post">
        <button class="btn btn-primary">Get All Products</button>
    </form>

    <br>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php echo e($product->StockItemName); ?> <br>
        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>