@extends('layouts.master')

@section('content')
    <h1>Your Posts</h1>
    <div class="container">
        <div class="row">
            <table class="table table-condensed">
                <tr>
                    <th><h3>Title</h3></th>
                    <th><h3>URL</h3></th>
                    <th><h3>Description</h3></th>
                    <th><h3>Created:</h3></th>
                    <th></th>
                </tr>
                @foreach($posts as $post)
                    <div>
                        @if(empty($posts))
                            <h3>You have no posts.</h3>
                        @endif
                    </div>
                    <tr>
                        <td>
                            {{ $post->title }}<br>
                        </td>
                        <td><a href="{{$post->url}}">{{ $post->url }}</a></td>
                        <td>{{ $post->content }}</td>
                        <td><strong>By:</strong> {{ $post->user->name}}<br><strong>On:</strong> {{ $post->created_at}}<br> <strong>Updated on:</strong> {{$post->updated_at}}</td>
                        <td><a href="{{action('PostsController@show', $post->id)}}">See Post</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop