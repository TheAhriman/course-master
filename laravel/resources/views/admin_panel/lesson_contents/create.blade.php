@extends('layouts.admin_panel.admin_panel')
@section('content')
    @vite('resources/js/scripts.js')
    <form action="{{route('admin.lesson_contents.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="media_type" class="form-label">Type</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="media_type"
                    id="selectzero">
                @foreach(array_reverse(\App\Enums\LessonContentMediaTypeEnum::cases()) as $case)
                    <option
                        {{old('media_type') == $case->value ? ' selected' : ''}}
                        value={{$case->value}}>{{$case->name}}</option>
                @endforeach
            </select>
        </div>
        <label class="form-label">Media</label>
        <textarea class="block" name='value' id="textarea"></textarea>
        <input type="file" name='image' class="block" accept="image/png, image/gif, image/jpeg" style="display:none"></input>
        <input type="file" name='video' accept="video/*" class="block" style="display: none">
        <div class="mb-3" style="display: none;" id="description">
            <label class="form-label" for="description">Description</label>
            <input type="text" name="description" id="description">
        </div>
        <div class="mb-3">
            <label for="lesson_id" class="form-label">Lesson</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="lesson_id" id="lesson_id">
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
        @slot('link'){{route('admin.lesson_contents.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
