@extends('layout.master')
@section('content')

    <a href="{{route('admins.create')}}">
        Thêm nhân viên
    </a>
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên</th>
            <th>Chức vụ</th>
            <th>Gia nhập vào lúc</th>
            <th>Tình trạng</th>
            <th>Xem</th>
            <th>Sửa</th>
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
                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
            </td>
            <td class="table-action">
                <a href="{{route('admins.edit', ['admin' => $admin->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
            </td>
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
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
