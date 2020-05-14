@extends('layouts.client')
@section('title', 'Create Account')
@section('content')
    <style>
        img.img-trim {
            height: 125px;
            width: 100%;
        }
    </style>
    <div class="zima-event-content-right other">
        <div class="form-row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="zima-event-create-event-content">
                    <div class="zima-event-client-dashboard-profile-change-password mt-0">
                        <form role="form" enctype="multipart/form-data"
                              action="{{ route('user.create.event.step.one') }}"
                              method="post">
                            @csrf
                            <div class="zima-event-client-dashboard-profile-change-password-header">
                                <h5>Event Information</h5>
                                <button class="zima-event-profile-change-password-btn">Continue</button>
                            </div>
                            <div class="zima-event-client-dashboard-profile-change-password-form">
                                <div class="form-group row">
                                    <div class="col-12 col-md-12">

                                        <input name="event_name"
                                               class="form-control {{ $errors->has('event_name') ? ' is-invalid' : '' }}"
                                               type="text" placeholder="Event Name or Title *"
                                               value="{{ old('event_name') }}"/>
                                        @error('event_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-12 col-md-6">
                                        <input name="event_start_date"
                                               class="form-control {{ $errors->has('event_start_date') ? ' is-invalid' : '' }}"
                                               type="date" placeholder="Start Date *"
                                               value="{{ old('event_start_date') }}"/>
                                        <span class="form-text">Format: DD-MM-YYYY</span>
                                        @error('event_start_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input name="event_end_date"
                                               class="form-control {{ $errors->has('event_end_date') ? ' is-invalid' : '' }}"
                                               type="date" placeholder="End Date *"
                                               value="{{ old('event_end_date') }}"/>
                                        <span class="form-text">Format: DD-MM-YYYY</span>
                                        @error('event_end_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-12 col-md-6">
                                        <input name="event_start_time"
                                               class="form-control {{ $errors->has('event_start_time') ? ' is-invalid' : '' }}"
                                               type="time" placeholder="Start Time *"
                                               value="{{ old('event_start_time') }}"/>
                                        <span class="form-text">Format: 12-00-AM</span>
                                        @error('event_start_time')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input name="event_end_time"
                                               class="form-control {{ $errors->has('event_end_time') ? ' is-invalid' : '' }}"
                                               type="time" placeholder="End Time *"
                                               value="{{ old('event_end_time') }}"/>
                                        <span class="form-text">Format: 12-00-AM</span>
                                        @error('event_end_time')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-12 col-md-12">
                                    <textarea id="editor"
                                              class="form-control {{ $errors->has('event_description') ? ' is-invalid' : '' }}"
                                              rows="10" placeholder="Hello"
                                              name='event_description'>{{ old('event_description') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            {{-- <input type="file" name="event_cover_image"
                                                class="form-control {{ $errors->has('event_cover_image') ? ' is-invalid' : '' }}"
                                            accept="image/*">
                                            @error('event_cover_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror --}}

                                            <div class="custom-file">
                                                <input type="file" name="event_cover_image"
                                                       class="custom-file-input {{ $errors->has('event_cover_image') ? ' is-invalid' : '' }}"
                                                       accept="image/*" onchange="loadPreview(this);" id='customFile'>
                                                @error('event_cover_image')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                                <label class="custom-upload" for="customFile">
                                                    <span>Add Event Banner Image</span>
                                                    <p>(1440px X 400px not larger than 2MB, Please avoid including text
                                                        on
                                                        image)</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <img class="img-trim" id="preview_img"
                                             src="{{ asset('static/assets/img/placeholder.png') }}"
                                             alt="Event Cover Placeholder"/>
                                        {{-- <div class="zima-events-image-upload-preview" id="output">
                                            <i class="fe fe-image"></i>
                                            <span>Image Preview here</span>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-12 col-md-6">
                                        <input name="event_venue"
                                               class="form-control {{ $errors->has('event_venue') ? ' is-invalid' : '' }}"
                                               type="text" placeholder="Event Venue *"
                                               value="{{ old('event_venue') }}"/>
                                        @error('event_venue')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <input name="organiser_name"
                                               class="form-control {{ $errors->has('organiser_name') ? ' is-invalid' : '' }}"
                                               type="text" placeholder="Organiser's Name *"
                                               value="{{ old('organiser_name') }}"/>
                                        @error('organiser_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="form-group row mt-2">
                                    <div class="col-12 col-md-6">
                                        <input name="organiser_email"
                                               class="form-control {{ $errors->has('organiser_email') ? ' is-invalid' : '' }}"
                                               type="text" placeholder="Organiser's Email  *"
                                               value="{{ old('organiser_email') }}"/>
                                        @error('organiser_email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <input id="phone" name="organiser_phone_number" type="organiser_phone"
                                               class="form-control {{ $errors->has('organiser_phone_number') ? ' is-invalid' : '' }}"
                                               placeholder="Phone number" value="{{ old('organiser_phone_number') }}"/>
                                        @error('organiser_phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                $("#dp-example-default").datetimepicker();
            });
        </script>
@endsection
