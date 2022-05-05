@extends('layout.master')

@section('breadcrumb')
    <div class="page-title-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{route('admins.dashboard')}}"><i class="uil-home-alt"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('types.index')}}"><i class="uil-list-ui-alt"></i> Thể loại</a></li>
                <li class="breadcrumb-item"><a href="{{route('subtypes.index', ['type' => $type->id])}}"><i class="uil-list-ui-alt"></i> {{$type->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Đổi tên danh mục</h4>
@endsection

@section('content')

    <form action="{{route('subtypes.update', ['subtype' => $subtype->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="example-palaceholder">Tên danh mục mới</label>
            <input value="{{$subtype->name}}" name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Xe 3 bánh loại xịn">
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>

@endsection
