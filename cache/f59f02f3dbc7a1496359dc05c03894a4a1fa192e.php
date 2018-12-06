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

    <div class="row">
        <div class="col-6">
            <h3>Carousel</h3>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $i = 1;  ?>
                    <?php $__currentLoopData = $carouselItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($i++); ?></th>
                            <td><?php echo e($item->StockItemName); ?></td>
                            <td>
                                <form action="/admin/spotlight/removeCarouselProduct/<?php echo e($item->StockItemID); ?>" method="post" style="float: right;">
                                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
        <div class="col-6">
            <h3>Aanbevolen</h3>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $j = 1;  ?>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($j++); ?></th>
                            <td><?php echo e($product->StockItemName); ?></td>
                            <td>
                                <form action="/admin/spotlight/removeCarouselProduct/<?php echo e($product->StockItemID); ?>" method="post" style="float: right;">
                                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php else: ?> 

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>