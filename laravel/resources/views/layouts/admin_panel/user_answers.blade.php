@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.user_answers.create')}}@endslot
        @slot('button')Create user answer @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.user_answers.edit',$userAnswer->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.user_answers.destroy',$userAnswer->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.user_answers.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
