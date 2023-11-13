@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($data as $progress)
        <form id="confirm-lesson" action="
        @if($progress->status == \App\Enums\TakingCourseStatusTypeEnum::WAITING)
            {{{route('admin.user_taken_courses.confirm',$progress->id)}}}
        @else
            {{route('admin.user_taken_courses.log',$progress->id)}}
        @endif
		" method="POST" class="d-none">
            @csrf
            @method('PATCH')
        </form>
        <a onclick="document.getElementById('confirm-lesson').submit();" type="submit" >{{$progress->id}}. Курс:{{ $progress->course->title }}-ученик:{{ $progress->user->name }}. Время: {{$progress->completion_time}}</a><br>
    @endforeach

    {{ $data->links() }}
@endsection

