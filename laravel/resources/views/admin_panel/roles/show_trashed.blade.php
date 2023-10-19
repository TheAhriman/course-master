@extends('layouts.admin_panel.roles')
@section('content')
    <b>Название:</b> {{ $role->name }}
@endsection

@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.roles.index_trashed')}} @endslot
        @slot('button')Back @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.roles.restore',$role->id)}} @endslot
        @slot('button')Restore @endslot
    @endcomponent
@endsection
