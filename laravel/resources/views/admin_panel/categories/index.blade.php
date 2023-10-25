@extends('layouts.admin_panel.admin_panel')
@section('content')
    @foreach($categories as $category)
        <a href="{{route('admin.categories.show',$category->id)}}">{{$category->id}}. {{ $category->name }}</a><br>
    @endforeach

    {{ $categories->links() }}
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.categories.create')}}@endslot
        @slot('button')Create category @endslot
    @endcomponent
    @component('components.link')
        @slot('link'){{route('admin.categories.index_trashed')}} @endslot
        @slot('button')Deleted categories @endslot
    @endcomponent
@endsection
