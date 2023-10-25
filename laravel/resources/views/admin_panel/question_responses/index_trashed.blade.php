@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($questionResponses as $questionResponse)
        <a href="{{route('admin.question_responses.show_trashed',$questionResponse->id)}}">{{$questionResponse->id}}. {{ $questionResponse->answer }}</a><br>
    @endforeach

    {{ $questionResponses->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.question_responses.index')}}">Back to undeleted question responses</a>
@endsection
