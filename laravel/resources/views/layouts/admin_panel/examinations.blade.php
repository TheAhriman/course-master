@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.examinations.create')}}@endslot
        @slot('button')Create examination @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.examinations.edit',$examination->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.examinations.destroy',$examination->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.examinations.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
