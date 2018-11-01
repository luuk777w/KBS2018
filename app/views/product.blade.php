@extends('layouts.app')

@section('head')

    <style>
        
        .image{
            width: 35rem;
            height: 26.25rem;
            background-image: url("../../assets/img/milka.jpg");
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .smallImages{
            border: 1px solid black;
            margin-top: 1rem;
            margin-left: 1rem;
            width: 8rem;
            height: 6rem;
            float: left;
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

        .inStock{
            border: solid #24A647 1px;
            color: #24A647;
            width: 7rem;
            text-align: center;
            margin-bottom: 5px;
        }

        .deliveryTime{
            margin-bottom: 5px;
        }

        .cooledProduct{
            color: #107BFD;
            margin-bottom: 1.5rem;
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

    <h1>Milka OREO 100 gram</h1>

    <div class="row">
        <div class="col-7" >
            <div class="image"></div>
            <div class="smallImages firstSmallImage"></div>
            <div class="smallImages"></div>
            <div class="smallImages"></div>
            <div class="smallImages"></div>
        </div>
        <div class="col-5" >
            <h1>€1,50</h1>
            <p class="inStock">Op voorraad</p>
            <p class="deliveryTime">Voor 22:00 besteld, morgen in huis!</p>
            <p class="cooledProduct"><i class="fas fa-snowflake cooledProduct-icon"></i>Let op! dit is een gekoeld product.</p>
                
            <button class="btn btn-success cartWishList-button">
                <i class="fas fa-shopping-cart fa-2x cartWishList-icon"></i>
                <span class="cartWishList-text">In winkelwagen</span>
            </button>

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
            <p>Milka OREO 100 gram is een heerlijke chocolade reep voor jong en oud! <br>
                Het is zachte Alpenmelkchocolade met vulling van gebroken Oreo Koekjes.                
            </p>
        </div>
        <div class="col-5" >
    
        </div>
    </div>



@endsection