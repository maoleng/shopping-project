@extends('layout.master')
@section('content')


    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Tên khách hàng</th>
            <th>Điện thoại</th>
            <th>Gia nhập vào lúc</th>
            <th>Xem</th>
{{--            <th>Sửa</th>--}}
            <th>Xóa</th>
        </tr>
        </thead>

        <tbody>
        @foreach($customers as $customer)
        <tr>
            <td class="table-user">
                {{$customer->id}}
            </td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->phone}}</td>
            <td>{{$customer->created_at}}</td>
            <td class="table-action">
                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
            </td>
{{--            <td class="table-action">--}}
{{--                <a href="{{route('customers.edit', ['customer' => $customer->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>--}}
{{--            </td>--}}
            <td class="table-action">
                <form action="{{route('customers.destroy', ['customer' => $customer->id])}}" method="post">
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
