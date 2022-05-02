<link rel="stylesheet" href="{{asset('css/main-product_detail.css')}}" />
@extends('layout-customer.master')
@section('content')


<div class="app-container">
    <div class="grid wide">
        <div class="row">
            <div class="col l-6 m-6 c-12">
                <img
                    src="{{$product->path}}"
                    alt="ảnh"
                    style="width: 100%; height: 100%"
                />
            </div>
            <div class="col l-6 m-6 c-12">
                <div class="product-content">
                    <h1 class="product-content-heading">
                        {{$product->name}}
                        <p class="product-content-descrip">
                            <span>Loại:</span>
                            <a class="bold" href="{{route('type', ['type' => $product->type_id])}}">{{$product->type_name}}</a>
                        </p>
                        <p class="product-content-descrip">
                            <span>Danh mục:</span>
                            <a class="bold" href="{{route('subtype', ['subtype' => $product->subtype_id])}}">{{$product->subtype_name}}</a>
                        </p>
                    </h1>
                    <div class="product-price">
                        <span class="old-price">800000</span>
                        <span class="new-price">{{$product->price}}</span>
                        <span class="sale-off-number">n% giảm</span>
                    </div>
                    <p class="product-content-descrip">
                        <span>Xuất xứ:</span>
                        <span class="bold">{{$product->origin}}</span>
                    </p>
                    <p class="product-content-descrip">
                        <span>Bảo hành:</span>
                        <span class="bold">{{$product->insurance}}</span>
                    </p>
{{--                    <p class="product-content-descrip product-content-descrip-list">--}}
{{--                        <span>Mô tả:</span>--}}
{{--                    <ul class="bold">--}}
{{--                        <li class="product-content-descrip product-content-descrip-item">--}}
{{--                            {{$product->description}}--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                    </p>
                    <p class="product-content-descrip">
                        <span>Thương hiệu:</span>
                        <a class="bold" href="#">{{$product->manufacturer_name}}</a>
                    </p>
                    <p class="product-content-descrip">
                        <span>Tình trạng:</span>
                        <span class="bold">
                            {{$product->statusProduct}}
                        </span>
                    </p>
                    <form action="{{route('carts.add_to_cart', ['product' => $product->id])}}" method="post">
                        @csrf
                        <button>
                            Thêm vào giỏ hàng
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col l-12 m-12 c-12">
                <h1 class="heading-des">Thông số kĩ thuật</h1>
                <table class="table-board">
                    @foreach($specifications as $specification)
                    <tr>
                        <th>{{$specification->name}}</th>
                        <td>{{$specification->value}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col l-12 m-12 c-12">
                <h1 class="heading-des">Mô tả sản phẩm</h1>
                <p class="product-des">
                    {{$product->description}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col l-12 m-12 c-12">
                <h1 class="heading-des">Video hướng dẫn sử dụng</h1>
                <p class="product-des video-place">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ytuMObZlqOE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
