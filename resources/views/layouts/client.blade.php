@include('components.head')
<style>
    table.dataTable tbody > tr.selected,
    table.dataTable tbody > tr > .selected {
        background-color: #a4006a;
    }

    table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child::before,
    table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child::before {
        background-color: #a4006a;
        box-shadow: none;
    }

    .page-item.disabled .page-link {
        color: #6c757d;
        pointer-events: none;
        cursor: auto;
        background-color: #f00;
        border-color: #e2e7f1;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #a4006a;
        border-color: #a4006a;
    }

    .pagination-rounded .page-link {
        border-radius: 50px !important;
        margin: 0 3px;
        border: none;

    }

    .page-link {
        position: relative;
        display: block;
        padding: 0;
        line-height: 1.25;
    }

    #selection-datatable_length {
        display: none;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .db-list-status {
        background: #35d8a5;
        padding: 4px 8px;
        font-weight: 600;
        color: #ffffff;
        right: 15px;
        top: 0px;
        font-size: 12px;
        border-radius: 2px;
        border: 0px solid #d3d3d3;
    }

    .db-list-rat {
        background: #f7ed94;
        padding: 4px 8px;
        font-weight: 600;
        color: #000;
        right: 15px;
        top: 0px;
        font-size: 12px;
        border-radius: 2px;
        text-align: center;
    }

    .db-list-edit {
        padding: 4px 8px;
        font-weight: 600;
        color: #a4006a;
        right: 15px;
        top: 0px;
        font-size: 12px;
        border-radius: 2px;
        border: 1px solid #a4006a;
    }

    .form-control.form-control-sm {
        height: 100%;
    }

    .zima-event-client-dashboard-header-text i {
        color: #a4006a;
    }

    .zima-event-client-dashboard-header-text h2 a {
        color: #a4006a;
    }

    .form-text {
        margin-top: 5px;
        font-size: 10px;
        font-weight: 400;
        color: #91969a;
        display: block;
    }

    .custom-file,
    .custom-file-input,
    .custom-file-label {
        height: 30px;
    }

    .custom-file {
        position: relative;
        display: inline-block;
        width: 100%;
        margin-bottom: 0;
        margin-top: -32px;
    }

    label.custom-upload {
        display: inline-block;
        padding: 30px 20px;
        border: 2px dotted #cdd4e0;
        cursor: pointer;
        font-size: 10px;
        color: #97a3b9;
        letter-spacing: 0.5px;
        font-weight: 600;
        text-transform: uppercase;
    }

    .zima-toggle-dark.on {
        background-color: #1c273c;
    }

    .zima-toggle.on {
        background-color: #A4006A;
    }

    .zima-toggle {
        width: 60px;
        height: 25px;
        background-color: #b4bdce;
        padding: 2px;
        position: relative;
        overflow: hidden;
    }

    .zima-toggle span::before {
        content: 'Yes';
        left: -28px;
        top: 20% !important;
    }

    .zima-toggle span::after {
        content: 'No';
        right: -23px;
        top: 20% !important;
    }

    .zima-toggle span::before,
    .zima-toggle span::after {
        position: absolute;
        font-size: 10px;
        font-weight: 500;
        letter-spacing: .5px;
        text-transform: uppercase;
        color: #fff;
        top: 2px;
        line-height: 1.38;
    }

    .zima-toggle.on span {
        left: 32px;
    }

    .zima-toggle span {
        position: absolute;
        top: 3px;
        bottom: 3px;
        left: 3px;
        display: block;
        width: 25px;
        background-color: #fff;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
    }
</style>
<section id="zima-event-client-dashboard" class="zima-event-client-dashboard">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Start Dashboard Header --}}
                <div class="zima-event-client-header-dashboard">
                    <div class="zima-event-client-dashboard-header-logo">
                        <a href="">
                            <img class="zima-header-logo img-responsive"
                                 src="{{ asset('static/assets/img/zima-logo-event-default.png') }}"
                                 alt="Zima Event Logo"/>
                        </a>
                    </div>
                    <div class="zima-event-client-dashboard-header-text">
                        <h2><a href='{{ route('user.create.event') }}'><i class="fe fe-plus-circle"></i>Create Event</a>
                        </h2>
                    </div>
                </div>
                {{-- End Dashboard Header --}}
                <div class="zima-event-content-container-wrapper">
                    <div class="zima-event-content-container">
                        @include('components.client-sidebar')

                        @yield('content')


                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- Javascripts -->
<script src="{{ asset('static/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('static/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('static/assets/js/functions.js') }}"></script>
<script src="{{ asset('static/assets/js/toastr.js') }}"></script>
<script src="{{ asset('static/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('static/assets/js/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
{{-- <script src="{{ asset('static/assets/js/maskedinput/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('static/assets/js/plugins.js') }}"></script> --}}


<!-- datatable js -->
<script src="{{ asset('static/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('static/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/buttons.print.min.js') }}"></script>

<script src="{{ asset('static/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('static/assets/libs/datatables/dataTables.select.min.js') }}"></script>

<!-- Datatables init -->
<script src="{{ asset('static/assets/js/datatables.init.js') }}"></script>


<script src="{{ asset('static/assets/lib/intlTelInput/js/intlTelInput.js') }}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        formatOnDisplay: true,
        geoIpLookup: function (callback) {
            $.get("http://ipinfo.io", function () {
            }, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        nationalMode: true,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        separateDialCode: false,
        utilsScript: "{{ asset('static/assets/lib/intlTelInput/js/utils.js') }}",
    });
</script>

<script>
    function loadPreview(input, id) {
        id = id || '#preview_img';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(400)
                    .height(250);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script type="text/javascript">
    /** Editor Script **/
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

@include('alert.alert')
</body>

</html>
