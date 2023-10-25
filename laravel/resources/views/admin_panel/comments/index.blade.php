@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($comments as $comment)
        <a href="{{route('admin.comments.show',$comment->id)}}">{{$comment->id}}. {{ $comment->description }}</a><br>
    @endforeach

    {{ $comments->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.comments.create')}}@endslot
        @slot('button')Create comment @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.comments.index_trashed')}} @endslot
        @slot('button')Deleted comment @endslot
    @endcomponent
@endsection
