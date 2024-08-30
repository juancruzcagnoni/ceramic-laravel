@extends('layout')

@section('content')

<div class="log-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <p class="log-card-header">Log In</p>

                <div class="card-body">
                    <form method="POST" action="/log" class="align-items-center">
                        @csrf

                        <div class="log-form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        </div>

                        <div class="log-form-group mb-5">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <p>You do not have an account? <a href="/register">Sign up here</a></p>


                        <div class="log-form-group">
                            <button type="submit" class="login-button">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection