<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="description" content="Description goes here"/>
    <meta charset="utf-8"/>
    <title>@yield('title') - Zima.com.ng -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Webstack Nigeria"/>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/assets/css/fontawesome-all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/assets/css/owl.carousel.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/assets/css/styles.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/assets/css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/assets/css/toastr.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/assets/lib/intlTelInput/css/intlTelInput.css') }}"/>

    <link href="{{ asset('static/assets/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('static/assets/libs/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('static/assets/libs/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('static/assets/libs/datatables/select.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>


    <!-- include summernote css/js -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/classic/ckeditor.js"></script>


    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{ asset('static/assets/iconfonts/feather/feather.css') }}">

    <!-- Google Web fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>

<body>
