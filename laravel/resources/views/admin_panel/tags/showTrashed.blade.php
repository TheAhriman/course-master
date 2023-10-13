@extends('layouts.admin_panel.tags')
@section('content')
    <b>Название тега:</b> {{ $tag->name }}<br>
    <b>Связанные посты:</b><br>  @foreach($tag->posts as $post)
        {{$post->id}}.{{$post->title}}<br>
    @endforeach
@endsection
@section('navbar_tag')
    <form action="{{ route('admin.tags.destroy',['tag' => $tag->id, 'permanent' => true]) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    <a class='btn btn-primary' href="{{route('admin.tags.indexTrashed')}}">Back</a>
@endsection
