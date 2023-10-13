@extends('layouts.admin_panel.tags')
@section('content')
    @foreach($tags as $tag)
        <a href="{{route('admin.tags.showTrashed',$tag->id)}}">{{$tag->id}}. {{ $tag->name }}</a><br>
    @endforeach

    {{ $tags->links() }}
@endsection
@section('navbar_tag')
    <a class="btn btn-primary" href="{{route('admin.tags.index')}}">Back to undeleted tags</a>
@endsection
