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


        {{-- Als er geen producten uit de database komen doe je dit --}}

        @if($products == NULL)

            {{-- Geef een header met de tekst Er zijn geen producten gevonden weer met een rooie kleur --}}
            <h4 style="color: #DB3544">Er zijn geen producten gevonden</h4>

            {{-- Als er wel producten uit de database komen doe je dit --}}
        @else

            {{-- Voor ieder product in de array uit de database die je dit --}}
        @foreach ($products as $product)

            @php
                // Update de URL naar het volgende: /product/Het product id/de productnaam
             $url = "/product/". $product->StockItemID ."/". str_replace(' ', '-', $product->StockItemName);
            @endphp

            <div class="card" style="width: 18rem; height:40rem;float:left;margin:10px">

                 {{-- Als er een Primaire foto is aangegeven in de database dan die je dit --}}
            @if($product->PrimaryMediaURL !== NULL)

                    {{-- Laat de primaire foto zien in de productcard --}}
                    <div class="card-img-top" style="background-image: url('/assets/img/{{$product->PrimaryMediaURL}}')"></div>
                    {{-- <img class="card-img-top" src="/assets/img/{{$product->PrimaryMediaURL}}" class="img-thumbnail" alt="Card image cap"> --}}

                    {{-- Als er geen Primaire foto is aangegeven in de database dan die je dit --}}
                @else

                    {{-- Aan de bovenkant van de productcard laat je de placeholder zien --}}
                    <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
                @endif

                {{-- Dit is de body van de productcard --}}
                <div class="card-body">

                    {{-- Laat de productnaam in H5 zien --}}
                    <h5 class="card-title">{{$product->StockItemName}}</h5>

                    {{-- Laat de prijs van het product zien in de productcard --}}
                    <h6 class="card-title">Prijs</h6>€{{$product->UnitPrice}}
                    <br>

                    <h6 class="card-title">Categorie</h6>
                    @php
                        // voor iedere gekoppelde categorie print de categorie
                    foreach ($categories as $categorie){


                                    //  als de productID overeenkomt met wat er in de data uit de database komt, print dat de categorienaam met een break
                    if($categorie->stockitemID == $product->StockItemID){
                    print(" ".$categorie->stockgroupname."<br> ");
                    }
                    }
                    print("<br>");

                    @endphp

                    {{-- Laat de descriptie van het product zien in de productcard --}}
                    <p class="card-text" style="overflow: hidden; max-height: 3rem">{{$product->SearchDetails}}</p>
                    <br>

                    {{-- Laat een knop naar de productpagina van het product zien in de productcard --}}
                    <a href="/product/{{$product->StockItemID}}" style="position: absolute; bottom:10px " class="btn btn-primary">Lees Meer</a>
                </div>
            </div>
        @endforeach

        @endif
    </div>

@endsection

