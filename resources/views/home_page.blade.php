<link rel="stylesheet" href="{{asset('css/main-home_page.css')}}" />
@extends('layout-customer.master')
@section('content')

<div class="grid wide">
    <div class="row-grid main-intro">
        <div class="l-12 m-12 c-12">
            <p class="main-intro-heading">
                #Deal hời kẻo lỡ
                <span class="icon main-heading-icon">
                    <i class="fa-solid fa-fire" style="color: red"></i>
                </span>
            </p>
        </div>
    </div>
    <div class="main-item-list row-grid">

        @foreach($products_sale as $product_sale)
        <a href="{{route('detail_product', ['product' => $product_sale->id])}}" class="main-item l-2-4 m-6 c-6">
            <div class="item-main-img">
                <img
                    src="{{$product_sale->path}}"
                    alt="pic"
                />
                <div class="item-main-des">
                    <div class="item-main-modal-overlay">
                        <p class="item-main-description">
                            {{$product_sale->name}}
                            <span class="price-item">{{$product_sale->beautyPrice}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="row-grid main-intro">
        <div class="l-12 m-12 c-12">
            <p class="main-intro-heading">#Sản phẩm nổi bật</p>
        </div>
    </div>
    <div class="main-item-list row-grid">
        @foreach($products_new as $product_new)
        <a href="{{route('detail_product', ['product' => $product_new->id])}}" class="main-item l-2-4 m-6 c-6">
            <div class="item-main-img">
                <img
                    src="{{$product_new->path}}"
                    alt="pic"
                />
                <div class="item-main-des">
                    <div class="item-main-modal-overlay">
                        <p class="item-main-description">
                            {{$product_new->name}}
                            <span class="price-item">{{$product_new->beautyPrice}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="row-grid main-intro">
        <div class="l-12 m-12 c-12">
            <p class="main-intro-heading">
                #Sản phẩm bán chạy
                <span class="main-intro-des">Mua nhanh kẻo cháy</span>
            </p>
        </div>
    </div>
    <div class="main-item-list row-grid">
        @foreach($products_bought as $product_bought)
        <a href="{{route('detail_product', ['product' => $product_bought->id])}}" class="main-item l-2-4 m-6 c-6">
            <div class="item-main-img">
                <img
                    src="{{$product_bought->path}}"
                    alt="pic"
                />
                <div class="item-main-des">
                    <div class="item-main-modal-overlay">
                        <p class="item-main-description">
                            {{$product_bought->name}}
                            <span class="price-item">{{$product_bought->beautyPrice}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="row-grid main-intro">
        <div class="l-12 m-12 c-12">
            <p class="main-intro-heading">
                #Về chúng tôi
                <span class="main-intro-des">

                </span>
            </p>
        </div>
    </div>
    <div class="main-item-list row-grid about-us">
        <div class="col l-6 m-6 c-12">
            <div class="video-place">
                <iframe
                    width="560"
                    height="315"
                    src="https://www.youtube.com/embed/1hJMSFIH7Cs"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
        <div class="col l-6 m-6 c-12">
            <p class="content-place">
                {{$config[1]->value}}
            </p>
        </div>
    </div>
    <div class="row-grid main-intro">
        <div class="l-12 m-12 c-12">
            <p class="main-intro-heading">
                #Đối tác chúng tôi
                <span class="main-intro-des">
                    Những người cùng nhau tạo nên thương hiệu hôm nay
                </span>
            </p>
        </div>
    </div>
    <div class="main-item-list row-grid about-us">
        <div class="col l-12 m-12 c-12">
                <span class="logo-producer">
{{--                    @foreach($manufacturers as $manufacturer)--}}
{{--                    <a href="#" class="logo-produce-place">--}}
{{--                        <img--}}
{{--                            src="{{$manufacturer->image}}"--}}
{{--                            alt=""--}}
{{--                            class="logo-produce-img"--}}
{{--                        />--}}
{{--                    </a>--}}
{{--                    @endforeach--}}
                    <a href="#" class="logo-produce-place">
                        <img
                            src="https://en.ygselect.com/design/en/escrow-grid_en.jpg"
                            alt=""
                            class="logo-produce-img"
                        />
                    </a>
                    <a href="#" class="logo-produce-place">
                        <img
                            src="https://en.ygselect.com/design/en/2021_footer_ht_en.png"
                            alt=""
                            class="logo-produce-img"
                            style="filter: grayscale(1); height: 50px"
                        />
                    </a>
                    <a href="#" class="logo-produce-place">
                        <img
                            src="https://en.ygselect.com/design/en/footer_gaon2_en.jpg"
                            alt=""
                            class="logo-produce-img"
                        />
                    </a>
                    <a href="#" class="logo-produce-place">
                        <img
                            src="https://en.ygselect.com/design/en/ok_gray_en.png"
                            alt=""
                            class="logo-producer-img"
                            style="height: 50px"
                        />
                    </a>
                </span>
        </div>
    </div>
</div>
@endsection
