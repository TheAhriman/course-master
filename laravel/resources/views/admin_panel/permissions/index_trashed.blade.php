@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($permissions as $permission)
        <a href="{{route('admin.permissions.show_trashed',$permission->id)}}">{{$permission->id}}. {{ $permission->name }}</a><br>
    @endforeach

    {{ $permissions->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.permissions.index')}}">Back to undeleted permissions</a>
@endsection
