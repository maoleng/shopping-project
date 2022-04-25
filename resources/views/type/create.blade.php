@extends('layout.master')
@section('content')

    <h1>Thêm thể loại</h1>
    <form action="{{route('types.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="example-palaceholder">Tên thể loại</label>
            <input name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Xe 3 bánh">
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
