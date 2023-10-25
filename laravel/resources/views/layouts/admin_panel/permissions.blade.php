@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.permissions.create')}}@endslot
        @slot('button')Create permission @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.permissions.edit',$permission->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.permissions.destroy',$permission->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.permissions.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
