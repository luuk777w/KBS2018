@extends('layouts.app')

@section('head')

    <style>
        .carousel-image{
            width: 100%;
            height: 25rem;
            /*background-image: url("../../assets/img/milka.jpg");*/
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
		.img{
			background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
		}
		.services-check-icon{
            padding-right: 0.25rem;
            color: #24A647;
        }
    </style>

@endsection

@section('body')

    <br>
    
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
<br>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-image" style="background-image: url('/assets/img/milka.jpg');" ></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image: url('/assets/img/milka.jpg');" ></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-image" style="background-image: url('https://res.cloudinary.com/teepublic/image/private/s--tM4JElmV--/t_Preview/b_rgb:191919,c_limit,f_auto,h_313,q_90,w_313/v1491250418/production/designs/1381795_1');" ></div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
    <br>
    <br>
    
    <div class="container">
  	<div class="row" style="height:100px">
    <div class="col-sm img" style="background-image: url('/assets/img/milka.jpg');">
     
    </div>
    <div class="col-sm img" style="background-image: url('/assets/img/milka.jpg')" >
     
    </div>
    <div class="col-sm img" style="background-image: url('/assets/img/milka.jpg')">

    </div>
  </div>
  
</div>
    <br>

@endsection