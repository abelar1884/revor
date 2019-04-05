@extends('layout.app')

@section('content')
    <div class="container">
        {{Form::open(['url' => '/manga/upload', 'class' => 'class', 'file' => true])}}
        <div class="form-group">
            <input name="name" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="files[]" multiple>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success">
        </div>
        {{Form::close()}}
    </div>
@endsection