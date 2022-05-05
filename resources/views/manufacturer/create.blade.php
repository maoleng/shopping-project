@extends('layout.master')

@section('breadcrumb')
    <div class="page-title-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{route('admins.dashboard')}}"><i class="uil-home-alt"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('manufacturers.index')}}"><i class="uil-store"></i> Nhà cung cấp</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Thêm nhà cung cấp</h4>
@endsection


@section('content')

    <form action="{{route('manufacturers.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="example-palaceholder">Tên nhà cung cấp</label>
            <input name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Vinfast">
        </div>

        <div class="form-group">
            <label for="example-textarea">Mô tả</label>
            <textarea name="description" class="form-control" id="example-textarea" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="example-fileinput">Ảnh, logo</label>
            <input name="image" type="file" id="example-fileinput" class="form-control-file">
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
