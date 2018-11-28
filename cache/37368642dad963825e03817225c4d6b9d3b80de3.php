<?php $__env->startSection('head'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<br>

<h1>Bestellen</h1>
<hr>

<svg width="740" height="60" style="display: block; margin: auto">
    <rect fill="#107BFD" x="50" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#107BFD" x="210" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#6B747C" x="370" y="30" rx="10" ry="10" width="150" height="10"/>

    <rect fill="#6B747C" x="530" y="30" rx="10" ry="10" width="150" height="10"/>

    <text fill="#107BFD" font-size="15" font-family="Arial" x="60" y="25">Gegevens invullen</text>
    <text fill="#107BFD" font-size="15" font-family="Arial" x="250" y="25">Bezorging</text>
    <text fill="#6B747C" font-size="15" font-family="Arial" x="398" y="25">Controleren</text>
    <text fill="#6B747C" font-size="15" font-family="Arial" x="580" y="25">Betalen</text>
</svg>
<br>

<form action="/order/delivery" method="post">

<div class="row">
    <div class="col">

        <h4>Bezorgen:</h4>
        Laat uw pakket door PostNL bezorgen wanneer het u uitkomt! Kosten zijn: <br> €2.95 als uw bestelling onder de €20,00- is, daarboven is het gratis!.<br>

<br>
    <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="deliveryDate" value="HOME:<?php echo e($date->Date); ?>" <?php if($date->Date == $dates[0]->Date): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="exampleRadios1">
                <b><?php echo e($date->Date); ?></b>
                Tussen <b><?php echo e($date->Timeframes->TimeframeTimeFrame->From); ?></b> en <b><?php echo e($date->Timeframes->TimeframeTimeFrame->To); ?></b>
                </label>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <div class="col">
        <h4>Ophalen:</h4>
        Haal uw pakket op bij een PostNL service punt wanneer het u uitkomt! Kosten zijn: <br>€2.95 als uw bestelling onder de €20,00- is, daarboven is het gratis!<br>
        <br>
        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="form-check">
        <input class="form-check-input" type="radio" name="deliveryDate" value="POSTNLSERVICEPOINT:<?php echo e($location->Address->Street); ?>|+|<?php echo e($location->Address->HouseNr); ?>|+|<?php echo e($location->Address->Zipcode); ?>|+|<?php echo e($location->Address->City); ?>">
            <label class="form-check-label" for="exampleRadios1">
            <?php echo e($location->Name); ?> - <?php echo e($location->Address->Street); ?> <?php echo e($location->Address->HouseNr); ?>, <?php echo e($location->Address->City); ?></label>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<br><br>

<div class="row">
    <div class="col">
    </div>

    <div class="col">
        <input type="submit" class="btn btn-primary" style="float: right" value="Verder">
    </div>
</div>

</form>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>