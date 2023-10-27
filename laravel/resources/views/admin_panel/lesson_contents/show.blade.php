@extends('layouts.admin_panel.lesson_contents')
@section('content')
    <b>Тип:</b> {{ $lessonContent->media_type->title() }}<br>
    <b>Содержимое: </b>
    @if($lessonContent->media_type->value == "text")
        {!! $lessonContent->value !!}<br>
    @else
        @if($lessonContent->media_type->value == "image")
            <img src="{{asset(\Illuminate\Support\Facades\Storage::url($lessonContent->value))}}" alt=""><br>
        @else
            <video controls>
                <source src="{{asset(\Illuminate\Support\Facades\Storage::url($lessonContent->value))}}" type="video/mp4">
            </video>
        @endif
    @endif
@endsection

