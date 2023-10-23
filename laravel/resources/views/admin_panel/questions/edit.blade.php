@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.questions.update',$question->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" name="question" class="form-control" id="question"
                   value="{{$question->question}}">

            @error('question')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="question_group_id" class="form-label">Question group</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="question_group_id"
                    id="question_group_id">
                @foreach($questionGroups as $questionGroup)
                    <option
                        {{$question->question_group_id == $questionGroup->id ? ' selected' : ''}}
                        value={{$questionGroup->id}}>{{$questionGroup->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type"
                    id="type">
                @foreach(\App\Enums\QuestionTypeEnum::cases() as $case)
                    <option
                        {{$question->type == $case->value ? ' selected' : ''}}
                        value={{$case->value}}>{{$case->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="number" name="priority" class="form-control" id="priority"
                   value="{{$question->priority}}">

            @error('priority')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="required" class="form-label">Required</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="required"
                    id="required">
                <option value="1" {{$question->required == 1 ? ' selected' : ''}}>Yes</option>
                <option value="0" {{$question->required == 0? ' selected' : ''}}>No</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.questions.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
