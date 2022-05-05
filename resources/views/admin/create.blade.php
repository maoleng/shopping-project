@extends('layout.master')
@section('breadcrumb')
    <div class="page-title-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{route('admins.dashboard')}}"><i class="uil-home-alt"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('admins.index')}}"><i class="uil-package"></i> Nhân viên</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Thêm nhân viên</h4>
@endsection


@section('content')

    <form action="{{route('admins.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="example-palaceholder">Tên nhân viên</label>
            <input name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Thành Kim">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Tài khoản</label>
            <input name="username" type="text" id="example-palaceholder" class="form-control" placeholder="thanhkim123">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Mật khẩu</label>
            <input name="password" type="password" id="example-palaceholder" class="form-control" placeholder="123456789">
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
