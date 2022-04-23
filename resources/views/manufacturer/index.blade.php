@extends('layout.master')
@section('content')

    <a href="{{route('manufacturers.create')}}">Thêm</a>

    <table border="1px solid black" width="100%" >
        <tr>
            <td>#</td>
            <td>Tên nhà cung cấp</td>
            <td>Hình ảnh</td>
            <td>Xem chi tiết</td>
            <td>Sửa</td>
            <td>Xóa</td>
        </tr>

        @foreach($manufacturers as $manufacturer)
        <tr>
            <td>{{$manufacturer->id}}</td>
            <td>{{$manufacturer->name}}</td>
            <td>
                <img src={{public_path()}}\storage\{{$manufacturer->image}} width="200px">
            </td>
            <td>
                <a href="#">Xem</a>
            </td>
            <td>
                <a href="{{route('manufacturers.edit', ['manufacturer' => $manufacturer->id])}}">
                    Sửa
                </a>
            </td>
            <td>
                <form action="{{route('manufacturers.destroy', ['manufacturer' => $manufacturer->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button>Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
