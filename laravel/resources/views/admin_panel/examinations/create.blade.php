@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.examinations.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   value="{{old('title')}}">

            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type"
                    id="type">
                @foreach(\App\Enums\ExaminationTypeEnum::cases() as $case)
                    <option
                            {{old('type') == $case->value ? ' selected' : ''}}
                            value={{$case->value}}>{{$case->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="lesson_id" class="form-label">Lesson</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="lesson_id"
                    id="lesson_id">
                @foreach($lessons as $lesson)
                    <option
                            {{old('lesson_id') == $lesson->id ? ' selected' : ''}}
                            value={{$lesson->id}}>{{$lesson->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.examinations.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
