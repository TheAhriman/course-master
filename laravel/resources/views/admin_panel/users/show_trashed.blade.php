@extends('layouts.admin_panel.users')
@section('content')
    <b>Имя:</b> {{ $user->name }}<br>
    <b>Электронная почта: </b> {{ $user->email }}<br>
    @if($user->email_verified_at != null)
        <b>Дата подтверждения электронной почты: </b> {{ $user->email_verified_at }}<br>
    @else
        <b>Электронная почта не подтверждена</b><br>
    @endif
    <b>Пароль: </b> {{ $user->password }}<br>
    <b>Роль пользователя: </b> {{ $user->role->name }}
@endsection

@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.users.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.users.restore',$user->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
