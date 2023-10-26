@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($courses as $course)
        <a href="{{route('admin.courses.show',$course->id)}}">{{$course->id}}. {{ $course->title }}</a><br>
    @endforeach

    {{ $courses->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.courses.create')}}@endslot
        @slot('button')Create course @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.courses.index_trashed')}} @endslot
        @slot('button')Deleted courses @endslot
    @endcomponent
@endsection
