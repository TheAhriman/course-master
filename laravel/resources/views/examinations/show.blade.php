@extends('layouts.admin_panel.examinations')
@section('content')
    <b>Название:</b> {{ $examination->title }}<br>
    <b>К какому уроку присоединено: </b> {{ $examination->lesson->title }}<br>
@endsection

