@extends('layouts.master')

@section('content')
    <h1>Create a new post</h1>
    <div class="container">
        <div class="row">
            <form method="POST" class="form-horizontal" action="{{ action('PostsController@store') }}">
            {!! csrf_field() !!}
                <div class="row form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        @include ('partials.errors', ['field' => 'title'])
                    </div>
                <div class="col-sm-6"></div>

                </div>
                <div class="row form-group">
                    <label class="col-md-2 control-label">URL</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="url" value="http://{{ old('url') }}">
                        @include ('partials.errors', ['field' => 'url'])
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 control-label">Content</label>
                    <div class="col-md-4">
                        <textarea type="text" class="form-control" name="content" rows="5" cols="10">{{ old('content') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="row form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@stop


