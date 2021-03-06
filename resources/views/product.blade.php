@extends('layouts.master')

@section('title', 'Products')

@section('content')
    <div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
        <div class="product foo">
            <div class="product__inner">
                <div class="pro__thumb">
                    <a href="#">
                        <img src="images/product/1.png" alt="product images">
                    </a>
                </div>
                <div class="product__hover__info">
                    <ul class="product__action">
                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="product__details">
                <h2><a href="product-details.html">test</a></h2>
                <ul class="product__price">
                    <li class="old__price">$16.00</li>
                    <li class="new__price">$10.00</li>
                </ul>
            </div>
        </div>
    </div>
@endsection