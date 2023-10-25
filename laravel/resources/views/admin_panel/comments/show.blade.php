@extends('layouts.admin_panel.comments')
@section('content')
    <b>Автор</b> {{ $comment->user->name }}<br>
    <b>Описание: </b> {!! $comment->description !!}<br>
    <b>К какому уроку принадлежит: </b> {{ $comment->lesson->title }}
@endsection

