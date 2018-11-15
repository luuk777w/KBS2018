@extends('layouts.app')

@section('head')

    <style>

        .image{
            width: 35rem;
            height: 26.25rem;
            /*background-image: url("../../assets/img/milka.jpg");*/
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .smallImages{
            margin-top: 1rem;
            margin-left: 1rem;
            width: 8rem;
            height: 6rem;
            float: left;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .firstSmallImage{
            margin-left: 0 !important;
        }

        .cartWishList-button{
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .cartWishList-text{
            display: inline-block;
            padding-top: 0.2rem;
            margin-left: -36px;
        }

        .cartWishList-icon{
            float: left;
        }

        .stock{
            text-align: center;
            margin-bottom: 5px;
        }

        .inStock{
            border: solid #24A647 1px;
            color: #24A647;
            width: 7rem;
        }

        .notInStock{
            border: solid #DB3544 1px;
            color: #DB3544;
            width: 9rem;
        }

        .deliveryTime{
            margin-bottom: 5px;
        }

        .cooledProduct{
            color: #107BFD;
        }

        .cooledProduct-icon{
            margin-right: 0.25rem;
        }

        .services-list{
            list-style: none;
            padding-left: 0;
            line-height: 1.8rem;
        }

        .services-check-icon{
            padding-right: 0.25rem;
            color: #24A647;
        }

    </style>

@endsection

@section('body')
    
    <br>

    <h1>{{$productDetails[0]->StockItemNames}}</h1>

    <div class="row">
        <div class="col-7" >
        {{-- <img src="data:image/jpeg;base64,{{$blob}}" class="image"/> --}}

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">

                    @foreach($media as $picture)
                        {{$count = 0}}

                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}" class="active"></li>

                        {{$count++}}
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                    @if(isset($media[0]))
                            <img class="d-block w-100" src="../../assets/img/{{$media[0]->MediaUrl}}" alt="First slide">
                    @else
                        <img class="d-block w-100" src="../../assets/img/img_placeholder.jpg" alt="First slide">

                    @endif
                        </div>
                </div>
                @foreach($media as $picture)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../../assets/img/{{$picture->MediaUrl}}" alt="Second slide">
                    </div>

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




        </div>
        <div class="col-5" >
            <h1>€{{$productDetails[0]->UnitPrice}}</h1>

            @if (true)
                <p class="stock inStock">Op voorraad</p>
                <p class="deliveryTime">Voor 22:00 besteld, morgen in huis!</p>
            @else
                <p class="stock notInStock">Niet op voorraad</p>
            @endif

            @if ($productDetails[0]->IsChillerStock)
                <p class="cooledProduct"><i class="fas fa-snowflake cooledProduct-icon"></i>Let op! dit is een gekoeld product.</p>
            @endif

            <form method="post" action="/product/addtocart/{{$productDetails[0]->StockItemID}}">
                <button class="btn btn-success cartWishList-button" style="margin-top: 0.5rem;">
                    <i class="fas fa-shopping-cart fa-2x cartWishList-icon"></i>
                    <span class="cartWishList-text">In winkelwagen</span>
                </button>
            </form>

            <button class="btn btn-outline-danger cartWishList-button">
                    <i class="fas fa-heart fa-2x cartWishList-icon"></i>
                    <span class="cartWishList-text">Op verlanglijstje</span>
            </button>

            <ul class="services-list">
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Voor <b>22:00</b> besteld, morgen in huis</li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Gratis verzending boven de <b>€20</b></li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i><b>30</b> dagen niet goed, geld terug garantie</li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Onze klantenservice staat tot <b>22:00</b> voor je klaar</li>
                <li class="services-list-item"><i class="fas fa-check services-check-icon"></i>Betaal veilig met <b>iDeal</b></li>
            </ul>
        </div>

        <div class="col-12" >
            <hr>
        </div>

        <div class="col-7" >
            <h2>Productinformatie</h2>
            <p>{{$productDetails[0]->SearchDetails}}
                <br>
                <br>
                Land van fabricatie: {{json_decode($productDetails[0]->CustomFields)->CountryOfManufacture}}
                @if(isset(json_decode($productDetails[0]->CustomFields)->ShelfLife))
                    <br>
                    Houdbaarheid: {{json_decode($productDetails[0]->CustomFields)->ShelfLife}}
                @endif
            </p>                
        </div>
        <div class="col-5" >
            <h3>Categorieën</h3>
            @foreach($categories as $categorie)
                @if($categorie->stockitemID == $productDetails[0]->StockItemID)
                    {{$categorie->stockgroupname}} <br>
                @endif
            @endforeach
        </div>
    </div>



@endsection