@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($examinations as $examination)
        <a href="{{route('admin.examinations.show',$examination->id)}}">{{$examination->id}}. {{ $examination->title }}</a><br>
    @endforeach

    {{ $examinations->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.examinations.create')}}@endslot
        @slot('button')Create examination @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.examinations.index_trashed')}} @endslot
        @slot('button')Deleted examinations @endslot
    @endcomponent
@endsection
