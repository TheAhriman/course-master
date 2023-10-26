@extends('layouts.admin_panel.courses')
@section('content')
    <b>Название:</b> {{ $course->title }}<br>
    <b>Автор: </b> {{ $course->user->name }}<br>
    @if(count($course->categories) != 0)
        <b>Категории: </b><br> @foreach($course->categories as $category) {{$category->name}}<br> @endforeach
    @endif
    @if($course->about_course == null)
        <b><a href="{{route('admin.about_courses.create',$course->id)}}" class="btn-primary btn">Создать описание курса</a></b><br>
    @else
        <h1>О курсе</h1>
        {!! $course->about_course->value !!}
        <h1>Для кого предназначен</h1>
        {!! $course->about_course->audience !!}
        <h1>Что нужно знать для начала?</h1>
        {!! $course->about_course->requirements !!}
        <a href="{{route('admin.about_courses.edit',[$course,$course->about_course])}}" class="btn-primary btn">Изменить описание курса</a><br>
    @endif
    <b>Уроки:</b><br>
    @foreach($course->lessons as $lesson)
        <a href="{{route('admin.lessons.show',$lesson->id)}}">{{$lesson->priority}}. {{$lesson->title}}</a><br>
    @endforeach
    <a href="{{route('admin.lessons.create',$course)}}" class="btn-primary btn">Добавить урок</a>
@endsection


