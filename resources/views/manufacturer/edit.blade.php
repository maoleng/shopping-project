@extends('layout.master')

@section('breadcrumb')
    <div class="page-title-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{route('admins.dashboard')}}"><i class="uil-home-alt"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('manufacturers.index')}}"><i class="uil-store"></i> Nhà cung cấp</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Sửa nhà cung cấp</h4>
@endsection

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
