@extends('layouts.app')

@section('head')

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Wide World Importers GANG</title>


    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/
    
    </style>

@endsection

@section('body')

        <div style="margin: auto; width: 58rem">
    @foreach ($products as $product)

    @php
        $url = "/product/". $product->StockItemID ."/". str_replace(' ', '-', $product->StockItemName);
    @endphp


            <div class="card" style="width: 18rem; height:40rem;float:left;margin:10px">

                @if($product->MediaURL !== NULL)

                    <img class="card-img-top" src="../../assets/img/{{$product->MediaUrl}}" class="img-thumbnail" alt="Card image cap">
                @else
                    <img class="card-img-top" src="/assets/img/img_placeholder.jpg" class="img-thumbnail" alt="Card image cap">

                @endif

                    <div class="card-body">
                    <h5 class="card-title">{{$product->StockItemName}}</h5>
                    <h6 class="card-title">Prijs</h6>€{{$product->UnitPrice}}
                    <br>
                    <h6 class="card-title">Categorie</h6>{{$product->StockGroupName}}
                    <br>
                    <p class="card-text" style="overflow: hidden; max-height: 3rem">{{$product->SearchDetails}}</p>
                    <a href="/product/{{$product->StockItemID}}" style="position: absolute; bottom:10px " class="btn btn-primary">Lees Meer</a>

                </div>

            </div>

    @endforeach
        </div>
@endsection

