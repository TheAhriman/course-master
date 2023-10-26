@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.about_courses.update',[$aboutCourse,$course])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="value" class="form-label">О курсе</label>
            <textarea id="value" name="value">{{$aboutCourse->value}}</textarea>
            @error('value')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="audience" class="form-label">Для кого предназначен курс</label>
            <textarea id="audience" name="audience">{{$aboutCourse->audience}}</textarea>
            @error('audience')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="requirements" class="form-label">Что нужно знать для начала?</label>
            <textarea id="requirements" name="requirements">{{$aboutCourse->requirements}}</textarea>
            @error('requirements')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.courses.show',$course->id)}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
