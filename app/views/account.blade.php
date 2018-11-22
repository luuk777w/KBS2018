@extends('layouts.app')


@section('body')

    @if(!empty($data))

    <h2>Welkom {{$data[0]->Firstname}}</h2>

    @else 

    not found anythig blyat

    @endif

@endsection

