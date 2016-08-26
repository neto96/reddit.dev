@extends('layouts.master')

@section('content')
    <h1>Edit your account information</h1>
    <div class="container">
        <div class="row">
            <form method="POST" class="form-horizontal" action="{{ action('UserController@updatePassword', $user->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="row form-group">
                    <label class="col-md-2 control-label">Password</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control" name="password" placeholder="Enter a new password">
                        @include ('partials.errors', ['field' => 'password'])
                    </div>
                    <div class="col-md-6"></div>
                    <div class="row form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
