@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-condensed">
                {{--<tr>--}}
                    {{--<th><h3>Title</h3></th>--}}
                    {{--<th><h3>URL</h3></th>--}}
                    {{--<th><h3>Description</h3></th>--}}
                    {{--<th><h3>Created</h3></th>--}}
                    {{--<th></th>--}}
                {{--</tr>--}}
                @foreach($posts as $post)
                    <div></div>
                    <tr>
                        <td>
                            {{ $post->title }}<br>
                            <a href="{{$post->url}}">{{ $post->url }}</a>
                        </td>
                        <td>{{ $post->content }}</td>
                        <td><strong>By:</strong> {{ $post->user->name}}<br><strong>On:</strong> {{ $post->created_at}}<br> <strong>Updated on:</strong> {{$post->updated_at}}</td>
                        <td><a href="{{action('PostsController@show', $post->id)}}">See Post</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            {!! $posts->render() !!}
        </div>
    </div>
@stop