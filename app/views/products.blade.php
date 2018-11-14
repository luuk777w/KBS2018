@extends('layouts.app')

@section('head')

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wide World Importers GANG</title>

    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/

        .card-img-top{
            width: 100%;
            height: 15rem;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
    
    </style>

@endsection

@section('body')

    <div style="margin: auto; width: 58rem; overflow: auto;">
        @if (isset($searchTerm))
            <h1>zoekresultaten voor {{$searchTerm}}</h1>
        @else
        <h1>Producten</h1>
        @endif 

        @if($products == NULL)
            <h4 style="color: #DB3544">Er zijn geen producten gevonden</h4>
        @else

        @foreach ($products as $product)

            @php
                $url = "/product/". $product->StockItemID ."/". str_replace(' ', '-', $product->StockItemName);
            @endphp

            <div class="card" style="width: 18rem; height:40rem;float:left;margin:10px">

                @if($product->PrimaryMediaURL !== NULL)
                    <div class="card-img-top" style="background-image: url('/assets/img/{{$product->PrimaryMediaURL}}')"></div>
                    {{-- <img class="card-img-top" src="/assets/img/{{$product->PrimaryMediaURL}}" class="img-thumbnail" alt="Card image cap"> --}}
                @else
                    <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{$product->StockItemName}}</h5>
                    <h6 class="card-title">Prijs</h6>€{{$product->UnitPrice}}
                    <br>
                    <h6 class="card-title">Categorie</h6>
                    @php
                    foreach ($categories as $categorie){

                    if($categorie->stockitemID == $product->StockItemID){
                    print(" ".$categorie->stockgroupname."<br> ");
                    }
                    }
                    print("<br>");

                    @endphp

                    <p class="card-text" style="overflow: hidden; max-height: 3rem">{{$product->SearchDetails}}</p>
                    <br>
                    <a href="/product/{{$product->StockItemID}}" style="position: absolute; bottom:10px " class="btn btn-primary">Lees Meer</a>
                </div>
            </div>
        @endforeach

        @endif
    </div>

@endsection

