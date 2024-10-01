@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App title -->
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- App CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Plugins (Optional, depending on what you need) -->
    <link href="{{ asset('assets/plugins/some-plugin.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Modernizr js -->
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

</head>

<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="account-bg">
        <div class="card-box mb-0">
            <div class="m-t-10 p-20">
                <div class="row">
                    <div class="col-12 text-center">
                        <h4 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h4>
                    </div>
                </div>

                <!-- Laravel form for login -->
                <form class="m-t-20" method="POST" action="{{ route('login') }}">
                    @csrf <!-- Laravel CSRF protection -->

                    <!-- Email field -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="email" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Password field -->
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="password" id="password" name="password"
                                   class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                   required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="checkbox checkbox-custom">
                                <input type="checkbox" id="checkbox-signup"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-signup">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <div class="form-group text-center row m-t-10">
                        <div class="col-12">
                            <button class="btn btn-success btn-block waves-effect waves-light"
                                    type="submit">{{ __('Log In') }}</button>
                        </div>
                    </div>

                    <!-- Forgot Password link -->
                    <div class="form-group row m-t-10">
                        <div class="col-12 text-center">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-muted">{{ __('Forgot Your Password?') }}</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/detect.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/js/jquery.app.js') }}"></script>

</body>
</html>

@endsection
