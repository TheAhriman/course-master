@extends('layouts.admin_panel.question_groups')
@section('content')
    <b>Название:</b> {{ $questionGroup->title }}<br>
    <b>К какому тесту принадлежит: </b> {{ $questionGroup->examination->title }}<br>
    <b>Порядковый номер группы вопросов в тесте: </b> {{ $questionGroup->priority }}
@endsection

@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_groups.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.question_groups.restore',$questionGroup->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
