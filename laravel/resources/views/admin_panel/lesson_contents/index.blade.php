@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($lessonContents as $lessonContent)
        <a href="{{route('admin.lesson_contents.show',$lessonContent->id)}}">{{$lessonContent->id}}. {{ $lessonContent->value }}</a><br>
    @endforeach

    {{ $lessonContents->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.lesson_contents.create')}}@endslot
        @slot('button')Create lesson content @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.lesson_contents.index_trashed')}} @endslot
        @slot('button')Deleted lesson contents @endslot
    @endcomponent
@endsection
