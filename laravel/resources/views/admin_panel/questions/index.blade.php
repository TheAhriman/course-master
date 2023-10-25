@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($questions as $question)
        <a href="{{route('admin.questions.show',$question->id)}}">{{$question->id}}. {{ $question->question }}</a><br>
    @endforeach

    {{ $questions->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.questions.create')}}@endslot
        @slot('button')Create question @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.questions.index_trashed')}} @endslot
        @slot('button')Deleted questions @endslot
    @endcomponent
@endsection
