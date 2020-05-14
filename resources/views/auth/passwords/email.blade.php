@extends('layouts.auth')
@section('title', 'Password Reset | Zima Events')
@section('content')
    <div id="zima-events-authentication-wrapper" class="zima-events-authentication-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="zima-events-authentication-logo-wrapper">
                        <a href="">
                            <img class="zima-img-trim"
                                 src="{{ asset('static/assets/img/zima-logo-event-default.png') }}"
                                 alt="Zima Events Logo"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="zima-events-authentication-form-wrapper" class="zima-events-authentication-form-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="zima-events-authentication-form-wrapper">

                        <div class="col-md-8 offset-md-2 zima-auth-social-media-login">
                            <a href="/">Login with facebook</a>
                        </div>

                        <div class="col-md-8 offset-md-2 zima-auth-login-option">
                            <span class="divider">Or</span>
                        </div>

                        <div class='zima-auth-reset-password-wrapper'>
                            <i class="fe fe-info" style="color: #a4006a;"></i>
                            <p class="zima-auth-caption reset-password">
                                Please provide the e-mail address associated with your account.
                                Reset password link will be sent.</p>
                        </div>

                        <form method="post" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input name="email" type="email"
                                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="Email address" value="{{ old('email') }}"/>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row zima-auth-submit mt-4">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="zima-auth-submit-btn">Send Password Reset Link</button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 zima-auth-forgot-password">
                                    <a href="{{ route('login') }}">
                                        Return to login
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
    </section>

@endsection
