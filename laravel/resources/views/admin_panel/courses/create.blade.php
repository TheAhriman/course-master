@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.courses.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" name="title" class="form-control" id="title"
                   value="{{old('title')}}">

            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Author</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user_id"
                    id="user_id">
                @foreach($users as $user)
                    <option
                            {{old('user_id') == $user->id ? ' selected' : ''}}
                            value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            @foreach($categories as $category)
                <label for="category">{{$category->name}}
                    <input type="checkbox" name="category_id[]" value="{{$category->id}}" id="category" class="form-label">
                </label>
            @endforeach
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
