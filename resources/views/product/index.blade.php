@extends('layout.master')
@section('search')
    <div class="app-search dropdown d-none d-lg-block">
        <form>
            <div class="input-group">
                <input value="{{$search}}" name="q" type="search" class="form-control dropdown-toggle" placeholder="Tìm kiếm..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
@endsection

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
                @if (session()->get('level') === 1)
                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="action-icon btn">
                        <i class="mdi mdi-delete"></i>
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    {{ $products->links('vendor.pagination.bootstrap-5') }}

@endsection
