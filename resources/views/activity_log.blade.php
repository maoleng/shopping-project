@extends('layout.master')

@section('content')
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Người thực hiện</th>
            <th>Hành động</th>
            <th>Tên đối tượng</th>
            <th>Thời gian</th>
        </tr>
        </thead>

        <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td>{{$activity->properties->get('cause_name')}}</td>
            <td>{{$activity->description}}</td>
            <td>{{$activity->properties->get('subject_name')}}</td>
            <td>{{$activity->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    {{ $activities->links('vendor.pagination.bootstrap-5') }}

@endsection
