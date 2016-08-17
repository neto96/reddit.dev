@extends('layouts.master')

@section('content')
<form method="POST" action="{{ action('PostsController@store') }}">
    {!! csrf_field() !!}
    Title: <input type="text" name="title" value="{{ old('title') }}">
    Content: <input type="text" name="content" value="{{ old('content') }}">
    URL: <input type="text" name="url" value="{{ old('url') }}">
    <input type="submit">
</form>
@stop


