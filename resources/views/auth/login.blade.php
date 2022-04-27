@extends('layout.master')
@section('content')
<form action="{{route('admins.process_login')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Tài khoản</label>
        <input name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
</form>
@endsection
