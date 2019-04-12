@extends('layout.app')

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" style="text-align: center">
                {{session('success')}}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
        <h2 style="text-align: center">Parsing</h2>
        <div class="row">
            {{Form::open(['url' => '/manga/parsing', 'class' => 'offset-xl-3 col-xl-6', 'file' => true])}}
            <div class="form-group">
                <select class="form-control" name="site">
                    <option value=".entry-content img">oreno-erohon</option>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" name="name">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="link" value="http://oreno-erohon.com/?p=163353">
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
                <input type="submit" class="btn btn-success" value="Parsing">
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection