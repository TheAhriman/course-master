@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($questionGroups as $questionGroup)
        <a href="{{route('admin.question_groups.show',$questionGroup->id)}}">{{$questionGroup->id}}. {{ $questionGroup->title }}</a><br>
    @endforeach

    {{ $questionGroups->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_groups.create')}}@endslot
        @slot('button')Create question group @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.question_groups.index_trashed')}} @endslot
        @slot('button')Deleted question groups @endslot
    @endcomponent
@endsection
