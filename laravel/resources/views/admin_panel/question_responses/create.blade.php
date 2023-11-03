@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.question_responses.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <input type="text" name="answer" class="form-control" id="answer"
                   value="{{old('answer')}}">

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
                        {{old('question_id') == $question->id ? ' selected' : ''}}
                        value={{$question->id}}>{{$question->question}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="correct" class="form-label">Correct</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="correct"
                    id="correct">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="enabled" class="form-label">Enabled</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="enabled"
                    id="enabled">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.questions.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
