@extends('layouts.admin_panel.posts')
@section('content')
    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
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
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug"
                   value="{{old('slug')}}">

            @error('slug')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">Author</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user_id" id="user">

                @foreach($data['users'] as $user)
                    <option
                            {{old('user_id') == $user->id ? ' selected' : ''}}
                            value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="preview_description" class="form-label">Preview description</label>
            <textarea type="text" name="preview_description" class="form-control"
                      id="preview_description">{{old('preview_description')}}</textarea>
            @error('preview_description')
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
            <label for="category" class="form-label">Category</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id"
                    id="category">
                @foreach($data['categories'] as $category)
                    <option
                            {{old('category_id') == $category->id ? ' selected' : ''}}
                            value={{$category->id}}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label><br>
            <input type="date" id="date" name="date" value="{{old('date')}}"/>
            @error('date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            @foreach($data['tags'] as $tag)
                <label for="tag">{{$tag->name}}
                    <input type="checkbox" name="tag_id[]" value="{{$tag->id}}" id="tag" class="form-label">
                </label>
            @endforeach
        </div>
        <br>
        <div class="mb-3">
            <label for="image" class="form-label">
                <input name="image" type="file" id="image">
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
