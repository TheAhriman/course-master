@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.user_answers.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="value" class="form-label">Answer</label>
            <input type="text" name="value" class="form-control" id="value"
                   value="{{old('value')}}">

            @error('value')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="question_id" class="form-label">Question</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="question_id"
                    id="question_id">
                @foreach($questions as $question)
                    <option
                        {{old('question_id') == $question->id ? ' selected' : ''}}
                        value={{$question->id}}>{{$question->question}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Author</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user_id"
                    id="user_id">
                @foreach($users as $user)
                    <option
                        {{old('user_id') == $user->id ? ' selected' : ''}}
                        value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="question_response_id" class="form-label">Question response</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="question_response_id"
                    id="question_response_id">
                @foreach($questionResponses as $questionResponse)
                    <option
                        {{old('question_response_id') == $questionResponse->id ? ' selected' : ''}}
                        value={{$questionResponse->id}}>{{$questionResponse->answer}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.user_answers.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
