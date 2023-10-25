@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($lessonContents as $lessonContent)
        <a href="{{route('admin.lesson_contents.show_trashed',$lessonContent->id)}}">{{$lessonContent->id}}. {{ $lessonContent->value }}</a><br>
    @endforeach

    {{ $lessonContents->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.lesson_contents.index')}}">Back to undeleted lesson contents</a>
@endsection
