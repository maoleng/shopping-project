<link rel="stylesheet" href="{{asset('css/main-product.css')}}" />

@extends('layout-customer.master')
@section('content')


    <div class="home-product">
    <div class="grid wide">
        <div class="row-grid">

            @foreach($products as $product)
                <div class="col l-2-4 m-4 c-6">
                    <div class="home-product-container home-product-item">
                        <a class="home-product-link" href="{{route('detail_product', ['product' => $product->id])}}">
                            <div
                                class="product-img"
                                style="background-image: url({{$product->path}})"
                            >
                            </div>
                            <h4 class="product-heading">
                                {{$product->name}}
                            </h4>
                            <div class="price-wrap">
                                <span class="old-price">
                                    {{$product->beautyOldPrice}}
                                </span>
                                <span class="current-price">
                                    {{$product->beautyPrice}}
                                </span>
                            </div>
                            <div class="product-action">
                                <span class="already-sold">
                                    {{$product->statusProduct}}
                                </span>
                            </div>
                            <div class="origin">
                                <span class="brand-origin">
                                    {{$product->manufacturer_name}}
                                </span>
                                <span class="origin-name">
                                    {{$product->origin}}
                                </span>
                            </div>
                            {!! $product->SalePercentHTML !!}
                        </a>
                        <form action="{{route('carts.add_to_cart', ['product' => $product->id])}}" method="post">
                            @csrf
                            <button class="btn-order btn-primary-order btn-product-order">
                                Thêm vào giỏ hàng
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</div>
{{ $products->links('vendor.pagination.custom') }}
@endsection
