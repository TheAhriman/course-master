@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($data as $progress)
        <form id="confirm-lesson" action="{{route('admin.user_taken_courses.confirm',$progress->id)}}" method="POST" class="d-none">
            @csrf
            @method('PATCH')
        </form>
        <a onclick="document.getElementById('confirm-lesson').submit();" type="submit" href="{{route('admin.user_taken_courses.confirm',$progress)}}">{{$progress->id}}. Курс:{{ $progress->course->title }}-ученик:{{ $progress->user->name }}</a><br>
    @endforeach

    {{ $data->links() }}
@endsection

