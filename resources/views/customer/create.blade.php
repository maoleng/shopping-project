@extends('layout.master')
@section('content')

    <form action="{{route('manufacturers.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="example-palaceholder">Tên nhà cung cấp</label>
            <input name="name" type="text" id="example-palaceholder" class="form-control" placeholder="Vinfast">
        </div>

        <div class="form-group">
            <label for="example-textarea">Mô tả</label>
            <textarea name="description" class="form-control" id="example-textarea" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="example-fileinput">Ảnh, logo</label>
            <input name="image" type="file" id="example-fileinput" class="form-control-file">
        </div>


        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>

@endsection
