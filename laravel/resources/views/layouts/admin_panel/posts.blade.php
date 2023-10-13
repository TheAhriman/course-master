@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.posts.create')}}">Create</a>
    @yield('navbar_post')
@endsection
