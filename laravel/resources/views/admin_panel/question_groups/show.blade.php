@extends('layouts.admin_panel.question_groups')
@section('content')
    <b>Название:</b> {{ $questionGroup->title }}<br>
    <b>К какому тесту принадлежит: </b> {{ $questionGroup->examination->title }}<br>
    <b>Порядковый номер группы вопросов в тесте: </b> {{ $questionGroup->priority }}
@endsection

