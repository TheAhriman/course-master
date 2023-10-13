@extends('layouts.admin_panel.categories')
@section('content')
    <b>Название:</b> {{ $category->name }}<br>
    <b>Slug: </b> {{ $category->slug }}<br>
    <b>Описание: </b> {{ $category->description }}<br>
    <b>Родительская категория: </b> {{ $parent->name }}
    @endforeach
@endsection
@section('navbar_post')
    <a class='btn btn-primary' href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
    <form action="{{ route('admin.posts.destroy',$post->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    <a class='btn btn-primary' href="{{route('admin.posts.index')}}">Back</a>
@endsection
