<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

 <head>
        <meta charset="utf-8" />
        <title>@yield('page-title') </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <link rel="shortcut icon" href=" {{ asset('images/mefie.ico') }} ">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href=" {{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
        <!-- Slider -->
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }} "/>
        <link rel="stylesheet" href=" {{ asset('css/owl.theme.default.min.css') }}"/>
        <!-- Main Css -->
        <link href="{{ asset('css/style.css') }} " rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="{{ asset('css/colors/default.css') }}" rel="stylesheet" id="color-opt">

        @section('style-section')

        @show

    </head>

    <body>
        <!-- Loader -->
        <!-- <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div> -->
        <!-- Loader -->

     @yield('page-content-section')
