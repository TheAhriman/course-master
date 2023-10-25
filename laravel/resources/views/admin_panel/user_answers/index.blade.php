@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($userAnswers as $userAnswer)
        <a href="{{route('admin.user_answers.show',$userAnswer->id)}}">{{$userAnswer->id}}. {{ $userAnswer->value }}</a><br>
    @endforeach

    {{ $userAnswers->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.user_answers.create')}}@endslot
        @slot('button')Create user answers @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.user_answers.index_trashed')}} @endslot
        @slot('button')Deleted user answers @endslot
    @endcomponent
@endsection
