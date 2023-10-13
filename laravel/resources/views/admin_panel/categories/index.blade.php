@extends('layouts.admin_panel.categories')
@section('content')
    @foreach($categories as $category)
        <a href="{{route('admin.posts.show',$category->id)}}">{{$category->id}}. {{ $category->name }}</a><br>
    @endforeach

    {{ $categories->links() }}
@endsection
@section('navbar_post')
    <a class="btn btn-primary" href="{{route('admin.posts.indexTrashed')}}">Deleted posts</a>
@endsection
