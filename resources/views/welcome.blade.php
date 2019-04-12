@extends('layout.app')

@section('title', $title)

@section('content')
    <div class="container">
        <div class="row">
            @foreach($mangas as $manga)
                <div class="col-xl-3">
                    @if($manga->pages->first())
                    <a href="{{route('manga.single',['manga' => $manga->id])}}">
                        <div class="index-image" style="background: url('../storage/{{$manga->pages->first()->file}}'); background-size: cover"></div>
                    </a>
                    @else
                        <a href="">
                            <div class="index-image"></div>
                        </a>
                    @endif
                    <p>{{$manga->title}}</p>
                    <p>
                        @foreach($manga->tags as $tag)
                            <b>{{$tag->title}}</b>,
                        @endforeach
                    </p>
                </div>
            @endforeach
        </div>
        {{$mangas->render()}}
    </div>
@endsection