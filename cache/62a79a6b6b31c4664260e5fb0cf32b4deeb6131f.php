<?php $__env->startSection('body'); ?>

    <?php if(!empty($data)): ?>

    <h2>Welkom <?php echo e($data[0]->Firstname); ?></h2>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="/account">Mijn account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/naw">NAW-Gegevens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/orders">Mijn Orders</a>
        </li>
        <?php if($data[0]->Role == "ADMINISTRATOR"): ?>
        <li class="nav-item">
            <a class="nav-link active" href="/adminpanel">Admin paneel</a>
        </li>
        <?php endif; ?>
    </ul>

    <?php else: ?> 

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>