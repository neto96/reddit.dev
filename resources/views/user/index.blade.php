@extends('layouts.master')

@section('content')
<h1>Account information</h1>
<div class="container">
    <div class="row">
        <p>
            <h3>Name</h3>
            <h5>{{ Auth::user()->name }}</h5>
        </p>
        <p>
            <h3>Email</h3>
            <h5>{{ Auth::user()->email }}</h5>
        </p>
        <a href=" {{ action('UserController@edit', Auth::user()->id) }}">Edit your information</a><br>
        <a href="{{ action('UserController@editPassword', Auth::user()->id) }}">Change your password</a>
    </div>
</div>
@stop
