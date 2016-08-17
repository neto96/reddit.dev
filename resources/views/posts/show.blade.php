@extends('layouts.master')

@section('content')
<h1>Title</h1>
    {{ $post->title }}
<h1>URL</h1>
    <a href="{{$post->url}}">{{ $post->url }}</a>
<h1>Description</h1>
    {{ $post->content }}
<h3>Submitted by:</h3>
    {{ $post->created_by }}
@stop