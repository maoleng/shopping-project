@extends('layout.master')
@section('content')

    <form action="{{route('manufacturers.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        Tên
        <input type="text" name="name">
        <br>
        Mô tả
        <input type="text" name="description">
        <br>
        Ảnh
        <input type="file" name="image">
        <br>
        <button>Thêm</button>
    </form>


@endsection
