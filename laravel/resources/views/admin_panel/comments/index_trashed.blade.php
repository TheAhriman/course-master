@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($comments as $comment)
        <a href="{{route('admin.comments.show_trashed',$comment->id)}}">{{$comment->id}}. {{ $comment->description }}</a><br>
    @endforeach

    {{ $comments->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.comments.index')}}">Back to undeleted comments</a>
@endsection
