@extends('layout.master')
@section('content')

    <h1>Thêm loại sản phẩm vào thể loại {{$type->name}}</h1>
    <form action="{{route('subtypes.store', ['type' => $type->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="example-palaceholder">Tên loại sản phẩm</label>
            <input name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Xe 3 bánh loại xịn">
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
