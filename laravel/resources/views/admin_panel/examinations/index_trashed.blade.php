@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($examinations as $examination)
        <a href="{{route('admin.examinations.show_trashed',$examination->id)}}">{{$examination->id}}. {{ $examination->title }}</a><br>
    @endforeach

    {{ $examinations->links() }}
@endsection
@section('navbar')
    <a class="btn btn-primary" href="{{route('admin.examinations.index')}}">Back to undeleted examinations</a>
@endsection
