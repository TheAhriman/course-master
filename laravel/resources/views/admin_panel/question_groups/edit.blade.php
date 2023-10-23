@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.question_groups.update',$questionGroup->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title"
                   value="{{$questionGroup->title}}">

            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="examination_id" class="form-label">Examinations</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="examination_id"
                    id="examination">
                @foreach($examinations as $examination)
                    <option
                        {{$questionGroup->examination_id == $examination->id ? ' selected' : ''}}
                        value={{$examination->id}}>{{$examination->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <input type="number" name="priority" class="form-control" id="priority"
                   value="{{$questionGroup->priority}}">

            @error('priority')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_groups.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
