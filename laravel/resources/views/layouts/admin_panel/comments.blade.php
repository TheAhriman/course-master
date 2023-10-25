@extends('layouts/admin_panel.admin_panel')
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.comments.create')}}@endslot
        @slot('button')Create comment @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.comments.edit',$comment->id)}}@endslot
        @slot('button')Edit @endslot
    @endcomponent
    <form action="{{ route('admin.comments.destroy',$comment->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
    @component('components.link')
        @slot('link'){{route('admin.comments.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
