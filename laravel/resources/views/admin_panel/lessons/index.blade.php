@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($lessons as $lesson)
        <a href="{{route('admin.lessons.show',$lesson->id)}}">{{$lesson->id}}. {{ $lesson->title }}</a><br>
    @endforeach

    {{ $lessons->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.lessons.create')}}@endslot
        @slot('button')Create lesson @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.lessons.index_trashed')}} @endslot
        @slot('button')Deleted lessons @endslot
    @endcomponent
@endsection
