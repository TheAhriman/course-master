@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($data as $progress)
        <form id="confirm-lesson" action="{{route('admin.user_progresses.confirm',$progress)}}" method="POST" class="d-none">
            @csrf
            @method('PATCH')
        </form>
        <a onclick="document.getElementById('confirm-lesson').submit();" type="submit" href="{{route('admin.user_progresses.confirm',$progress->id)}}">{{$progress->id}}. {{ $progress->lesson->title }}</a><br>
    @endforeach

    {{ $data->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.user_progresses.create')}}@endslot
        @slot('button')Add user to course @endslot
    @endcomponent
@endsection
