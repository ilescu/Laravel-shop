@extends('layouts.master')

@section('title', 'Category ' . $category->name)

@section('content')
        <div style="margin-left: 18px;">
        <h1>{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>
        </div>
            @foreach($category->products as $product)
                @include('layouts.card', compact('product'))
            @endforeach
@endsection