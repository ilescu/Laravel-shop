@extends('layouts.master')

@section('title', 'Cart')

@section('content')
    <div>
        <h1>Shopping Cart</h1>
        <p>Checkout</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="{{ Storage::url($product->image) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span style="margin-top: 11px; background-color: #5e5e5e;" class="badge">{{ $product->pivot->count }}</span>
                            <div class="btn-group form-inline">
                                <form action="{{ route('basket-remove', $product) }}" method="POST">

                                    <button style="margin-top: 11px; " type="submit" class="btn btn-danger" href=""><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
 <form action="{{ route('basket-add', $product) }}" method="POST">
         <button style="margin-top: 11px;" type="submit" class="btn btn-primary" href=""><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->getPriceForCount() }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total cost:</td>
                    <td>{{ $order->getFullPrice() }}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" style="margin-top: 20px;" role="group">
                <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">Checkout</a>
            </div>
        </div>
    </div>
@endsection