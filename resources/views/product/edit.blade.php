@extends('layout.master')
@section('content')

    <form action="{{route('products.update', ['product' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="example-palaceholder">Tên sản phẩm</label>
            <input value="{{$product->name}}" name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Vinfast">
        </div>

        <div class="form-group">
            <label for="example-number">Giá</label>
            <input value="{{$product->price}}" class="form-control" id="example-number" type="number" name="price" placeholder="500000">
        </div>

        <div class="form-group">
            <label for="example-textarea">Mô tả</label>
            <textarea name="description" class="form-control" id="example-textarea" rows="5" placeholder="Sản phẩm khá oke">{{$product->description}}</textarea>
        </div>


        <div class="form-group">
            <label for="example-palaceholder">Nguồn gốc</label>
            <input value="{{$product->origin}}" name="origin" type="text" id="example-palaceholder" class="form-control" placeholder="Trung Quốc">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Thời hạn bảo hành</label>
            <input value="{{$product->insurance}}" name="insurance" type="text" id="example-palaceholder" class="form-control" placeholder="Có giá trị 1 năm">
        </div>

        <div class="form-group">
            <label for="example-number">Số lượng nhập vào</label>
            <input value="{{$product->quantity}}" class="form-control" id="example-number" type="number" name="quantity" placeholder="20">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Link video youtube</label>
            <input value={{$product->video}} type="text" id="example-palaceholder" class="form-control" placeholder="youtube.com/abcxyez" name="video">
        </div>


        <div class="form-group">
            <label for="example-fileinput">Ảnh, logo (có thể chọn nhiều ảnh 1 lúc)</label>
            <br>
            Giữ nguyên ảnh cũ
            @foreach($images as $image)
                <img src={{url("storage/$image->path")}} height="200px">
            @endforeach
            <br>
            Hoặc thay ảnh mới
            <br>
            <input name="images[]" type="file" id="example-fileinput" class="form-control-file" multiple>
        </div>

        <div class="form-group">
            <label for="example-textarea">Thông số kỹ thuật</label>
            <textarea name="specification" class="form-control" id="example-textarea" rows="5"
                      placeholder="Đường kính:20cm
Áp lực phun:1.5-2.5 MPa (15 - 25 Bar)">@foreach($specifications as $specification){{$specification->name_value}} @endforeach</textarea>
        </div>

        <div class="form-group">
            <label for="example-select">Nhà sản xuất</label>
            <select class="form-control" id="example-select" name="manufacturer_id">
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
        </div>

        <div class="form-group">
            <label for="example-select">Thể loại</label>
            <select class="form-control" id="example-select" name="subtype_id">
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
        </div>



        <button class="btn btn-primary">Sửa</button>
    </form>



@endsection
