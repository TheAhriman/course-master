@extends('layouts.admin_panel.categories')
@section('content')
    <b>Название:</b> {{ $data['category']->name }}<br>
    <b>Slug: </b> {{ $data['category']->slug }}<br>
    <b>Описание: </b> {{ $data['category']->description }}<br>
    @if($data['parent'] != null)
        <b>Родительская категория: </b> {{ $data['parent']->name }}<br>
    @endif
    @if(count($data['children']) != 0)
        <b>Дочерние категории: </b><br> @foreach($data['children'] as $kid) {{$kid->name}}<br> @endforeach
    @endif
@endsection
@section('navbar_category')
    <a class='btn btn-primary' href="{{route('admin.categories.edit', $data['category']->id)}}">Edit</a>
    <form action="{{ route('admin.categories.destroy',$data['category']->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    <a class='btn btn-primary' href="{{route('admin.categories.index')}}">Back</a>
@endsection
