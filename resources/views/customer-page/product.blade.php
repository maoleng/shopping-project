<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@extends('layout-customer.master')
@section('content')


    <div class="home-product">
    <!-- Grid>Row>Column -->
    <div class="grid wide">
        <div class="row">

            @foreach($products as $product)
            <div class="col l-2-4 m-4 c-6">
                <!-- Product Item -->
                <a class="home-product-item" href="{{route('detail_product', ['product' => $product->id])}}">
                    <div
                        class="product-img"
                        style="background-image: url({{$product->path}});"
                    >
                    </div>
                    <h4 class="product-heading">
                        {{$product->name}}
                    </h4>
                    <div class="price-wrap">
                        <span class="old-price hidden"></span>
                        <span class="current-price">
                            {{$product->price}}
                        </span>
                    </div>
                    <div class="product-action">
                        <span class="already-sold hidden"></span>
                    </div>
                    <div class="origin">
                        <span class="brand-origin">
                            {{$product->manufacturer_name}}
                        </span>
                        <span class="origin-name">
                            {{$product->origin}}
                        </span>
                    </div>
                    <div class="sale-off">
                        <span class="sale-value hidden"></span>
                        <span class="sale-label hidden">GIẢM</span>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>

</div>
{{ $products->links('vendor.pagination.custom') }}
@endsection
