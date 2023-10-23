@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($questionResponses as $questionResponse)
        <a href="{{route('admin.question_responses.show',$questionResponse->id)}}">{{$questionResponse->id}}. {{ $questionResponse->answer }}</a><br>
    @endforeach

    {{ $questionResponses->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_responses.create')}}@endslot
        @slot('button')Create question response @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.question_responses.index_trashed')}} @endslot
        @slot('button')Deleted question responses @endslot
    @endcomponent
@endsection
