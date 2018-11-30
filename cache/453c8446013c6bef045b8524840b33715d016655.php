<?php $__env->startSection('body'); ?>


    <?php if(!empty($userdata)): ?>

    <h2>Welkom <?php echo e($userdata[0]->Firstname); ?></h2>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="/account">Mijn account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/naw">NAW-Gegevens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/account/orders">Mijn Orders</a>
        </li>
    </ul>

    <div style="clear:both"></div>
    <br />

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>

                <th width="40%">Product naam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="5%">Datum</th>
                <th width="15%">Totaal</th>
            </tr>
            <?php 
                $total = 0;
             ?>
            <?php $__currentLoopData = $allorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>


                        <td><?php echo e($values["item_name"]); ?></td>
                        <td><?php echo e($values["quantity"]); ?></td>
                        <td>€ <?php echo e($values["price"]); ?></td>
                    </tr>
                <?php 
                    $total += ($values["item_quantity"] * $values["item_price"]);
                 ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(isset($values)): ?>

            <?php else: ?>
                <?php 
                    $total = 0;
                 ?>
                <tr>
                    <td colspan="5" align="center">Geen orders gevonden.</td>
                </tr>
            <?php endif; ?>

            <tr>
                <td colspan="4" align="right">Totaal</td>
                <td align="left">€ <?php echo e(number_format($total, 2)); ?></td>
            </tr>

        </table>
    </div>



    <?php else: ?> 

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>