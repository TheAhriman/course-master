@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($users as $user)
        <a href="{{route('admin.users.show_trashed',$user->id)}}">{{$user->id}}. {{ $user->name }}</a><br>
    @endforeach

    {{ $users->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.users.index')}}">Back to undeleted users</a>
@endsection
