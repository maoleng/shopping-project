@extends('layout.master')
@section('content')

    <form action="{{route('configs.update', ['config' => $config_main->id])}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="example-palaceholder">Đổi tên</label>
            <input value="{{$config_main->value}}" name="value" config="text" id="example-palaceholder" class="form-control">
        </div>

        <button config="submit" class="btn btn-primary">Sửa</button>
    </form>

@endsection
