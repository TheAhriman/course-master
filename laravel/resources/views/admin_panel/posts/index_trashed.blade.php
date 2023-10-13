@extends('layouts.admin_panel.posts')
@section('content')
    @foreach($posts as $post)
        <a href="{{route('admin.posts.showTrashed',$post->id)}}">{{$post->id}}. {{ $post->title }}</a><br>
    @endforeach

    {{ $posts->links() }}
@endsection
@section('navbar_post')
    <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Back to undeleted posts</a>
@endsection
