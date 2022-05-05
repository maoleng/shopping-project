@extends('layout.master')
@section('search')
    <div class="app-search dropdown d-none d-lg-block">
        <form>
            <div class="input-group">
                <input value="{{$search}}" name="q" type="search" class="form-control dropdown-toggle" placeholder="Tìm kiếm..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('breadcrumb')
    <div class="page-title-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                <li class="breadcrumb-item"><a href="{{route('admins.dashboard')}}"><i class="uil-home-alt"></i> Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('admins.index')}}"><i class="uil-package"></i> Nhân viên</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Quản lý nhân viên</h4>
@endsection

@section('content')

    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Chức vụ</th>
            <th>Gia nhập vào lúc</th>
            <th>Tình trạng</th>
            <th>Xem/Sửa</th>
            <th>Khóa/Mở khóa</th>
            <th>Xóa</th>
        </tr>
        </thead>

        <tbody>
        @foreach($admins as $admin)
        <tr>
            <td class="table-user">
                {{$admin->id}}
            </td>
            <td>{{$admin->name}}</td>
            <td>{{$admin->stringLevel}}</td>
            <td>{{$admin->created_at}}</td>
            <td>{{$admin->isActive}}</td>
            <td class="table-action">
                <a href="{{route('admins.edit', ['admin' => $admin->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
            </td>

            @if ($admin->level !== 1)
                @if($admin->active === 1)
                    <td class="table-action">
                        <form action="{{route('admins.lock', ['admin' => $admin->id])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="mdi mdi-lock"></i>
                            </button>
                        </form>
                    </td>
                @else
                    <td class="table-action">
                        <form action="{{route('admins.unlock', ['admin' => $admin->id])}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="action-icon btn">
                                <i class="mdi mdi-key"></i>
                            </button>
                        </form>
                    </td>
                @endif
                <td class="table-action">
                    <form action="{{route('admins.destroy', ['admin' => $admin->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="action-icon btn">
                            <i class="mdi mdi-delete"></i>
                        </button>
                    </form>
                </td>
            @else
                <td></td>
                <td></td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
