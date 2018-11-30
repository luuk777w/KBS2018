<?php $__env->startSection('head'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<br>

<h1>Bestellen</h1>
<hr>

<svg width="740" height="60" style="display: block; margin: auto">
    <rect fill="#107BFD" x="50" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#107BFD" x="210" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#107BFD" x="370" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#6B747C" x="530" y="30" rx="10" ry="10" width="150" height="10"/>

    <text fill="#107BFD" font-size="15" font-family="Arial" x="60" y="25">Gegevens invullen</text>
    <text fill="#107BFD" font-size="15" font-family="Arial" x="250" y="25">Bezorging</text>
    <text fill="#107BFD" font-size="15" font-family="Arial" x="398" y="25">Controleren</text>
    <text fill="#6B747C" font-size="15" font-family="Arial" x="580" y="25">Betalen</text>
</svg>
<br>

<div class="row">
    <div class="col">
        <h3>Aflever adres</h3>
        Naam: <?php echo e($customer["Firstname"]); ?> <?php echo e($customer["Lastname"]); ?> <br>
        <?php if($address["IsPostNLServicePoint"] == 1): ?> <span style="color:#EC8B27">PostNL Service point</span> <br> <?php endif; ?>
        Straat: <?php echo e($address["Street"]); ?> <?php echo e($address["HouseNr"]); ?> <br>
        Postcode: <?php echo e($address["PostalCode"]); ?> <br>
        Stad: <?php echo e($address["City"]); ?>

        <br>
        <br>

        <h3>Garantie</h3>
        Gekoelde producten hebben # dagen garantie.<br>
        Alle andere producten hebben een garantie van 2 jaar<br>

    </div>
    <div class="col">
        <h3>Producten</h3>
        <table class="table table-bordered">
            <tr>
                <th width="40%">Product naam</th>
                <th width="10%">Aantal</th>
                <th width="20%">Prijs</th>
                <th width="15%">Totaal</th>
            </tr>
            <?php $__currentLoopData = $orderLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderLine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($orderLine->item_name); ?></td>
                    <td><?php echo e($orderLine->item_quantity); ?></td>
                    <td>€<?php echo e($orderLine->item_price); ?></td>
                    <td>€<?php echo e($orderLine->item_price * $orderLine->item_quantity); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3" align="right">Totaal</td>
                <td align="left"><b>€ <?php echo e($total); ?></b></td>
            </tr>
        </table>

        <br>
        <form action="/order/pay" method="post">
            <input type="checkbox" required value=""> Ik ga akoord met de <a href="/assets/Algemene_Voorwaarden/Algemene%20Voorwaarden.pdf" target="_blank">Algemene Voorwaarden</a>
            <input type="submit" class="btn btn-primary" style="float: right" value="Betalen met iDeal">
        </form>
    </div>

</div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>