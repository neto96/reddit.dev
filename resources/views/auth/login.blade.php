@extends ('layouts.master')

@section('content')
    @if(!Auth::check())
        <h3>You need to log in to do that</h3>
    @endif
    <form method="POST" action="{{ action('Auth\AuthController@postLogin') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email">
            @include ('partials.errors', ['field' => 'email'])
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            @include ('partials.errors', ['field' => 'password'])
        </div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
@stop