@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.question_responses.update',$questionResponse->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <input type="text" name="answer" class="form-control" id="answer"
                   value="{{$questionResponse->answer}}">

            @error('answer')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="question_id" class="form-label">Question group</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="question_id"
                    id="question_id">
                @foreach($questions as $question)
                    <option
                        {{$questionResponse->question_id == $question->id ? ' selected' : ''}}
                        value={{$question->id}}>{{$question->question}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="correct" class="form-label">Correct</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="correct"
                    id="correct">
                <option value="1" {{$questionResponse->correct == 1 ? ' selected' : ''}}>Yes</option>
                <option value="0" {{$questionResponse->correct == 0? ' selected' : ''}}>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="enabled" class="form-label">Enabled</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="enabled"
                    id="enabled">
                <option value="1" {{$questionResponse->enabled == 1 ? ' selected' : ''}}>Yes</option>
                <option value="0" {{$questionResponse->enabled == 0? ' selected' : ''}}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_responses.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
