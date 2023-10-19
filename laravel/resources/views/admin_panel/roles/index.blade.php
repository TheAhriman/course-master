@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($roles as $role)
        <a href="{{route('admin.roles.show',$role->id)}}">{{$role->id}}. {{ $role->name }}</a><br>
    @endforeach

    {{ $roles->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.roles.create')}}@endslot
        @slot('button')Create role @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.roles.index_trashed')}} @endslot
        @slot('button')Deleted roles @endslot
    @endcomponent
@endsection
