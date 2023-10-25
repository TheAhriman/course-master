@extends('layouts.admin_panel.questions')
@section('content')
    <b>Вопрос:</b> {{ $question->question }}<br>
    <b>К какой группе вопросов присоединено: </b> {{ $question->question_group->title }}<br>
    <b>Тип вопроса: </b> {{ $question->type->title() }}<br>
    <b>Порядковый номер вопроса в группе:</b> {{ $question->priority }}<br>
    @if($question->required == 1)
        <b>Вопрос обязателен</b>
    @else
        <b>Вопрос не обязателен</b>
    @endif
@endsection

