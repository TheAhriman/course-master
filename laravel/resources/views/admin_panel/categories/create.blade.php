@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{old('name')}}">

            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   value="{{old('slug')}}">

            @error('slug')
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
        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="parent_id"
                    id="parent_id">
                <option value="">No parent</option>
                @foreach($categories as $category)
                    <option
                            {{old('parent_id') == $category->id ? ' selected' : ''}}
                            value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.courses.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
