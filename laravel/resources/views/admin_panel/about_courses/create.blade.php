@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.about_courses.store',$course)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="value" class="form-label">О курсе</label>
            <textarea id="value" name="value">{{old('value')}}</textarea>
            @error('value')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="audience" class="form-label">Для кого предназначен курс</label>
            <textarea id="audience" name="audience">{{old('audience')}}</textarea>
            @error('audience')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="requirements" class="form-label">Что нужно знать для начала?</label>
            <textarea id="requirements" name="requirements">{{old('requirements')}}</textarea>
            @error('requirements')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.courses.show',$course->id)}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
