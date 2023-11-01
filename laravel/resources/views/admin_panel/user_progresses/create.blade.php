@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.user_progresses.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Pupil</label>
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
            <label for="course_id" class="form-label">Course</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="course_id"
                    id="course_id">
                @foreach($courses as $course)
                    <option
                        {{old('course_id') == $course->id ? ' selected' : ''}}
                        value={{$course->id}}>{{$course->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.user_progresses.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
