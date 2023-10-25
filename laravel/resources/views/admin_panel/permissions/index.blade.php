@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($permissions as $permission)
        <a href="{{route('admin.permissions.show',$permission->id)}}">{{$permission->id}}. {{ $permission->name }}</a><br>
    @endforeach

    {{ $permissions->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.permissions.create')}}@endslot
        @slot('button')Create permission @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.permissions.index_trashed')}} @endslot
        @slot('button')Deleted permissions @endslot
    @endcomponent
@endsection
