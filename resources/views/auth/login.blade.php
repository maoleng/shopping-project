@extends('layout-auth.master')
@section('content')

<div class="card-body p-4">

    <div class="text-center w-75 m-auto">
        <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Đăng nhập</h4>
        <p class="text-muted mb-4">Nhập tài khoản và mật khẩu để truy cập vào vùng quản lý</p>
    </div>

    <form action="{{route('admins.process_login')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="emailaddress">Tên tài khoản</label>
            <input name="username" class="form-control" type="text" id="emailaddress" required="" placeholder="Nhập tài khoản">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <div class="input-group input-group-merge">
                <input name="password" type="password" id="password" class="form-control" placeholder="Nhập mật khẩu">
                <div class="input-group-append" data-password="false">
                    <div class="input-group-text">
                        <span class="password-eye"></span>
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="form-group mb-3">--}}
{{--            <div class="custom-control custom-checkbox">--}}
{{--                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>--}}
{{--                <label class="custom-control-label" for="checkbox-signin">Remember me</label>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="form-group mb-0 text-center">
            <button class="btn btn-primary" type="submit"> Đăng nhập </button>
        </div>

    </form>
</div> <!-- end card-body -->
@endsection









