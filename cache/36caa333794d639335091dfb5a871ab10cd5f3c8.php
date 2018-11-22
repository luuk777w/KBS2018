<?php $__env->startSection('body'); ?>

    <?php if(!empty($data)): ?>

    <h2>Welkom <?php echo e($data[0]->Firstname); ?></h2>

    <?php else: ?> 

    not found anythig blyat

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>