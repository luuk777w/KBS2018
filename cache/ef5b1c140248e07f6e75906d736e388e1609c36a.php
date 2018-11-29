<?php $__env->startSection('body'); ?>


    <?php if(!empty($userdata)): ?>

    <h2>Welkom <?php echo e($userdata[0]->Firstname); ?></h2>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="/account">Mijn account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/account/naw">NAW-Gegevens</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/account/orders">Mijn Orders</a>
        </li>
    </ul>

    <div style="clear:both"></div>
    <br />

        <?php if(!isset($data)): ?>

            <h2>Er zijn nog geen NAW gegevens van u bekend</h2>
            Vul deze hieronder in en klik op Opslaan<br>

            <?php 
            if(isset($msg)){



            }

             ?>

            <div class="container col-5">
                U kunt ze hier ook aanpassen door de nieuwe gegenvens hieronder intevullen en te klikken op Opslaan<br>

                <form action="/account/naw" method="post">
                    Huisnummer:<br>
                    <input type="text"  name="num" placeholder="13"><br>
                    Postcode: <br>
                    <input type="text" name="code" placeholder="1234ab"><br>
                    <br>
                    <input type="submit" name="send" class="btn btn-primary" style="float: right" value="Opslaan">
                </form>

            </div>



        <?php else: ?>


            <h2>Dit zijn uw NAW gegevens</h2>
            <br>

<div class="row">

    <div class="container col-5">

        <table>
            <tr>
                <td>
                    Straat:
                </td>
                <td>
                    <?php echo e($data[0]->Street); ?>

                </td>
            </tr>
            <tr>
                <td>
                    Huisnummer:
                </td>
                <td>
                    <?php echo e($data[0]->HouseNr); ?>

                </td>
            </tr>
            <tr>
                <td>
                    Stad:
                </td>
                <td>
                    <?php echo e($data[0]->City); ?>

                </td>
            </tr>
            <tr>
                <td>
                    Land:
                </td>
                <td>
                    <?php echo e($data[0]->Country); ?>

                </td>
            </tr>
        </table>

    </div>
            <div class="container col-5">
                U kunt ze hier ook aanpassen door de nieuwe gegenvens hieronder intevullen en te klikken op Wijzigen<br>

                <form action="/account/naw-update" method="post">
                    Huisnummer:<br>
                    <input type="text"  name="num" placeholder="13"><br>
                    Postcode: <br>
                    <input type="text" name="code" placeholder="1234ab"><br>
                    <br>
                    <input type="submit" name="send" class="btn btn-primary" style="float: right" value="Wijzigen">
                </form>
            </div>

</div>
    <?php endif; ?>




    <?php else: ?>

        Er is iets fout gegaan, probeer opnieuw in te loggen. Als het probleem zich blijft voordoen neem dan contact met ons op.

    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>