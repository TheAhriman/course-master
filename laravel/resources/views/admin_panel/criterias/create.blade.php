@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.criterias.store')}}" method="post" enctype="multipart/form-data">
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
            <label for="text" class="form-label">Description</label>
            <textarea type="text" name="text" class="form-control"
                      id="text">{{old('text')}}</textarea>
            @error('text')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="examination_id" class="form-label">Examination</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="examination_id"
                    id="examination_id">
                @foreach($examinations as $examination)
                    <option
                            {{old('examination_id') == $examination->id ? ' selected' : ''}}
                            value={{$examination->id}}>{{$examination->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.criterias.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
