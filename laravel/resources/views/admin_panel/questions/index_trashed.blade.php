@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($questions as $question)
        <a href="{{route('admin.questions.show_trashed',$question->id)}}">{{$question->id}}. {{ $question->question }}</a><br>
    @endforeach

    {{ $questions->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.questions.index')}}">Back to undeleted questions</a>
@endsection
