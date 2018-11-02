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
    @foreach ($categories as $category)


            <div class="card" style="width: 18rem; height:25rem;float:left;margin:10px">
                <img class="card-img-top" src="https://res.cloudinary.com/teepublic/image/private/s--tM4JElmV--/t_Preview/b_rgb:191919,c_limit,f_auto,h_313,q_90,w_313/v1491250418/production/designs/1381795_1" class="img-thumbnail" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$category->StockGroupName}}</h5>
                    <a href="/product/" style="position: absolute; bottom:10px " class="btn btn-primary">Bekijk Meer</a>

                </div>

            </div>

    @endforeach

</div>

@endsection