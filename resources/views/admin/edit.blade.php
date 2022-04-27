
@extends('layout.master')
@section('content')

    <form action="{{route('admins.update', ['admin' => $admin->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="example-palaceholder">Tên nhân viên mới</label>
            <input value="{{$admin->name}}" name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Thành Kim">
        </div>

        <div class="form-group">
            <label for="example-palaceholder">Mật khẩu mới</label>
            <input value="{{$admin->password}}" name="password" type="password" id="example-palaceholder" class="form-control" placeholder="123456789">
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>


@endsection
