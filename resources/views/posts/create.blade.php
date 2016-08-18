@extends('layouts.master')

@section('content')
<div class="form-horizontal has-error">
    <form method="POST" action="{{ action('PostsController@store') }}">
        {!! csrf_field() !!}
        <p>
            Title: <input type="text" name="title" value="{{ old('title') }}">
            @include ('partials.errors', ['field' => 'title'])
        </p>
        <p>
            URL: <input type="text" name="url" value="{{ old('url') }}">
            @include ('partials.errors', ['field' => 'url'])
        </p>
        <p>
            Content: <input type="text" name="content" value="{{ old('content') }}">
        </p>
        <input type="submit">
    </form>
</div>
@stop


