@extends('layouts.admin_panel.criterias')
@section('content')
    <b>Название:</b> {{ $criteria->title }}<br>
    <b>Описание: </b> {!! $criteria->text !!}<br>
    <b>К какому тесту принадлежит: </b> {{ $criteria->examination->title }}
@endsection

