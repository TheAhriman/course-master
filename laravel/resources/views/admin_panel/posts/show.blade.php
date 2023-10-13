@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.admin_panel.posts')
@section('content')
    <b>Название:</b> {{ $post->title }}<br>
    <b>Slug: </b>{{ $post->slug }}<br>
    <b>Изображение: </b><img src="{{Storage::url($post->image)}}" alt=""><br>
    <b>Автор: </b>{{ $post->user->name }}<br>
    <b>Превью-текст: </b>{!! $post->preview_description !!}<br>
    <b>Текст статьи: </b>{!! $post->description !!}<br>
    <b>Категория:</b>{{ $post->category->name }}<br>
    <b>Теги:</b> @foreach($post->tags as $tag)
        {{$tag->id}}.{{$tag->name}}
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
