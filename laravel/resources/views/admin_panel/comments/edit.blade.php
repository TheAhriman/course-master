@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.comments.update',$comment->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="user_id"
                    id="user_id">
                @foreach($users as $user)
                    <option
                        {{$comment->user_id == $user->id ? ' selected' : ''}}
                        value={{$user->id}}>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea type="text" name="description" class="form-control"
                      id="description">{{ $comment->description }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="lesson_id" class="form-label">Lesson</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="lesson_id"
                    id="lesson_id">
                @foreach($lessons as $lesson)
                    <option
                        {{$comment->lesson_id == $lesson->id ? ' selected' : ''}}
                        value={{$lesson->id}}>{{$lesson->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.comments.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
