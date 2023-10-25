@extends('layouts.admin_panel.user_answers')
@section('content')
    <b>Ответ:</b> {{ $userAnswer->value }}<br>
    <b>К какому вопросу присоединено: </b> {{ $userAnswer->question->guestion }}<br>
    <b>Пользователь: </b> {{ $userAnswer->user->name }}<br>
    <b>К какому варианту ответа относится: </b> {{ $userAnswer->question_response->answer }}
@endsection

@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.user_answers.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.user_answers.restore',$userAnswer->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
