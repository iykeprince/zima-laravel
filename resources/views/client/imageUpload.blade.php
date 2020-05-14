@extends('layouts.client')
@section('title', 'Image Uploads')
@section('content')
    <div class="zima-event-content-right">
        <div class="form-row">
            <div class="col-12 col-lg-12 col-md-12">
                <div class="zima-event-create-event-content">
                    <div class="zima-event-client-dashboard-profile-change-password">
                        <form action="" method="post">
                            @csrf
                            <div class="zima-event-client-dashboard-profile-change-password-header">
                                <h5>Image Uploads</h5>
                                <button class="zima-event-profile-change-password-btn">Continue</button>
                            </div>
                            <div class="zima-event-client-dashboard-profile-change-password-form">


                                <div class="form-group row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                       name="photo[]"
                                                       accept="image/*" onchange="preview_images();">
                                                <label class="custom-upload" for="customFile">
                                                    <span>Add Event Banner Image</span>
                                                    <p>(1440px X 400px not larger than 5mb, Please avoid including text
                                                        on
                                                        image)</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-md-12 mt-4">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                       name="photo[]"
                                                       accept="image/*" onchange="preview_images();">
                                                <label class="custom-upload" for="customFile">
                                                    <span>Add Mobile Image</span>
                                                    <p>(584px X 960px not larger than 5mb, Please avoid including text
                                                        on
                                                        image)</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 col-md-12 mt-4">
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                       name="photo[]"
                                                       accept="image/*" onchange="preview_images();">
                                                <label class="custom-upload" for="customFile">
                                                    <span>Event Cover image</span>
                                                    <p>(292px X 230px not larger than 2mb, Please avoid including text
                                                        on
                                                        image)</p>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection
