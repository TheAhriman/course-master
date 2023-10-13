@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.categories.create')}}">Create</a>
    @yield('navbar_categories')
@endsection
