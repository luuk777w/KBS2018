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
            <a href="/shoppingcart/clear"><b>Clear Cart</b></a>
        </div>
        <table class="table table-bordered">
            <tr>

                <th width="40%">Item Name</th>
                <th width="10%">Quantity</th>
                <th width="20%">Price</th>
                <th width="15%">Total</th>
                <th width="5%">Action</th>
            </tr>

            <?php $__currentLoopData = $cart_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <form method="post" action="/shoppingcart/update">
                    <tr>
                        <input type=hidden value="<?php echo e($values["item_id"]); ?>" name="hidden_id">
                        <input type=hidden value="<?php echo e($values["item_price"]); ?>" name="hidden_price">
                        <input type=hidden value="<?php echo e($values["item_quantity"]); ?>" name="quantity">
                        <input type=hidden value="<?php echo e($values["item_name"]); ?>" name="hidden_name">

                        <td><?php echo e($values["item_name"]); ?></td>
                        <td><input type="number" name="quantity" value="<?php echo e($values["item_quantity"]); ?>" >
                            <input type=submit name="update"></td>
                        <td>$ <?php echo e($values["item_price"]); ?></td>
                        <td>$ <?php echo e(number_format($values["item_quantity"] * $values["item_price"], 2)); ?></td>
                        <td><a href="/shoppingcart/delete/<?php echo e($values["item_id"]); ?>"><span class="text-danger">Remove</span></a></td>
                    </tr>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if(isset($values)): ?>

                <?php 
                    $total = 0;
                    $total += ($values["item_quantity"] * $values["item_price"]);
                 ?>

            <?php else: ?>

                <?php 
                    $total = 0;
                 ?>

                <tr>
                    <td colspan="5" align="center">Geen producten in winkelwagen.</td>
                </tr>

            <?php endif; ?>



            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo e(number_format($total, 2)); ?></td>
                <td></td>
            </tr>

        </table>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>