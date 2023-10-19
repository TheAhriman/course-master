@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($users as $user)
        <a href="{{route('admin.users.show',$user->id)}}">{{$user->id}}. {{ $user->name }}</a><br>
    @endforeach

    {{ $users->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.users.create')}}@endslot
        @slot('button')Create user @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.users.index_trashed')}} @endslot
        @slot('button')Deleted users @endslot
    @endcomponent
@endsection
