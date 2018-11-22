<?php $__env->startSection('head'); ?>

<style>
  .WWIHEADER
{
    color: Lightblue;
}
.carousel-caption 
{
 background: rgba(0, 0, 20, 0.45); 
  
}

.Product1
{
    border: 1px solid grey; width: 25%;
    word-wrap: break-word;
    border: 1px solid #000000s;
    height:15rem;
}

.carousel-item
{
  height:40rem; 
  max-width: 70rem;
  
}


.productimag
{
max-width: 15rem;


}

.card-img-top{
    width: 100%;
    height: 15rem;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

.card{
  height: 30rem;
  padding-top:10px;
}

.knopje{
  position: absolute; 
  bottom:10px;
}

</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="container">
  <div class="row">
    <div class="col-sm"><i class="fas fa-check services-check-icon"></i>
      Voor <b>22:00</b> besteld, morgen in huis
    </div>
    <div class="col-sm"><i class="fas fa-check services-check-icon"></i>
      Gratis verzending boven de <b>€20</b>
    </div>
    <div class="col-sm"><i class="fas fa-check services-check-icon"></i>
      <b>30</b> dagen niet goed, geld terug garantie
    </div>
  </div>
</div>
<div>
  <h1 class="WWIHEADER">
    Welkom bij World Wide Importers.
  </h1>
</div>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Cookie Waarschuwing</strong> <br> Voor het werken van onze websites zijn koekies nodig. Door de website te
  gebruiken gaat u hiermee akkoord.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>






<form>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active" heigh>
        <img class="d-block w-100" src="../../assets/img/clothing.jpeg" alt="First slide" height="100%" margin="Auto ">
        <div class="carousel-caption d-none d-md-block">
          <h5>Wat moet ik zeggen, t zijn maar kleren.</h5>
          <p>Ik heb het nu niet meer zo koud - een dakloos persoon</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../../assets/img/clothing.jpeg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h5>Wat moet ik zeggen, t zijn maar kleren.</h5>
          <p>Ik heb het nu niet meer zo koud - een dakloos persoon</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="../../assets/img/milka.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</form>
<br>
<br>

  <div class="row">
    <div class="col-3">
      <div class="card" style="width: 18rem;">
        <?php if($products[0]->PrimaryMediaURL !== NULL): ?>
          <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($products[0]->PrimaryMediaURL); ?>')"></div>

        <?php else: ?>
          <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
        <?php endif; ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo e($products[0]->StockItemName); ?></h5>
          <p class="card-text"><?php echo e($products[0]->SearchDetails); ?></p>
          <a href="#" class="btn btn-primary knopje">Ga naar het product</a>
        </div>
      </div>
    </div>
    <div class="col-3">
<div class="card" style="width: 18rem;">
        <?php if($products[1]->PrimaryMediaURL !== NULL): ?>
          <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($products[1]->PrimaryMediaURL); ?>')"></div>

        <?php else: ?>
          <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
        <?php endif; ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo e($products[1]->StockItemName); ?></h5>
          <p class="card-text"><?php echo e($products[1]->SearchDetails); ?></p>
          <a href="#" class="btn btn-primary knopje">Ga naar het product</a>
        </div>
      </div>
    </div>
    <div class="col-3">
<div class="card" style="width: 18rem;">
        <?php if($products[2]->PrimaryMediaURL !== NULL): ?>
          <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($products[2]->PrimaryMediaURL); ?>')"></div>

        <?php else: ?>
          <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
        <?php endif; ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo e($products[2]->StockItemName); ?></h5>
          <p class="card-text"><?php echo e($products[2]->SearchDetails); ?></p>
          <a href="#" class="btn btn-primary knopje">Ga naar het product</a>
        </div>
      </div>
    </div>
    <div class="col-3">
<div class="card" style="width: 18rem;">
        <?php if($products[3]->PrimaryMediaURL !== NULL): ?>
          <div class="card-img-top" style="background-image: url('/assets/img/<?php echo e($products[3]->PrimaryMediaURL); ?>')"></div>

        <?php else: ?>
          <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
        <?php endif; ?>
        <div class="card-body">
          <h5 class="card-title"><?php echo e($products[3]->StockItemName); ?></h5>
          <p class="card-text"><?php echo e($products[3]->SearchDetails); ?></p>
          <a href="#" class="btn btn-primary knopje">Ga naar het product</a>
        </div>
      </div>
    </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>