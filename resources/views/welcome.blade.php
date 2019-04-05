@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($mangas as $manga)
                <div class="col-xl-3">
                    <a href="">
                        <div class="index-image" style="background: url('../storage/{{$manga->pages->first()->file}}'); background-size: cover"></div>
                    </a>
                    <p>{{$manga->title}}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection