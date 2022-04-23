@extends('layout.master')
@section('content')

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        Tên sản phẩm
        <input type="text" name="name">
        <br>

        Giá
        <input type="number" name="price">
        <br>

        Mô tả
        <textarea name="description" cols="30" rows="10"></textarea>
        <br>

        Nguồn gốc
        <input type="text" name="origin">
        <br>

        Thời hạn bảo hành
        <input type="text" name="insurance">
        <br>

        Số lượng nhập vào
        <input type="number" name="quantity">
        <br>

        Link video youtube
        <input type="text" name="video" value="youtube.com/abcxyez">
        <br>

        Ảnh
        <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
        <br>

        Nhà sản xuất
        <select name="manufacturer_id">
            @foreach($manufacturers as $manufacturer)
            <option value="{{$manufacturer->id}}">
                {{$manufacturer->name}}
            </option>
            @endforeach
        </select>
        <br>

        Thể loại
        <select name="subtype_id">
            @foreach($subtypes as $subtype)
                <option value="{{$subtype->id}}">
                    {{$subtype->name}}
                </option>
            @endforeach
        </select>
        <br>

        <button>Thêm</button>
    </form>


@endsection
