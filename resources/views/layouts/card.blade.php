
<br>
<div class="col-md-3 single__pro col-lg-3 cat--1 col-sm-4 col-xs-12">
    <div class="product foo">
        <div class="product__inner">
            <div class="pro__thumb">
                <a href="#">
                    <img src="images/product/1.png" alt="product images">
                </a>
            </div>
            <div class="product__hover__info">
                <form action="{{ route('basket-add', $product) }}" method="post">
                <ul class="product__action">
                    <li><a title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                    <li><button type="submit" style="border: none;" title="Add TO Cart" href="{{ route('basket') }}"><span class="ti-shopping-cart"></span></button></li>
                </ul>
                    @csrf
                </form>
            </div>
        </div>
        <div class="product__details">
            <h2><a href="product-details.html">{{ $product->name }}</a></h2>
            <ul class="product__price">
                <li class="old__price">{{ $product->price }}</li>
                <li class="new__price">{{ $product->price }}</li>
            </ul>
        </div>
    </div>
</div>
