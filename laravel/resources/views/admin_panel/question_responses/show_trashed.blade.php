@extends('layouts.admin_panel.question_responses')
@section('content')
    <b>Ответ:</b> {{ $questionResponse->answer }}<br>
    <b>К какому вопросу присоединено: </b> {{ $questionResponse->question->guestion }}<br>
    @if($questionResponse->correct == 1)
        <b>Ответ правильный</b>
    @else
        <b>Ответ не правильный</b>
    @endif
    @if($questionResponse->enabled == 1)
        <b>Ответ автоматически выбран</b>
    @endif
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_responses.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.question_responses.restore',$questionResponse->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
