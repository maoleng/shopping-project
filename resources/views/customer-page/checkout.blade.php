<link rel="stylesheet" href="{{asset('css/main-checkout.css')}}" />
@extends('layout-customer.master')
@section('content')

{{--<table width="70%" border="1px solid black" >--}}
{{--    <tr>--}}
{{--        <th>#</th>--}}
{{--        <th>Tên sản phẩm</th>--}}
{{--        <th>Đơn giá</th>--}}
{{--        <th>Số lượng</th>--}}
{{--        <th>Tổng</th>--}}
{{--    </tr>--}}

{{--    @foreach($carts as $key => $cart)--}}
{{--        <tr>--}}
{{--            <td>{{$key}}</td>--}}
{{--            <td>{{$cart['name']}}</td>--}}
{{--            <td>{{$cart['price']}}</td>--}}
{{--            <td>{{$cart['count']}}</td>--}}
{{--            <td>--}}
{{--                {{$cart['price'] * $cart['count']}} đồng--}}
{{--            </td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--</table>--}}



{{--<form action="{{route('carts.order')}}" method="post">--}}
{{--    @csrf--}}

{{--    Họ và tên người nhận--}}
{{--    <input type="text" name="name">--}}
{{--    <br>--}}
{{--    Địa chỉ người nhận--}}
{{--    <input type="text" name="address">--}}
{{--    <br>--}}
{{--    Số điện thoại người nhận--}}
{{--    <input type="text" name="phone">--}}
{{--    <br>--}}
{{--    Email người nhận--}}
{{--    <input type="text" name="mail">--}}
{{--    <br>--}}
{{--    Ghi chú--}}
{{--    <input type="text" name="note">--}}
{{--    <br>--}}

{{--    <button>Đặt hàng</button>--}}


{{--</form>--}}



<div class="grid wide">
    <div class="checkout-container">
        <div class="row-grid">
            <div class="col l-8 m-8 c-12">
                <div class="cus-heading">
                    <h1>Thông tin khách hàng</h1>
                </div>
                <div class="customer-fields-list">
                    <input
                        class="customer-fields-item"
                        placeholder="Họ và tên"
                        style="width: 80%; height: 40px; margin: 10px 0"
                        id="name-fields"
                    />
                    <div id="email_phonenum">
                        <input
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
                        <input
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
                    <input
                        class="customer-fields-item"
                        placeholder="Địa chỉ"
                        style="width: 80%; height: 40px; margin: 10px 0"
                        id="address-fields"
                    />
                    <input
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
                </div>
            </div>
            <div class="col l-4 m-4 c-12 order-summary">
                <h1 style="text-align: center">Tổng kết đơn hàng</h1>
                <div class="row-grid product-item">
                    <div class="col l-8 m-8 c-8">
                        <div class="row-grid">
                            <div class="l-4 m-4 c-4">
                                <img
                                    src="https://pm1.narvii.com/6814/2555e33c213284a5451ade4329793cfa2c78bba3v2_hq.jpg"
                                    alt=""
                                    width="70px"
                                    height="70px"
                                />
                            </div>
                            <div class="l-8 m-8 c-8">
                                <p class="name-pro">
                                    SinB đẹp gái dễ thương hòa đồng
                                </p>
                                <p class="price-content">
                                    20.00$
                                    <span class="multiply"> x</span>
                                    <span class="multiply"> 5</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l-4 m-4 c-4">
                        <p class="total-price">400.000.000VNĐ</p>
                    </div>
                </div>
                <div class="row-grid product-item">
                    <div class="col l-8 m-8 c-8">
                        <div class="row-grid">
                            <div class="l-4 m-4 c-4">
                                <img
                                    src="https://pm1.narvii.com/6814/2555e33c213284a5451ade4329793cfa2c78bba3v2_hq.jpg"
                                    alt=""
                                    width="70px"
                                    height="70px"
                                />
                            </div>
                            <div class="l-8 m-8 c-8">
                                <p class="name-pro">
                                    SinB đẹp gái dễ thương hòa đồng
                                </p>
                                <p class="price-content">
                                    20.00$
                                    <span class="multiply"> x</span>
                                    <span class="multiply"> 5</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l-4 m-4 c-4">
                        <p class="total-price">400.000.000VNĐ</p>
                    </div>
                </div>
                <div class="row-grid product-item">
                    <div class="col l-8 m-8 c-8">
                        <div class="row-grid">
                            <div class="l-4 m-4 c-4">
                                <img
                                    src="https://pm1.narvii.com/6814/2555e33c213284a5451ade4329793cfa2c78bba3v2_hq.jpg"
                                    alt=""
                                    width="70px"
                                    height="70px"
                                />
                            </div>
                            <div class="l-8 m-8 c-8">
                                <p class="name-pro">
                                    SinB đẹp gái dễ thương hòa đồng
                                </p>
                                <p class="price-content">
                                    20.00$
                                    <span class="multiply"> x</span>
                                    <span class="multiply"> 5</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col l-4 m-4 c-4">
                        <p class="total-price">400.000.000VNĐ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
