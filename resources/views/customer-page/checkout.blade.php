@extends('layout-customer.master')
@section('content')
<br>
<br>
<br>
<br>
<br>
<table width="70%" border="1px solid black" >
    <tr>
        <th>#</th>
        <th>Tên sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Tổng</th>
    </tr>

    @foreach($carts as $key => $cart)
        <tr>
            <td>{{$key}}</td>
            <td>{{$cart['name']}}</td>
            <td>{{$cart['price']}}</td>
            <td>{{$cart['count']}}</td>
            <td>
                {{$cart['price'] * $cart['count']}} đồng
            </td>
        </tr>
    @endforeach
</table>

<br>
<br>
<br>
<br>


<form action="{{route('carts.order')}}" method="post">
    @csrf

    Họ và tên người nhận
    <input type="text" name="name">
    <br>
    Địa chỉ người nhận
    <input type="text" name="address">
    <br>
    Số điện thoại người nhận
    <input type="text" name="phone">
    <br>
    Email người nhận
    <input type="text" name="mail">
    <br>
    Ghi chú
    <input type="text" name="note">
    <br>

    <button>Đặt hàng</button>


</form>



@endsection
