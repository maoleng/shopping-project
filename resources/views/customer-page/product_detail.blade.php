@extends('layout-customer.master')
@section('content')

<h1>
    {{$product->name}}
</h1>

<img src="{{$product->path}}" width="300px">

<br>
<form action="{{route('carts.add_to_cart', ['product' => $product->id])}}" method="post">
    @csrf
    <button>
        Thêm vào giỏ hàng
    </button>
</form>


@endsection
