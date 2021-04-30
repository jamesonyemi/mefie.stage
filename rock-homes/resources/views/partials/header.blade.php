<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

<head>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Vendors Min CSS -->
<link rel="stylesheet" href=" {{ asset('assets/css/vendors.min.css') }} ">
<!-- Style CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">

<!-- Responsive CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/css/image_preview.css') }} ">
<title>{{ config('app.name') }}</title>
<link rel="shortcut icon"  href="{{asset('favicon.ico') }}">

<!-- DataTables -->
<link href=" {{ asset('custom_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href=" {{ asset('custom_assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href=" {{ asset('custom_assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 

<!-- Bootstrap Css -->
{{-- <link href=" {{ asset('custom_assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
<!-- Icons Css -->
{{-- <link href=" {{ asset('custom_assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" /> --}}
<!-- App Css-->
{{-- <link href=" {{ asset('custom_assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}

<!-- Bootstrap Live Search -->
<link rel="stylesheet" href=" {{ asset('assets/css/bootstrap-live-search.min.css') }} ">

<!-- Bootstrap Live Search -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<link rel="stylesheet" href="{{ asset('assets/plugins/intl-tel-input-master/intlTelInput.css') }}">
<!--intlTelInput css-->

<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp?base_currency=USD" type="text/javascript"></script>

</head>

<style>
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    border-color:rgba(181, 196, 224, 0.966);
    background-color:rgba(212, 219, 233, 0.103);
    margin-bottom: 1.5rem;
}
.bx-sm {
	font-size: 1.2rem !important;
}

.bs-example{
    margin: 0px;
}

.bg-orange-300 {
    background-color: #e97896fa !important;
}

.btn-light {
    display: inline-block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem 1.75rem .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: #fff;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}


@media screen and (min-width: 768px) {
    .modal-dialog {
      width: 700px; /* New width for default modal */
    }
    .modal-sm {
      width: 360px; /* New width for small modal */
    }
}
@media screen and (min-width: 992px) {
    .modal-lg {
      width: 950px; /* New width for large modal */
    }
    
}

@media screen and (max-width: 360px) {
    .hide-app-logo {
        display:inline !important;
    }
    
}

@media screen and (max-width: 360px) {
    .cmb-2 {
    	margin-top: 1rem !important;
    }
    
    .cmt-4 {
    	margin-top: 4rem !important;
    }
    
    .cml-2 {
        margin-left: -1rem !important;
    }
    
    .mt-total-cost {
        margin-top:7rem !important;
        margin-left: -5rem !important;
        width: 100%;
    }
    .---raise-button {
        background: linear-gradient(145deg, #ffffff, #e6e6e6);
        box-shadow:  9px 9px 18px #d1d1d1, -9px -9px 18px #ffffff;
    }
    
    .---raise-button:hover {
        color: #f2682b;
    }
    
    .---raise-button-icons {
        background: linear-gradient(145deg, #ffffff, #e6e6e6);
        box-shadow:  9px 9px 18px #c2c2c2, 
                     -9px -9px 18px #ffffff;
    }
}

</style>

<body >