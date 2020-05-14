@extends('layouts.auth')
@section('title', 'Signup | Zima Events')
@section('content')
    <style>
        .invalid-feedback {
            display: block;
            text-transform: capitalize;
        }
    </style>
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

                        <div class="col-md-8 offset-md-2 zima-auth-social-media-login">
                            <a href="/">Signup with facebook</a>
                        </div>

                        <div class="col-md-8 offset-md-2 zima-auth-login-option">
                            <span class="divider">Or</span>
                        </div>

                        <p class="text-md-center text-lg-center text-sm-center zima-auth-caption">Sign up with your
                            email
                            address.</p>

                        <form method="post" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="website_token_ni" value="1">

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="text" name="first_name"
                                           class="form-control @error('first_name') is-invalid @enderror"
                                           value="{{ old('first_name') }}" placeholder="First Name"/>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name"
                                           class="form-control @error('last_name') is-invalid @enderror"
                                           value="{{ old('last_name') }}" placeholder="Last Name"/>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="Email address"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mt-4">
                                <div class="col-md-12">
                                    <input id="phone" name="phone_number"
                                           class="form-control @error('phone_number') is-invalid @enderror"
                                           value="{{ old('phone_number') }}" placeholder="Phone number"/>
                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <input type="password" name="password" placeholder="Password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           value="{{ old('password') }}"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           value="{{ old('password_confirmation') }}"/>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row zima-auth-register-terms">
                                <div class="col-md-12">
                                    <p class="disclaimer">By clicking on Sign up, you agree to Zima's <a href="">Terms
                                            Of
                                            Use</a>.
                                        To learn more about how Zima collects, uses, shares and protects your personal
                                        data please read Zima's <a href="">Privacy Policy</a>.</p>

                                    <button class="zima-auth-register-btn" type="submit">Sign up</button>

                                    <p class="zima-auth-account-holder">Already have an account?
                                        <a href="{{ route('login') }}">Log in</a>
                                    </p>
                                </div>


                            </div>


                        </form>
                    </div>
                </div>
            </div>
    </section>

@endsection
