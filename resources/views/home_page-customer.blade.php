@extends('layout-customer.master')
@section('link_css')
    <link rel="stylesheet" href="{{asset('css/main-home_page.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
@endsection
@section('content')

<div class="grid wide">
    <!-- Popular Section -->
    <section class="py-5 border-bottom" id="features">
        <div class="row-grid main-intro">
            <div class="l-12 m-12 c-12">
                <p class="main-intro-heading">
                    #Ở đây chúng tôi có gì
                    <span class="icon main-heading-icon">
                        <i class="bi bi-star-fill" style="color:#8B8000"></i>
                    </span>
                </p>
            </div>
        </div>
            <div class="container popular-container">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 icon-place "><i class="bi bi-lightning-fill"></i></div>
                        <h2 class=" feature-heading">Giao hàng nhanh gọn</h2>
                        <p>Hàng luôn đến tay khách hàng một cách nhanh chóng</p>
                        <a class="text-decoration-none" href="#!">
                        Xem sản phẩm ngay chờ chi
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 icon-place"><i class="bi bi-award-fill"></i>
</div>
                        <h2 class=" feature-heading">Hàng 100% chính hãng</h2>
                        <p>Hàng luôn đảm bảo chất lượng một cách tối đa</p>
                        <a class="text-decoration-none" href="#!">
                        Xem sản phẩm ngay chờ chi
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 icon-place"><i class="bi bi-tags-fill"></i></div>
                        <h2 class=" feature-heading">Giá cả phải chăng</h2>
                        <p>Giá cả luôn sẵn sàng làm cho khách hàng phải hài lòng</p>
                        <a class="text-decoration-none" href="#!">
                            Xem sản phẩm ngay chờ chi
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <!-- Product section -->
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
        <a href="{{route('detail_product', ['product' => $product_sale->id])}}" class="main-item col l-2-4 m-6 c-6">
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
        <div class="col l-12 m-12 c-12">
            <p class="main-intro-heading">#Sản phẩm nổi bật</p>
        </div>
    </div>
    <div class="main-item-list row-grid">
        @foreach($products_new as $product_new)
        <a href="{{route('detail_product', ['product' => $product_new->id])}}" class="main-item col l-2-4 m-6 c-6">
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
        <a href="{{route('detail_product', ['product' => $product_bought->id])}}" class="col main-item l-2-4 m-6 c-6">
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
        <div class="col l-12 m-12 c-12">
            <div class="video-place">
                <iframe
                    width="560"
                    height="315"
                    src="{{$config[11]->value}}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
        <div class="col l-12 m-12 c-12">
            <p class="content-place">
                {{$config[0]->value}}
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
            <div class="row-grid brand-container">
                @foreach($manufacturers as $manufacturer)
                <div class="col l-2-4 m-6 c-12">
                    <img
                        src="{{$manufacturer->image}}"
                        alt=""
                        width="100%"
                        height="100%"
                    />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
