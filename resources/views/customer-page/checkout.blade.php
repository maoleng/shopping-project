@extends('layout-customer.master')
@section('link_css')
    <link rel="stylesheet" href="{{asset('css/main-checkout.css')}}" />
@endsection
@section('content')

<div class="grid wide">
    <div class="checkout-container">
        <div class="row-grid">
            <div class="col l-7 m-5 c-12">
                <div class="cus-heading">
                    <h1>Thông tin khách hàng</h1>
                </div>
                <div class="customer-fields-list">
                    <form action="{{route('carts.order')}}" method="post">
                    @csrf
                    <input name="name"
                        class="customer-fields-item"
                        placeholder="Họ và tên"
                        style="width: 80%; height: 40px; margin: 10px 0"
                        id="name-fields"
                    />
                    <div id="email_phonenum">
                        <input name="mail"
                            class="customer-fields-item"
                            placeholder="Email"
                            style="
                                width: 50%;
                                height: 40px;
                                margin: 10px 0;
                                margin-right: 4px;
                            "
                            id="email-fields"
                        />
                        <input name="phone"
                            class="customer-fields-item"
                            placeholder="Số điện thoại"
                            style="
                                        width: 30%;
                                        height: 40px;
                                        margin: 10px 0;
                                    "
                            id="email-fields"
                        />
                    </div>
                    <input name="address"
                        class="customer-fields-item"
                        placeholder="Địa chỉ"
                        style="width: 80%; height: 40px; margin: 10px 0"
                        id="address-fields"
                    />
                    <input name="note"
                        class="customer-fields-item"
                        placeholder="Ghi chú"
                        style="width: 80%; height: 40px; margin: 10px 0"
                        id="note-fields"
                    />
                    <div class="button-container">
                        <form action="">
                            <button class="btn-order btn-primary-order">
                                Đặt hàng
                            </button>
                        </form>
                    </div>
                </form>
                </div>
            </div>
            <div class="col l-5 m-7 c-12 order-summary">
                <h1 style="text-align: center">Tổng kết đơn hàng</h1>
                @foreach($carts as $cart)
                <div class="row-grid product-item">
                    <div class="col l-8 m-8 c-8">
                        <div class="row-grid">
                            <div class="col l-4 m-4 c-4">
                                <img
                                    src="{{$cart['path']}}"
                                    alt=""
                                    width="70px"
                                    height="70px"
                                />
                            </div>
                            <div class="col l-8 m-8 c-8">
                                <p class="name-pro">
                                    {{$cart['name']}}
                                </p>
                                <p class="price-content">
                                    {{$cart['price']}}
                                    <span class="multiply"> x</span>
                                    <span class="multiply"> {{$cart['count']}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l-4 m-4 c-4">
                        <p class="total-price">{{$cart['price'] * $cart['count']}} đồng</p>
                    </div>
                </div>
                @endforeach
                <div class="row-grid total-all-price">
                    <div class="col l-12 m-12 c-12">
                        <p class="total-all-price-number">
                            Tổng số tiền:
                            <span class="total-number"
                            >{{calculateMoney($carts)}} đồng</span
                            >
                        </p>
                    </div>
                </div>
            </div>
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
