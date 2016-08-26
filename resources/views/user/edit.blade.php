@extends('layouts.master')

@section('content')
    <h1>Edit your account information</h1>
    <div class="container">
        <div class="row">
            <form method="POST" class="form-horizontal" action="{{ action('UserController@update', $user->id) }}">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="row form-group">
                    <label class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        @include ('partials.errors', ['field' => 'name'])
                    </div>
                    <div class="col-sm-6"></div>

                </div>
                <div class="row form-group">
                    <label class="col-md-2 control-label">Email</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                        @include ('partials.errors', ['field' => 'email'])
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="col-md-6"></div>
                <div class="row form-group">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@stop
