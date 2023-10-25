@extends('layouts.admin_panel.lessons')
@section('content')
    <b>Название:</b> {{ $lesson->title }}<br>
    <b>Slug: </b> {{ $lesson->slug }}<br>
    <b>Описание: </b> {!! $lesson->description !!}<br>
    <b>Название курса: </b> {{ $lesson->course->title }}<br>
    <b>Порядковый номер урока в курсе: </b> {{ $lesson->priority }}
@endsection

@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.lessons.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.lessons.restore',$lesson->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
