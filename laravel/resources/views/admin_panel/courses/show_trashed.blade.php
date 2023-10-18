@extends('layouts.admin_panel.courses')
@section('content')
    <b>Название:</b> {{ $course->title }}<br>
    <b>Автор: </b> {{ $course->user->name }}<br>
    @if(count($course->categories) != 0)
        <b>Категории: </b><br> @foreach($course->categories as $category) {{$category->name}}<br> @endforeach
    @endif
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.courses.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.courses.restore',$course->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
