<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.shared.title-meta', ['title' => "Log In"])

        <link rel="stylesheet" href="{{ asset('assets/fonts/inter/inter.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/icons/phosphor/styles.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ltr/all.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

        <script src="{{ asset('assets/js/configurator.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>
    </head>

    <body>

        <div class="page-content">
            <div class="content-wrapper">
                <div class="content-inner">
                    <div class="content d-flex justify-content-center align-items-center">


                        <form class="login-form" action="{{ route('login') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <div class="d-inline-flex align-items-center justify-content-center mb-4 mt-2">
                                            {{-- <img src="{{ asset('assets/images/logo.png') }}" class="h-48px" alt="fléx"> --}}
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control" placeholder="exmple@cits.co.tz" required autofocus autocomplete="username">
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-user-circle text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="form-control-feedback form-control-feedback-start">
                                            <input type="password" class="form-control" placeholder="•••••••••••" id="password" type="password" name="password" required autocomplete="current-password">
                                            <div class="form-control-feedback-icon">
                                                <i class="ph-lock text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3">
                                        {{-- <label class="form-check">
                                            <input type="checkbox" name="remember" class="form-check-input" checked>
                                            <span class="form-check-label">Remember</span>
                                        </label> --}}

                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="ms-auto">Forgot password?</a>
                                        @endif
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </body>

</html>

