@extends('layouts.master')

@section('content')
<div class="center-block">
    <h1>{{ $post->title }}</h1>
    <h5><a href="{{$post->url}}">{{ $post->url }}</a></h5>
    {{ $post->content }}
    <h3>Submitted by:</h3>
    <h5>{{ $post->user->name }}</h5>
</div>
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
<div class="votes">
<button type="button" class="btn btn-success {{ (!is_null($post->userVote(Auth::user())) && $post->userVote(Auth::user())->vote) ? 'active' : '' }}" aria-label="Left Align" id="vote">
    <span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span>Upvote
</button>
<div class="voteCounter center-block">
    <h4> {{ $post->voteScore() }}</h4>
</div>
<button type="button" class="btn btn-danger {{ (!is_null($post->userVote(Auth::user())) && !$post->userVote(Auth::user())->vote) ? 'active' : '' }}" id="vote">
<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>Downvote
</button>
</div>
<br>
<a href="{{ URL::previous() }}"><--Go Back</a>
@stop

<script>
$



function doAjax (url, method, data, callback) {
    $.ajax(url, {
        type: method,
        data: data
    }).done(callback);
}
</script>