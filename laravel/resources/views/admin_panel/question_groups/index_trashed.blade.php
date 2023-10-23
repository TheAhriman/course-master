@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($questionGroups as $questionGroup)
        <a href="{{route('admin.question_groups.show_trashed',$questionGroup->id)}}">{{$questionGroup->id}}. {{ $questionGroup->title }}</a><br>
    @endforeach

    {{ $questionGroups->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.question_groups.index')}}">Back to undeleted question groups</a>
@endsection
