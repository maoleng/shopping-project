@extends('layout-auth.master')
@section('content')
                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <img src="https://i1.sndcdn.com/artworks-gKtKz01lPBW4AKXz-pxy3tg-t500x500.jpg" height="64" alt="user-image" class="rounded-circle shadow">
                            <h4 class="text-dark-50 text-center mt-3 font-weight-bold">Xin chào! {{$admin->name}} </h4>
                            <p class="text-muted mb-4">Điền mật khẩu của bạn để truy cập vào hệ thống</p>
                        </div>

                        <form action="{{route('admins.process_login')}}" method="post">
                            @csrf
                            <input type="hidden" name="username" value="{{$admin->username}}">
                            <div class="form-group mb-3">
                                <label for="password">Mật khẩu</label>
                                <input name="password" class="form-control" type="password" required="" id="password" placeholder="Điền mật khẩu">
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary" type="submit">Đăng nhập</button>
                            </div>
                        </form>

                    </div> <!-- end card-body-->
@endsection
