@extends('layout.master')
@section('content')

    <a href="{{route('products.create')}}">Thêm</a>

    <table border="1px solid black" width="100%" >
        <tr>
            <td>#</td>
            <td>Tên sản phẩm</td>
            <td>Số lượng còn lại</td>
            <td>Giá</td>
            <td>Thể loại</td>
            <td>Danh mục</td>
            <td>Nhà sản xuất</td>
            <td>Xem chi tiết</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>

        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->type_name}}</td>
            <td>{{$product->subtype_name}}</td>
            <td>{{$product->manufacturer_name}}</td>
            <td>
                <a href="#">Xem</a>
            </td>
            <td>
                <a href="{{route('products.edit', ['product' => $product->id])}}">
                    Sửa
                </a>
            </td>
            <td>
                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button>Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
