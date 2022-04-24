@extends('layout.master')
@section('content')

    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="example-palaceholder">Tên sản phẩm</label>
            <input name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Vinfast">
        </div>

        <div class="form-group">
            <label for="example-number">Giá</label>
            <input class="form-control" id="example-number" type="number" name="price" placeholder="500000">
        </div>

        <div class="form-group">
        <label for="example-textarea">Mô tả</label>
        <textarea name="description" class="form-control" id="example-textarea" rows="5" placeholder="Sản phẩm khá oke"></textarea>
        </div>


        <div class="form-group">
            <label for="example-palaceholder">Nguồn gốc</label>
            <input name="origin" type="text" id="example-palaceholder" class="form-control" placeholder="Trung Quốc">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Thời hạn bảo hành</label>
            <input name="insurance" type="text" id="example-palaceholder" class="form-control" placeholder="Có giá trị 1 năm">
        </div>

        <div class="form-group">
            <label for="example-number">Số lượng nhập vào</label>
            <input class="form-control" id="example-number" type="number" name="quantity" placeholder="20">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Link video youtube</label>
            <input type="text" id="example-palaceholder" class="form-control" placeholder="youtube.com/abcxyez" name="video">
        </div>

        <div class="form-group">
            <label for="example-fileinput">Ảnh, logo (có thể chọn nhiều ảnh 1 lúc)</label>
            <input name="images[]" type="file" id="example-fileinput" class="form-control-file" required multiple>
        </div>


        <div class="form-group">
            <label for="example-select">Nhà sản xuất</label>
            <select class="form-control" id="example-select" name="manufacturer_id">
                @foreach($manufacturers as $manufacturer)
                    <option value="{{$manufacturer->id}}">
                        {{$manufacturer->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="example-select">Thể loại</label>
            <select class="form-control" id="example-select" name="subtype_id">
                @foreach($subtypes as $subtype)
                    <option value="{{$subtype->id}}">
                        {{$subtype->name}}
                    </option>
                @endforeach
            </select>
        </div>



        <button class="btn btn-primary">Thêm</button>
    </form>



@endsection
