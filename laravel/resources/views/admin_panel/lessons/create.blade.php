@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.lessons.store',$course)}}" method="post" enctype="multipart/form-data">
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
            <label for="description" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control"
                      id="description">{{old('description')}}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        @role('creator')
        <label for="course_id" class="form-label">Course</label>
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="course_id" id="course_id">
            <option value="{{$course->id}}">{{$course->title}}</option>
        </select><br>
        @endrole
        @role('admin')
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="course_id" id="course_id">
                @foreach($courses as $course)
                    <option
                            {{old('course_id') == $course->id ? ' selected' : ''}}
                            value={{$course->id}}>{{$course->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="number" name="priority" class="form-control" id="priority"
                   value="{{old('priority')}}">

            @error('priority')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        @endrole
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.courses.show',$course->id)}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
