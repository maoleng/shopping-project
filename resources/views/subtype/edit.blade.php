@extends('layout.master')
@section('content')

    <form action="{{route('subtypes.update', ['subtype' => $subtype->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="example-palaceholder">Tên loại sản phẩm mới</label>
            <input value="{{$subtype->name}}" name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Xe 3 bánh loại xịn">
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>

@endsection
