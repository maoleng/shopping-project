<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/base.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{asset('css/grid.css')}}" />
{{--    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />--}}
<!-- Reset CSS -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet"
    />
    .
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    <style>

    </style>
</head>

<body>



<div>
    <div class="header">
    </div>

    <div class="content">
        @foreach($products as $product)

            <div class="home-product">
                <!-- Grid>Row>Column -->
                <div class="row">
                    <div class="col l-2-4 m-4 c-6">
                        <!-- Product Item -->
                        <a class="home-product-item" href="#">
                            <div
                                class="product-img"
                                style="background-image: url({{url("storage/$product->path")}})"
                            >
                                <!-- Drop file ảnh vào khúc URL -->
                            </div>
                            <h4 class="product-heading">
                                {{$product->name}}
                            </h4>
                            <div class="price-wrap">
                            <span class="old-price">
                                {{$product->price}}
                            </span>
                                <span class="current-price" class="hidden">
                                <!-- Drop giá giảm,nếu ko có thì thêm vào class hidden -->
                            </span>
                            </div>
                            <div class="product-action">
                            <span class="like-product">
                                <i class="far fa-heart"></i>
                                <!-- Không thích trái tim thì thêm class hidden vào class like-product -->
                            </span>
                                <span class="rating-product">
                                <i class="fas fa-star rating-product-gold"></i>
                                <i class="fas fa-star rating-product-gold"></i>
                                <i class="fas fa-star rating-product-gold"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                    <!-- Thêm class rating-product-gold nếu muốn sao sáng -->
                            </span>
                                <span class="already-sold">
                                <!-- Drop content số lượng đã bán -->
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
{{--                            <div class="sale-off">--}}
{{--                            <span class="sale-value">--}}
{{--                                <!-- Drop content % giảm -->--}}
{{--                            </span>--}}
{{--                                <span class="sale-label">GIẢM</span>--}}
{{--                            </div>--}}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="footer">
    </div>
</div>



</body>
</html>



