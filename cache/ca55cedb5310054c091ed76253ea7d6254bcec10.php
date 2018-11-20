<?php $__env->startSection('body'); ?>

    <h2>Welkom <?php echo e($data[0]->voornaam); ?></h2>
    <?php

if(!empty($data)){
    print_r($data);

}else{
    print("not found anythig blyat");
}
    ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>