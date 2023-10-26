@extends('layouts.admin_panel.courses')
@section('content')
    <b>Название:</b> {{ $course->title }}<br>
    <b>Автор: </b> {{ $course->user->name }}<br>
    @if(count($course->categories) != 0)
        <b>Категории: </b><br> @foreach($course->categories as $category) {{$category->name}}<br> @endforeach
    @endif
@endsection

