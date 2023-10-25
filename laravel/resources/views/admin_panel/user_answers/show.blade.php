@extends('layouts.admin_panel.user_answers')
@section('content')
    <b>Ответ:</b> {{ $userAnswer->value }}<br>
    <b>К какому вопросу присоединено: </b> {{ $userAnswer->question->question }}<br>
    <b>Пользователь: </b> {{ $userAnswer->user->name }}<br>
    <b>К какому варианту ответа относится: </b> {{ $userAnswer->question_response->answer }}
@endsection

