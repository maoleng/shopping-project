@extends('layout-customer.master')

@section('link_css')
    <link rel="stylesheet" href="{{asset('css/main-product_detail.css')}}" />
@endsection
@section('content')


<div class="app-container">
    <div class="grid wide">
        <div class="row-grid">
            <div class="col l-6 m-6 c-12">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                    <!-- Full-width images with number and caption text -->
                    @foreach($images as $key => $image)
                    <div class="mySlides fade">
                        <div class="numbertext">{{$key + 1}} / {{count($images)}}</div>
                        <img src="{{$image->path}}" style="width:100%">
                        <div class="text">{{$product->name}}</div>
                    </div>
                    @endforeach
                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                    @foreach($images as $key => $image)
                        <span class="dot" onclick="currentSlide({{$key}})"></span>
                    @endforeach
                </div>
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
                        @if ($product->price_old !== 1)
                            <span class="old-price">{{$product->beautyPriceOld}}</span>
                        @endif
                        <span class="new-price">{{$product->beautyPrice}}</span>

                        @if ($product->price_old !== 1)
                        <span class="sale-off-number">
                            {{$product->salePercent}} giảm
                        </span>
                        @endif
                    </div>
                    <p class="product-content-descrip">
                        <span>Xuất xứ:</span>
                        <span class="bold">{{$product->origin}}c</span>
                    </p>
                    <p class="product-content-descrip">
                        <span>Bảo hành:</span>
                        <span class="bold">{{$product->insurance}}</span>
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
                </div>
                <form action="{{route('carts.add_to_cart', ['product' => $product->id])}}" method="post">
                    @csrf
                    <button class="btn-order btn-primary-order" style="padding: 10px;" hover="cursor:pointer">
                        Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        </div>
        <div class="row-grid">
            <div class="col l-12 m-12 c-12">
                <h1 class="heading-des">Video hướng dẫn sử dụng</h1>
                <p class="product-des video-place">
                    <iframe width="560px" height="315" src="{{$product->embedYoutubeLink}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
            </div>
        </div>
        <div class="item-choose-container">
            <div class="row-grid">
                <div class="col l-6 m-6 c-12 item-choose">
                    <p class="item-choose-name" id="0">Thông số kĩ thuật</p>
                </div>
                <div class="col l-6 m-6 c-12 item-choose">
                    <p class="item-choose-name" id="1">Mô tả sản phẩm</p>
                </div>
            </div>
            <div class="row-grid">
                <div class="col l-12 m-12 c-12">
                    <div class="item-choose-content">
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
                <div class="col l-12 m-12 c-12">
                    <p class="item-choose-content">
                        {{$product->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/main-product_detail.js')}}"></script>


@endsection
