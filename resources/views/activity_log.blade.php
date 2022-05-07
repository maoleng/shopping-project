@extends('layout.master')

@section('content')
    <table class="table table-striped table-centered mb-0">
        <thead>
        <tr>
            <th>#</th>
            <th>Hành động</th>
            <th>Người thực hiện</th>
        </tr>
        </thead>

        <tbody>
        @foreach($activities as $activity)
        <tr>
            <td>{{$activity->id}}</td>
            <td>{{$activity->description}}</td>
            <td>{{$activity->causer_id}}</td>
        </tr>
        @endforeach
        </tbody>

@endsection
