@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{$role->name}}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.roles.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
