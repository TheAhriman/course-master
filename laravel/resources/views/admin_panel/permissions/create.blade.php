@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.permissions.store')}}" method="post" enctype="multipart/form-data">
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
            <label for="role_id" class="form-label">Role</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="role_id"
                    id="role_id">
                @foreach($roles as $role)
                    <option
                            {{old('role_id') == $role->id ? ' selected' : ''}}
                            value={{$role->id}}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.permissions.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
