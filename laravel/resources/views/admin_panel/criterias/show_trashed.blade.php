@extends('layouts.admin_panel.criterias')
@section('content')
    <b>Название:</b> {{ $criteria->title }}<br>
    <b>Описание: </b> {!! $criteria->text !!}<br>
    <b>К какому тесту принадлежит: </b> {{ $criteria->examination->title }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.criterias.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.criterias.restore',$criteria->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
