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
<div class="row">
    <div class="col">

        <h4>Bezorgdatum:</h4>

        <?php $__currentLoopData = $dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryDate" id="exampleRadios1" value="option1" <?php if($date == $dates[0]): ?> checked <?php endif; ?>>
            <label class="form-check-label" for="exampleRadios1">
            <?php echo e($date); ?>

            </label>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <div class="col">
        <h4>Bezorg methode:</h4>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryMethod" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
            PostNL - Gratis
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryMethod" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
            DHL - Gratis
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryMethod" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
            UPS - €7,95
            </label>
        </div>    
        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryMethod" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
            GLS - €4,50
            </label>
        </div>  
    </div>
</div>

<br><br>

<div class="row">
    <div class="col">

        <h4>Bezorg locatie:</h4>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryLocation" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
                Thuisbezorging
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="deliveryLocation" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2" style="display: flex">
                <p style="flex: 0 0 10rem;">PostNL servicepoint</p>
                <select class="form-control form-control-sm" style="flex: 1">
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option><?php echo e($location->Name); ?> - <?php echo e($location->Address->Street); ?> <?php echo e($location->Address->HouseNr); ?>, <?php echo e($location->Address->City); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </label>
        </div>
    </div>

    <div class="col">
    </div>
</div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>