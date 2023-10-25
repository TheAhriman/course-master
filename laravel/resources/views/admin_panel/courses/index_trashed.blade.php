@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($courses as $course)
        <a href="{{route('admin.courses.show_trashed',$course->id)}}">{{$course->id}}. {{ $course->title }}</a><br>
    @endforeach

    {{ $courses->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.courses.index')}}">Back to undeleted categories</a>
@endsection
