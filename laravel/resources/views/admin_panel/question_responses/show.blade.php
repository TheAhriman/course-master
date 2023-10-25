@extends('layouts.admin_panel.question_responses')
@section('content')
    <b>Ответ:</b> {{ $questionResponse->answer }}<br>
    <b>К какому вопросу присоединено: </b> {{ $questionResponse->question->guestion }}<br>
    @if($questionResponse->correct == 1)
        <b>Ответ правильный</b><br>
    @else
        <b>Ответ не правильный</b><br>
    @endif
    @if($questionResponse->enabled == 1)
        <b>Ответ автоматически выбран</b>
    @endif
@endsection

