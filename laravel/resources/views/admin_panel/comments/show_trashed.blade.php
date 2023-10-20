@extends('layouts.admin_panel.comments')
@section('content')
    <b>Автор</b> {{ $comment->user->name }}<br>
    <b>Описание: </b> {!! $comment->description !!}<br>
    <b>К какому уроку принадлежит: </b> {{ $comment->lesson->title }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.comments.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.comments.restore',$comment->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
