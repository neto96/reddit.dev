@extends('layouts.master')

@section('content')
<h1>{{ $post->title }}</h1>
<h5><a href="{{$post->url}}">{{ $post->url }}</a></h5>
    {{ $post->content }}
<h3>Submitted by:</h3>
<h5>{{ $post->user->name }}</h5>
@if(Auth::user()->id == $post->created_by)
<div>
    <a class="btn btn-success" href="{{action('PostsController@edit', $post->id) }}">Edit Post</a>
    <form method="POST" action="{{action('PostsController@destroy', $post->id) }}">
        <input type="submit" class="btn btn-danger" value="Delete">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
    </form>
</div>
@endif
<a href="{{ URL::previous() }}"><--Go Back</a>
@stop