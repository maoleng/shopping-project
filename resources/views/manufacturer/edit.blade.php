
@extends('layout.master')
@section('content')

    <form action="{{route('manufacturers.update', ['manufacturer' => $manufacturer->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="example-palaceholder">Tên nhà cung cấp</label>
            <input value="{{$manufacturer->name}}" name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Vinfast">        </div>

        <div class="form-group">
            <label for="example-textarea">Mô tả</label>
            <textarea name="description" class="form-control" id="example-textarea" rows="5">{{$manufacturer->description}}</textarea>
        </div>



        <div class="form-group">
            <label for="example-fileinput">Ảnh, logo</label>
            <br>
            Giữ ảnh cũ
            <br>
            <img src="{{url("storage/$manufacturer->image")}}" height="200px">
            <br>
            Hoặc thêm ảnh mới
            <br>
            <input value="{{$manufacturer->image}}" name="image" type="file" id="example-fileinput" class="form-control-file">
        </div>


        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>


@endsection
