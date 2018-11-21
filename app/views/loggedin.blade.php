@extends('layouts.app')


@section('body')

    @if(!empty($data))

    <h2>Welkom {{$data[0]->Firstname}}</h2>

    {{print_r($data);}}

    @else 

    @endif

    not found anythig blyat

@endsection

