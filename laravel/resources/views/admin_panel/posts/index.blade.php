@extends('layouts.admin_panel.posts')
@section('content')
    @foreach($posts as $post)
        <a href="{{route('admin.posts.show',$post->id)}}">{{$post->id}}. {{ $post->title }}</a><br>
    @endforeach

    {{ $posts->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.posts.indexTrashed')}}">Deleted posts</a>
@endsection
