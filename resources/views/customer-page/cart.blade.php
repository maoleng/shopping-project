@extends('layout-customer.master')
@section('content')

    <table width="100%" border="1px solid black">
        <tr>
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Xóa</th>
            <th>Tổng</th>
        </tr>

        @foreach($carts as $key => $cart)
        <tr>
            <td>{{$key}}</td>
            <td>{{$cart['name']}}</td>
            <td>{{$cart['price']}}</td>
            <td>
                <form action="{{route('carts.modify_quantity', ['type' => 'decrease', 'id' => $key])}}" method="post">
                    @csrf
                    <button>Giảm</button>
                </form>
                {{$cart['count']}}
                <form action="{{route('carts.modify_quantity', ['type' => 'increase', 'id' => $key])}}" method="post">
                    @csrf
                    <button>Tăng</button>
                </form>
            </td>
            <td>
                <form action="{{route('carts.destroy', ['id' => $key])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Xóa</button>
                </form>
            </td>
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
    <h1>Tổng tiền {{calculateMoney($carts)}}</h1>

    <form action="{{route('carts.checkout')}}" method="get">
        @csrf
        <button>
            Đặt hàng
        </button>
    </form>


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


