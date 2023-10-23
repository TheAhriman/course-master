@extends('layouts.admin_panel.admin_panel')
@section('content')
    <form action="{{route('admin.lesson_contents.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="media_type" class="form-label">Type</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="media_type"
                    id="select0" id="{{\App\Enums\}}">
                <option>--</option>
                @foreach(\App\Enums\LessonContentMediaTypeEnum::cases() as $case)
                    <option
                        {{old('media_type') == $case->value ? ' selected' : ''}}
                        value={{$case->value}}>{{$case->name}}</option>
                @endforeach
            </select>
            <div class="block" style="display:none"></div>
            <input type="file" class="block" accept="image/png, image/gif, image/jpeg" style="display:none"></input>
            <input type="file" accept="video/*" class="block" style="display:none">
            <textarea class="block"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
@section('navbar')
    @component('components.link')
        @slot('link'){{route('admin.questions.index')}}@endslot
        @slot('button')Back @endslot
    @endcomponent
@endsection
