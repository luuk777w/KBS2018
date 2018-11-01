@extends('layouts.app')

@section('head')

    <style>
        
        /* In de Head section kan je allemaal tags plaatsen die daar moeten zoals een style tag, 
        of een linkje naar een style bestand.*/
    
    </style>

@endsection

@section('body')
    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Naam</th>
            <th scope="col"></th>
            <th scope="col">Prijs</th>
        </tr>
        </thead>
        <tbody>
    @foreach ($products as $product)


        <tr>
            <td><img src="https://res.cloudinary.com/teepublic/image/private/s--tM4JElmV--/t_Preview/b_rgb:191919,c_limit,f_auto,h_313,q_90,w_313/v1491250418/production/designs/1381795_1" class="img-thumbnail"></td>
            <td><h3>{{$product->StockItemName}}</h3><br>
                <b><h5>Categorie </h5></b>
                {{$product->StockGroupName}}
                <br>
                <br>
                <b><h5>Beschrijving</h5></b>
                {{$product->SearchDetails}}</td>
            <td>
                <a href="#{{$product->StockItemName}}" class="btn btn-primary" role="button" aria-pressed="true" target="_blank">Lees meer</a>
            </td>
            <td>€{{$product->UnitPrice}}</td>

        </tr>

    @endforeach
        </tbody>

    </table>


@endsection