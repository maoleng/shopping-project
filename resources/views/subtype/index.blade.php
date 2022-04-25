@extends('layout.master')
@section('content')

<a href="{{route('subtypes.create', ['type' => $type->id])}}">Thêm</a>
<h1>Các loại sản phẩm thuộc thể loại {{$type->name}}</h1>
    <table class="table table-striped table-centered mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên loại sản phẩm</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>

        <tbody>
        @foreach($subtypes as $subtype)
            <tr>
                <td class="table-user">
                    {{$subtype->id}}
                </td>
                <td>{{$subtype->name}}</td>
                <td class="table-action">
                    <a href="{{route('subtypes.edit', ['subtype' => $subtype->id])}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                </td>
                <td class="table-action">
                    <form action="{{route('subtypes.destroy', ['subtype' => $subtype->id])}}" method="post">
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
