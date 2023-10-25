@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.question_responses.create')}}@endslot
        @slot('button')Create question response @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.question_responses.edit',$questionResponse->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.question_responses.destroy',$questionResponse->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.question_responses.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
