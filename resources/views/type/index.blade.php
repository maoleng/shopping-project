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
                <li class="breadcrumb-item"><a href="{{route('types.index')}}"><i class="uil-list-ui-alt"></i> Thể loại</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản lý</li>
            </ol>
        </nav>
    </div>
    <h4 class="page-title">Quản lý thể loại</h4>
@endsection

@section('content')

    <table class="table table-striped table-centered mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên thể loại</th>
                <th>Xem danh mục</th>
                <th>Thêm danh mục</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>

        <tbody>
        @foreach($types as $type)
            <tr>
                <td class="table-user">
                    {{$type->id}}
                </td>
                <td>{{$type->name}}</td>
                <td class="table-action">
                    <a href="{{route('subtypes.index', ['type' => $type->id])}}" class="action-icon">
                        <i class="mdi mdi-eye"></i>
                    </a>
                </td>
                <td class="table-action">
                    <a href="{{route('subtypes.create', ['type' => $type->id])}}" class="action-icon">
                        <i class="mdi mdi-plus"></i>
                    </a>
                </td>
                <td class="table-action">
                    <a href="{{route('types.edit', ['type' => $type->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                </td>
                <td class="table-action">
                    @if (session()->get('level') === 1)
                    <form action="{{route('types.destroy', ['type' => $type->id])}}" method="post">
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

@endsection
