@include('components.head')

@yield('content')
@include('components.footer')
<!-- Javascripts -->
<script src="{{ asset('static/assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('static/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('static/assets/js/functions.js') }}"></script>
<script src="{{ asset('static/assets/js/toastr.js') }}"></script>
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
        nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        separateDialCode: false,
        utilsScript: "{{ asset('static/assets/lib/intlTelInput/utils.js') }}",
    });
</script>
@include('alert.alert')

</body>

</html>
