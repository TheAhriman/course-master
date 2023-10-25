@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($lessons as $lesson)
        <a href="{{route('admin.lessons.show_trashed',$lesson->id)}}">{{$lesson->id}}. {{ $lesson->title }}</a><br>
    @endforeach

    {{ $lessons->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.lessons.index')}}">Back to undeleted lessons</a>
@endsection
