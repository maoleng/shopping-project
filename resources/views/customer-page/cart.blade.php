<link rel="stylesheet" href="{{asset('css/main-cart.css')}}" />

@extends('layout-customer.master')
@section('content')

    <div class="grid wide">
        <h1 class="cart-heading-content">Giỏ hàng</h1>
        <div class="row-grid table-heading-container">
            <div class="col l-6 m-6 c-6">
                <p class="table-heading-content">
                    Thông tin chi tiết sản phẩm
                </p>
            </div>
            <div class="col l-2 m-2 c-2">
                <p class="table-heading-content">Đơn giá</p>
            </div>
            <div class="col l-2 m-2 c-2">
                <p class="table-heading-content">Số lượng</p>
            </div>
            <div class="col l-2 m-2 c-2">
                <p class="table-heading-content">Tổng giá</p>
            </div>
        </div>
        @foreach($carts as $key => $cart)
        <div class="row-grid table-content-container">
            <div class="col l-6 m-6 c-6">
                <div class="row-grid info-containter">
                    <div class="col l-6 m-6 c-6">
                        <img
                            src="{{$cart['path']}}"
                            alt="pic"
                            width="100%"
                        />
                    </div>
                    <div class="col l-6 m-6 c-6">
                        <p class="heading-info-item">
                            {{$cart['name']}}
                        </p>
{{--                        <p class="info-description">Thương hiệu:G-Friend</p>--}}
{{--                        <p class="info-description">Loại:Main-Vocal</p>--}}
                        <form action="{{route('carts.destroy', ['id' => $key])}}" method="post">
                            <button class="btn-order btn-primary-order">
                                @csrf
                                @method('DELETE')
                                Xóa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col l-2 m-2 c-2">
                <p class="info-containter price-per-unit">{{$cart['price']}}</p>
            </div>
            <div class="col l-2 m-2 c-2 info-containter">
                <div class="quantity-container">
                    <p class="number-container">
                    <form action="{{route('carts.modify_quantity', ['type' => 'decrease', 'id' => $key])}}" method="post">
                        @csrf
                        <button class="btn-primary-order">
                            <span class="decrease-btn"> - </span>
                        </button>
                    </form>
                    <span class="quantity-number"> {{$cart['count']}} </span>
                    <form action="{{route('carts.modify_quantity', ['type' => 'increase', 'id' => $key])}}" method="post">
                        @csrf
                        <button class="btn-primary-order">
                            <span class="increase-btn"> + </span>
                        </button>
                    </form>
                    </p>
                </div>
            </div>
            <div class="col l-2 m-2 c-2">
                <p class="info-containter total-price">{{$cart['price'] * $cart['count']}} đồng</p>
            </div>
        </div>
        @endforeach

        <div class="row-grid endingtable">
            <div class="col l-12 m-12 c-12">
                <p class="total-all-price">
                    Tổng:
                    <span class="total-all-number">{{calculateMoney($carts)}}</span>
                <div class="btn-container">
                    <form action="{{route('carts.checkout')}}" method="get">
                        <button class="btn-order btn-primary-order btn-order-last">
                            Đặt hàng
                        </button>
                    </form>
                </div>

                </p>
            </div>
        </div>
    </div>





@endsection

<?php
    function calculateMoney($carts): string
    {
        $total = 0;
        foreach ($carts as $cart) {
            $each = $cart['price'] * $cart['count'];
            $total += $each;
        }
        return $total;
    }
?>
