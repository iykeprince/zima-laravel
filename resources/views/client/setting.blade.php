@extends('layouts.client')
@section('title', 'Account Settings')
@section('content')
    <div class="zima-event-content-right other">
        <div class="form-row">

            <div class="col-12 col-md-12 col-lg-12">

                <div class="zima-event-dashboard-page-header">
                    <i class="fe fe-settings"></i>
                    <h5>Account Settings</h5>
                    <p>Use your social media accounts to make it even easier to log in.</p>
                </div>

                <form action="{{ route('user.setting.password.update') }}" method="post">
                    @csrf
                    <div class="zima-event-client-dashboard-profile-change-password">
                        <div class="zima-event-client-dashboard-profile-change-password-header">
                            <h5>Change Password</h5>
                            <button class="zima-event-profile-change-password-btn">Save Changes</button>
                        </div>


                        <div class="zima-event-client-dashboard-profile-change-password-form">
                            <div class="form-group row">
                                <div class="col-12 col-md-4">
                                    <input name="old" type="password"
                                           class="form-control {{ $errors->has('old') ? ' is-invalid' : '' }}"
                                           placeholder="Current Password *"/>
                                    @error('old')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-4">
                                    <input name="new" type="password"
                                           class="form-control {{ $errors->has('new') ? ' is-invalid' : '' }}"
                                           placeholder="New Password *"/>
                                    @error('new')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                <form method="post">
                    @csrf
                    <div class="zima-event-client-dashboard-profile-change-password mt-4">
                        <div class="zima-event-client-dashboard-profile-change-password-header">
                            <h5>Deactivate Account</h5>
                            <button class="zima-event-profile-change-password-btn">Deactivate Account</button>
                        </div>
                        <div class="zima-event-client-dashboard-profile-change-password-form">
                            <div class="form-group row">
                                <div class="col-12 col-md-12">
                                    <label>Possible reasons</label>
                                    <textarea class="form-control" rows="10" placeholder=""></textarea>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input class="form-control" type="text" placeholder="Password *"/>
                                </div>
                                <div class="col-12 col-md-4">
                                    <input class="form-control" type="text" placeholder="Confirm Password *"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
