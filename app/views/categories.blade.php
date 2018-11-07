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
                <h1>Categorieën</h1>
    @foreach ($categories as $category)

            <div class="card" style="width: 18rem; height:25rem;float:left;margin:10px">
                @if($category->PrimaryMediaURL !== NULL)
                    <div class="card-img-top" style="background-image: url('/assets/img/{{$category->PrimaryMediaURL}}')"></div>
                @else
                    <div class="card-img-top" style="background-image: url('/assets/img/img_placeholder.jpg')"></div>
                @endif                <div class="card-body">
                    <h5 class="card-title">{{$category->StockGroupName}}</h5>
                    <a href="/categories/{{$category->StockGroupID}}" style="position: absolute; bottom:10px " class="btn btn-primary">Bekijk Meer</a>

                </div>

            </div>

    @endforeach

</div>

@endsection