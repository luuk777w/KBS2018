<?php $__env->startSection('head'); ?>

    <style>


    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <br>

    <h1>Winkelwagen</h1>

    <div style="clear:both"></div>
    <br />
    <h3>Order Details</h3>
    <div class="table-responsive">
        <div align="right">
            <a href="/shoppingcart/clear"><b>Leeg Winkelmand</b></a>
        </div>
        <table class="table table-bordered">
            <tr>

                <th width="40%">Product naam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="15%">Totaal</th>
                <th width="5%"></th>
            </tr>
<?php 
            $total = 0;
 ?>
        <?php $__currentLoopData = $cart_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form method="post" action="/shoppingcart/update">
                    <tr>
                        <input type=hidden value="<?php echo e($values["item_id"]); ?>" name="hidden_id">
                        <input type=hidden value="<?php echo e($values["item_price"]); ?>" name="hidden_price">
                        <input type=hidden value="<?php echo e($values["item_quantity"]); ?>" name="quantity">
                        <input type=hidden value="<?php echo e($values["item_name"]); ?>" name="hidden_name">

                        <td><?php echo e($values["item_name"]); ?></td>
                        <td><input type="number" min=1 max=6000 name="quantity" value="<?php echo e($values["item_quantity"]); ?>" ><input class="btn btn-primary" type=submit name="update" value="bijwerken"></td>
                        <td>€ <?php echo e($values["item_price"]); ?></td>
                        <td>€ <?php echo e(number_format($values["item_quantity"] * $values["item_price"], 2)); ?></td>
                        <td><a href="/shoppingcart/delete/<?php echo e($values["item_id"]); ?>"><span class="text-danger">Verwijder</span></a></td>
                    </tr>
                </form>
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
                    <td colspan="5" align="center">Geen producten in winkelwagen.</td>
                </tr>

            <?php endif; ?>



            <tr>
                <td colspan="3" align="right">Totaal</td>
                <td align="left">€ <?php echo e(number_format($total, 2)); ?></td>
                <td></td>
            </tr>

        </table>

        <form action="" method="get">
            <input type="submit" class="btn btn-primary" style="float:right" value="Afrekenen">
        </form>

        <br>
        <br>
        <p style="text-align:right">Deze knop is tijdelijk en moet worden vervangen voor de knop met de link naar de NAW gegevens invul dinges</p>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>