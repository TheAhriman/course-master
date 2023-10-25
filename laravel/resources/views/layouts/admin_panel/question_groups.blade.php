@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_groups.create')}}@endslot
        @slot('button')Create question group @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.question_groups.edit',$questionGroup->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.question_groups.destroy',$questionGroup->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.question_groups.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
