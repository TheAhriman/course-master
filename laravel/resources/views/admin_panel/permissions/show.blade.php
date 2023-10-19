@extends('layouts.admin_panel.permissions')
@section('content')
    <b>Название:</b> {{ $permission->name }}<br>
    <b>К какой роли присоединено: </b> {{ $permission->role->name }}
@endsection

