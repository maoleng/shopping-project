@extends('layout.master')
@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                <img src="https://i1.sndcdn.com/artworks-gKtKz01lPBW4AKXz-pxy3tg-t500x500.jpg" class="rounded-circle avatar-lg img-thumbnail"
                alt="profile-image">

                <h4 class="mb-0 mt-2">{{$admin->name}}</h4>
                <p class="text-muted font-14">{{$admin->stringLevel}}</p>

                @if($admin->level !== 1 && session()->get('level') === 1)
                    @if($admin->active === 1)
                    <form action="{{route('admins.lock', ['admin' => $admin->id])}}" method="post" style="display: inline-block">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-success btn-sm mb-2">Khóa</button>
                    </form>
                    @else
                        <form action="{{route('admins.unlock', ['admin' => $admin->id])}}" method="post" style="display: inline-block">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-success btn-sm mb-2">Mở khóa</button>
                        </form>
                    @endif
                    <form action="{{route('admins.destroy', ['admin' => $admin->id])}}" method="post" style="display: inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm mb-2">Sa thải</button>
                    </form>
                @endif
                <div class="text-left mt-3">
                    <p class="text-muted mb-2 font-13"><strong>Họ và tên :</strong>
                        <span class="ml-2">{{$admin->name}}</span>
                    </p>

                    <p class="text-muted mb-2 font-13"><strong>Điện thoại :</strong>
                        <span class="ml-2">0132456798</span>
                    </p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong>
                        <span class="ml-2 ">user@email.domain</span>
                    </p>

                    <p class="text-muted mb-1 font-13"><strong>Địa chỉ :</strong>
                        <span class="ml-2">USA</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#aboutme" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                            Thông tin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Cài đặt
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="aboutme">
                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                        Lịch sử hoạt động</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless table-nowrap mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>1</th>
                                        <th>Hành động</th>
                                        <th>Đối tượng</th>
                                        <th>Tên đối tượng</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <span class="badge badge-info-lighten">Thêm</span>
                                        </td>
                                        <td>Sản phẩm</td>
                                        <td>Máy hút cỏ</td>
                                        <td>01/04/2022</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <span class="badge badge-danger-lighten">Xóa</span>
                                        </td>
                                        <td>Sản phẩm</td>
                                        <td>Máy hút cỏ</td>
                                        <td>01/04/2022</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <span class="badge badge-success-lighten">Sửa</span>
                                        </td>
                                        <td>Sản phẩm</td>
                                        <td>Máy hút cỏ</td>
                                        <td>01/04/2022</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <span class="badge badge-success-lighten">Cập nhật</span>
                                        </td>
                                        <td>Sản phẩm</td>
                                        <td>Máy hút cỏ</td>
                                        <td>01/04/2022</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="settings">
                            <form action="{{route('admins.update', ['admin' => $admin->id])}}" method="post">
                                @csrf
                                @method('PUT')
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Thông tin cá nhân</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userbio">Tài khoản</label>
                                        <input name="username" type="text" id="example-readonly" class="form-control" readonly="" value="{{$admin->username}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Họ và tên</label>
                                        <input name="name" type="text" class="form-control" id="firstname" placeholder="Enter first name" value="{{$admin->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Mật khẩu</label>
                                        <input name="password" type="password" class="form-control" id="userpassword" placeholder="Nhập mật khẩu mới" value="{{$admin->password}}">
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
