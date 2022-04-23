@extends('layout.master')
@section('content')

    <form action="{{route('products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        Tên sản phẩm
        <input type="text" name="name" value="{{$product->name}}">
        <br>

        Giá
        <input type="number" name="price" value="{{$product->price}}">
        <br>

        Mô tả
        <textarea name="description" cols="30" rows="10">{{$product->description}}</textarea>
        <br>

        Nguồn gốc
        <input type="text" name="origin" value="{{$product->origin}}">
        <br>

        Thời hạn bảo hành
        <input type="text" name="insurance" value="{{$product->insurance}}">
        <br>

        Số lượng nhập vào
        <input type="number" name="quantity" value="{{$product->quantity}}">
        <br>

        Link video youtube
        <input type="text" name="video" value={{$product->video}}>
        <br>

        Ảnh
        <br>
        Giữ nguyên ảnh cũ
        <br>
        @foreach($images as $image)
            <img src={{public_path()}}\storage\{{$image->path}}>
        @endforeach
        <br>
        Hoặc thay ảnh mới
        <input type="file" class="form-control" name="images[]" placeholder="address" multiple>
        <br>

        Nhà sản xuất
        <select name="manufacturer_id">
            @foreach($manufacturers as $manufacturer)
                <option value="{{$manufacturer->id}}"
                    @if ($product->manufacturer_id === $manufacturer->id)
                        selected
                    @endif
                >
                    {{$manufacturer->name}}
                </option>
            @endforeach
        </select>
        <br>

        Thể loại
        <select name="subtype_id">
            @foreach($subtypes as $subtype)
                <option value="{{$subtype->id}}"
                    @if ($subtype->id === $product->subtype_id)
                        selected
                    @endif
                >
                    {{$subtype->name}}
                </option>
            @endforeach
        </select>
        <br>

        <button>Thêm</button>
    </form>


@endsection
