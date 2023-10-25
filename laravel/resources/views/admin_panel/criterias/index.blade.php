@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($criterias as $criteria)
        <a href="{{route('admin.criterias.show',$criteria->id)}}">{{$criteria->id}}. {{ $criteria->title }}</a><br>
    @endforeach

    {{ $criterias->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.criterias.create')}}@endslot
        @slot('button')Create criteria @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.criterias.index_trashed')}} @endslot
        @slot('button')Deleted criteria @endslot
    @endcomponent
@endsection
