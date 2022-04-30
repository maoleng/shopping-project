{{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}

@extends('layout.master')
@section('content')

    <a href="{{route('products.create')}}">Thêm</a>

    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng còn lại</th>
            <th>Giá</th>
            <th>Thể loại</th>
            <th>Danh mục</th>
            <th>Nhà sản xuất</th>
            <th>Xem</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)

        <tr>
            <td class="table-user">
                {{$product->id}}
            </td>
            <td>{{$product->name}}</td>
            <td>
                <img src="{{url("storage/$product->path")}}" alt="table-user" class="mr-2 rounded-circle" height="30px" />
            </td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->type_name}}</td>
            <td>{{$product->subtype_name}}</td>
            <td>{{$product->manufacturer_name}}</td>
            <td class="table-action">
                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
            </td>
            <td class="table-action">
                <a href="{{route('products.edit', ['product' => $product->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
            </td>
            <td class="table-action">
                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="action-icon btn">
                        <i class="mdi mdi-delete"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    {{ $products->links('vendor.pagination.bootstrap-5') }}

@endsection
