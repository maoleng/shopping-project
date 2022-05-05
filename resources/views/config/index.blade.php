
@extends('layout.master')
@section('content')
<ul class="nav nav-tabs nav-bordered mb-3">
    <li class="nav-item">
        <a href="#home-b1" data-toggle="tab" aria-expanded="true" class="nav-link active">
            <i class="mdi mdi-home-variant d-md-none d-block"></i>
            <span class="d-none d-md-block">Văn bản</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#profile-b1" data-toggle="tab" aria-expanded="false" class="nav-link">
            <i class="mdi mdi-account-circle d-md-none d-block"></i>
            <span class="d-none d-md-block">Ảnh, video</span>
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane show active" id="home-b1">
        <table class="table table-striped table-centered mb-0">
            <thead>
            <tr>
                <th>Tên</th>
                <th>Giá trị</th>
                <th>Sửa</th>
            </tr>
            </thead>

            <tbody>
            @for($i = 0; $i <= 8; $i++)
                <tr>
                    <td>{{$config[$i]->beautyContent}}</td>
                    <td>{{$config[$i]->value}}</td>
                    <td class="table-action">
                        <a href="{{route('configs.edit', ['config' => $config[$i]->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                    </td>
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    <div class="tab-pane" id="profile-b1">
        <div class="row">
            <div class="col-xl-6">
                <div class="card d-block">
                    <img class="card-img-top" src="{{$config[9]->value}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Logo gốc</h5>
                        <p class="card-text">
                            Đây là ảnh logo gốc, kích cỡ và dung lượng tối đa nên sẽ rất nặng
                        </p>
                        <form {{route('configs.edit', ['config' => $config[9]->id])}}>
                            <button class="btn btn-primary">
                                Đổi ảnh
                            </button>
                        </form>
                    </div> <!-- end card-body-->
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card d-block">
                    <img class="card-img-top" src="{{$config[10]->value}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Logo phụ</h5>
                        <p class="card-text">
                            Đây là ảnh logo giảm kích thước, thường dùng ảnh này để làm ảnh icon cho trang web. Ảnh nhẹ giúp tải trang web nhanh hơn
                        </p>
                        <form action="{{route('configs.edit', ['config' => $config[10]->id])}}">
                            <button class="btn btn-primary">
                                Đổi ảnh
                            </button>
                        </form>
                    </div> <!-- end card-body-->
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card d-block">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$config[11]->value}}?autohide=0&showinfo=0&controls=0"></iframe>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Video giới thiệu về cửa hàng</h5>
                        <p class="card-text">
                            Đây là video giới thiệu về cửa hàng ở trang homepage
                        </p>
                        <form action="{{route('configs.edit', ['config' => $config[11]->id])}}">
                            <button class="btn btn-primary">
                                Đổi video
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card d-block">
                    <img class="card-img-top" src="{{$config[12]->value}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Mã QR</h5>
                        <p class="card-text">
                            Mã QR
                        </p>
                        <form action="{{route('configs.edit', ['config' => $config[12]->id])}}">
                            <button class="btn btn-primary">
                                Đổi ảnh
                            </button>
                        </form>
                    </div> <!-- end card-body-->
                </div>
            </div>
        </div>

    </div>
</div>





@endsection
