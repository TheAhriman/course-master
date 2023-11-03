@extends('layouts.admin_panel.examinations')
@section('content')
    <b>Название:</b> {{ $examination->title }}<br>
    <b>К какому уроку присоединено: </b> {{ $examination->lesson->title }}<br>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.examinations.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.examinations.restore',$examination->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
