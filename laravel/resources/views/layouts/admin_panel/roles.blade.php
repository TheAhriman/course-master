@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.roles.create')}}@endslot
        @slot('button')Create role @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.roles.edit',$role->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.roles.destroy',$role->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.roles.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
