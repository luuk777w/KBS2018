<?php $__env->startSection('body'); ?>

    <br>

    <div class="card">
        <h3 class="card-header">Login</h3>
        <div class="card-block">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control col-4" placeholder="Username" aria-describedby="basic-addon1">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                <input type="text" class="form-control col-4" placeholder="Password" aria-describedby="basic-addon1">
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>