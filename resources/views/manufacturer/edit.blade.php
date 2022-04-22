@extends('layout.master')
@section('content')

    <form action="{{route('manufacturers.update', ['manufacturer' => $manufacturer->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        Tên
        <input type="text" name="name" value="{{$manufacturer->name}}">
        <br>
        Mô tả
        <input type="text" name="description" value="{{$manufacturer->description}}">
        <br>
        Ảnh
        <input type="file" name="image" value="{{$manufacturer->image}}">
        <br>
        <button>Sửa</button>
    </form>


@endsection
