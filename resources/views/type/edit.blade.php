@extends('layout.master')
@section('content')

    <form action="{{route('types.update', ['type' => $type->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="example-palaceholder">Tên thể loại mới</label>
            <input value="{{$type->name}}" name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Xe 3 bánh">
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>

@endsection
