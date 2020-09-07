@extends('layouts.master')

@section('title', 'Home')

@section('content')

            @foreach($products as $product)
            @include('layouts.card', compact('product'))
            @endforeach

    @endsection