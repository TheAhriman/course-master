@extends('layouts/admin_panel.admin_panel')
@section('navbar')

    @component('components.link')
        @slot('link'){{route('admin.lessons.edit',$lesson->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.lessons.destroy',$lesson->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.lessons.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
