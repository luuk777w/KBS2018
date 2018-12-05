@extends('layouts.app')

@section('head')

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


.rowdistance{
margin: 0px !important; 
  
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
  margin-right: 1rem;
}

.knopje{
  position: absolute; 
  bottom:10px;
}

</style>

@endsection

@section('body')

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
  <strong>Cookie Waarschuwing</strong> <br> Voor het werken van onze websites zijn cookies nodig. Door de website te
  gebruiken gaat u hiermee akkoord.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



@php

  $inCarousel = [];

@endphp


<form>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      @php 
        $i = 1;
      @endphp
      @foreach($carouselItems as $item)
        @php 
          $i = 1;
        @endphp
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">

      @foreach($carouselItems as $item)

      <div class="carousel-item @if($carouselItems[0]->StockItemID == $item->StockItemID) active @endif">
          @if($item->PrimaryMediaURL !== NULL)
            <img class="d-block w-100" src="/assets/img/{{$item->PrimaryMediaURL}}" alt="First slide" height="100%" margin="Auto ">
          @else 
            <img class="d-block w-100" src="/assets/img/placeholder.jpg" alt="First slide" height="100%" margin="Auto ">
          @endif
        <div class="carousel-caption d-none d-md-block">
          <h5>{{$item->StockItemName}}</h5>
          <p>{{$item->SearchDetails}}</p>
        </div>
      </div>

      @php
        array_push($inCarousel, $item->StockItemID);
      @endphp

      @endforeach
      

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

<div class="SecundSubTitleUnderCarousel">
  <h5>

    Onze aanbevelingen voor u
    <br>
    <br>

  </h5>
</div>

@foreach($products as $product)

      <div class="card" style="width: 17.5rem; float: left">
        @if($product->PrimaryMediaURL !== NULL)
        <div class="card-img-top" style="background-image: url('/assets/img/{{$product->PrimaryMediaURL}}')"></div>

        @else
        <div class="card-img-top" style="background-image: url('/assets/img/placeholder.jpg')"></div>
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$product->StockItemName}}</h5>
          <p class="card-text">{{$product->SearchDetails}}</p>

          @if($isAdmin)

          <div class="btn-group" style="position: absolute; bottom:10px ">
              <a href="/product/{{$product->StockItemID}}" class="btn btn-primary">Ga naar het product</a>
              <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                  @if(isset($product->RecommendedProductID))
                      <form action="/admin/spotlight/removeRecommendedProduct/{{$product->StockItemID}}" method="post">
                          <input type="submit" style="cursor:pointer" class="dropdown-item" value="Verwijder als aanbeveling"/>
                      </form>
                  @else
                      <form action="/admin/spotlight/addRecommendedProduct/{{$product->StockItemID}}" method="post">
                          <input type="submit" style="cursor:pointer" class="dropdown-item" value="Zet als aanbeveling"/>
                      </form>
                  @endif

                  @if(in_array($product->StockItemID, $inCarousel))
                      <form action="/admin/spotlight/removeCarouselProduct/{{$product->StockItemID}}" method="post">
                          <input type="submit" style="cursor:pointer" class="dropdown-item" value="Verwijder van de carousel"/>
                      </form>
                  @else
                      <form action="/admin/spotlight/addCarouselProduct/{{$product->StockItemID}}" method="post">
                          <input type="submit" style="cursor:pointer" class="dropdown-item" value="Voeg aan carousel toe"/>
                      </form>
                  @endif
              </div>
            </div>

          @else
            <a href="/product/{{$product->StockItemID}}" class="btn btn-primary knopje">Ga naar het product</a>
          @endif


        </div>
      </div>

  @endforeach
@endsection