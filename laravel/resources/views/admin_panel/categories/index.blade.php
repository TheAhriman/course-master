@extends('layouts.admin_panel.categories')
@section('content')
    @foreach($categories as $category)
        <a href="{{route('admin.categories.show',$category->id)}}">{{$category->id}}. {{ $category->name }}</a><br>
    @endforeach

    {{ $categories->links() }}
@endsection
@section('navbar_category')
    <a class="btn btn-primary" href="{{route('admin.categories.indexTrashed')}}">Deleted categories</a>
@endsection
