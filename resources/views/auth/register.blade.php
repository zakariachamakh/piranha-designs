@extends('layouts.app')

@section('content')
    <div class="container">
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
            <title>Register</title>

            <!-- Bootstrap CSS -->
            <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

            <!-- App CSS -->
            <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css"/>

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
                                <h4 class="text-muted text-uppercase m-b-0 m-t-0">Register</h4>
                            </div>
                        </div>

                        <!-- Laravel form for registration -->
                        <form class="m-t-20" method="POST" action="{{ route('register') }}">
                            @csrf <!-- Laravel CSRF protection -->

                            <!-- Name field -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" id="name" name="name"
                                           class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email field -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="email" id="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="Email Address" value="{{ old('email') }}" required
                                           autocomplete="email">
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
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="Password" required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password field -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="password" id="password-confirm" name="password_confirmation"
                                           class="form-control" placeholder="Confirm Password" required
                                           autocomplete="new-password">
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="form-group text-center row m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block waves-effect waves-light"
                                            type="submit">{{ __('Register') }}</button>
                                </div>
                            </div>

                            <!-- Already have an account link -->
                            <div class="form-group row m-t-10">
                                <div class="col-12 text-center">
                                    <a href="{{ route('login') }}" class="text-muted">Already have an account? Login</a>
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

    </div>
@endsection
