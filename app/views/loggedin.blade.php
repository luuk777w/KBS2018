@extends('layouts.app')


@section('body')

    <h2>Welkom {{$data[0]->voornaam}}</h2>
    <?php

if(!empty($data)){
    print_r($data);

}else{
    print("not found anythig blyat");
}
    ?>
@endsection
