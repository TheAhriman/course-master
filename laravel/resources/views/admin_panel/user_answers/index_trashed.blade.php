@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($userAnswers as $userAnswer)
        <a href="{{route('admin.user_answers.show_trashed',$userAnswer->id)}}">{{$userAnswer->id}}. {{ $userAnswer->value }}</a><br>
    @endforeach

    {{ $userAnswers->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.user_answers.index')}}">Back to undeleted user answer</a>
@endsection
