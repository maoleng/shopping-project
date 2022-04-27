@extends('layout.master')
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
