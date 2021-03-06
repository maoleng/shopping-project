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
                <li class="breadcrumb-item"><a href="{{route('manufacturers.index')}}"><i class="uil-store"></i> Nhà cung cấp</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Quản lý nhà cung cấp</h4>
@endsection



@section('content')
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên nhà cung cấp</th>
            <th>Hình ảnh</th>
            <th>Xem</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>

        <tbody>
        @foreach($manufacturers as $manufacturer)
        <tr>
            <td class="table-user">
                {{$manufacturer->id}}
            </td>
            <td>{{$manufacturer->name}}</td>
            <td>
                <img src={{url("storage/$manufacturer->image")}} alt="table-user" class="mr-2 rounded-circle" height="30px" >
            </td>
            <td class="table-action">
                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
            </td>
            <td class="table-action">
                <a href="{{route('manufacturers.edit', ['manufacturer' => $manufacturer->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
            </td>
            <td class="table-action">
                @if (session()->get('level') === 1)
                <form action="{{route('manufacturers.destroy', ['manufacturer' => $manufacturer->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="action-icon btn">
                        <i class="mdi mdi-delete"></i>
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $manufacturers->links('vendor.pagination.bootstrap-5') }}

@endsection
