@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($roles as $role)
        <a href="{{route('admin.roles.show_trashed',$role->id)}}">{{$role->id}}. {{ $role->name }}</a><br>
    @endforeach

    {{ $roles->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.roles.index')}}">Back to undeleted roles</a>
@endsection
