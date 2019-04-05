@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            {{Form::open(['url' => '/manga/upload', 'class' => 'offset-xl-3 col-xl-6', 'file' => true])}}
            <div class="form-group">
                <input name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="files[]" multiple>
            </div>
            <div class="form-group">
                @if($tags)
                    <div class="grid-tags">
                        @foreach($tags as $tag)
                            <div class="tag">
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}"><label>{{$tag->title}}</label>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success">
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection