@extends('layouts.auth')
@section('title', 'Login Authentication | Zima Events')
@section('content')
    <div id="zima-events-authentication-wrapper" class="zima-events-authentication-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="zima-events-authentication-logo-wrapper">
                        <a href="{{ route('welcome.page') }}">
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
                        <p class="text-md-center text-lg-center text-sm-center zima-auth-caption">To continue, log in to
                            Zima Events.</p>
                        <div class="col-md-8 offset-md-2 zima-auth-social-media-login">
                            <a href="/">Login with facebook</a>
                        </div>

                        <div class="col-md-8 offset-md-2 zima-auth-login-option">
                            <span class="divider">Or</span>
                        </div>

                        <form method="post" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input name='email' id="email" type="email"
                                           class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           placeholder="Email address"/>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <input name="password" type="password"
                                           class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           placeholder="Password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row zima-auth-submit">
                                <div class="col-md-7">
                                    <div class="form-check">
                                        <input type="checkbox" name="rememberMe"
                                               class="form-check-input  {{ old('rememberMe') ? 'checked' : '' }}"
                                               id="rememberMe" checked/>
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="zima-auth-submit-btn">Submit</button>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 zima-auth-forgot-password">
                                    <a href="{{ route('password.request') }}">
                                        Forgot your password?
                                    </a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 zima-auth-register-option">
                                    <p>Don't have an account?</p>

                                    <div class="zima-auth-register-wrapper">
                                        <a href="{{ route('register') }}">Sign up for Zima</a>
                                    </div>
                                    <p class="disclaimer">If you click "Log in with Facebook" and are not a zima user,
                                        you will be registered and you agree to zima's
                                        <a href="">Terms Of Services</a> and
                                        <a href="">Privacy
                                            Policy</a>.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

@endsection
