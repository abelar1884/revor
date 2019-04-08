@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($object->pages as $page)
                <div class="col-xl-12">
                    <img src="/storage/{{$page->file}}" style="width: 100%">
                </div>
            @endforeach
        </div>
    </div>
@endsection