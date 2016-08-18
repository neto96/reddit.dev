@extends('layouts.master')

@section('content')
<table class="table table-condensed">
    <tr>
        <th><h1>Title</h1></th>
        <th><h1>URL</h1></th>
        <th><h1>Description</h1></th>
        <th><h3>Submitted by:</h3></th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td><a href="{{$post->url}}">{{ $post->url }}</a></td>
            <td>{{ $post->content }}</td>
            <td>{{ $post->created_by }}</td>
        </tr>
    @endforeach
</table>
    {!! $posts->render() !!}
@stop