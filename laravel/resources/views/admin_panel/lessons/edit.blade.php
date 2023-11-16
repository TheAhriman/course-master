@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.lessons.update',$lesson->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   value="{{$lesson->title}}">

            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   value="{{$lesson->slug}}">

            @error('slug')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control"
                      id="description">{{$lesson->description}}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="course_id"
                    id="course_id">
                @foreach($courses as $course)
                    <option
                        {{$lesson->course_id == $course->id ? ' selected' : ''}}
                        value={{$course->id}}>{{$course->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="number" name="priority" class="form-control" id="priority"
                   value="{{$lesson->priority}}">

            @error('priority')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.lessons.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection