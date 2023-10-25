@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($criterias as $criteria)
        <a href="{{route('admin.criterias.show_trashed',$criteria->id)}}">{{$criteria->id}}. {{ $criteria->title }}</a><br>
    @endforeach

    {{ $criterias->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.criterias.index')}}">Back to undeleted criterias</a>
@endsection
