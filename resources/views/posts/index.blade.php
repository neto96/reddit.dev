@extends('layouts.master')

@section('content')
<table class="table table-condensed">
    <tr>
        <th><h3>Title</h3></th>
        <th><h3>URL</h3></th>
        <th><h3>Description</h3></th>
        <th><h3>Created:</h3></th>
    </tr>
    @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td><a href="{{$post->url}}">{{ $post->url }}</a></td>
            <td>{{ $post->content }}</td>
            <td><strong>By:</strong>{{ $post->created_by }}<br><strong>On:</strong> {{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}</td>
        </tr>
    @endforeach
</table>
    {!! $posts->render() !!}
@stop