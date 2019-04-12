@extends('layout.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                {{Form::open(['url' => '/manga/remove', 'class' => 'class', 'file' => false])}}
                <input value="{{$object->id}}" name="manga_id" hidden>
                <input type="submit" class="btn btn-danger" value="Delete">
                {{Form::close()}}
            </div>
            @foreach($object->pages as $page)
                <div class="col-xl-12">
                    <img src="/storage/{{$page->file}}" style="width: 100%">
                </div>
            @endforeach
        </div>
    </div>
@endsection