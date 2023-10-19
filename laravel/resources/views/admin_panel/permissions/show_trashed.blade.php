@extends('layouts.admin_panel.permissions')
@section('content')
    <b>Название:</b> {{ $permission->name }}<br>
    <b>К какой роли присоединено: </b> {{ $permission->role->name }}
@endsection

@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.permissions.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.permissions.restore',$permission->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
