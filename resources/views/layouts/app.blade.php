<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/barra/pace2.css') }}">

    <link  rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link  rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>
    <style>
      select{
        color: #333 !important;
      }
      thead{
        text-align:center;
        background: #cecece;
      }
      .w-5{
        width: 40px !important;
      }

      #sinDeudas h2{
        color: green;
        font-weight: 600;
        background-color: #f9f9f9;
        padding: 15px 5px;
      }
      .sidebar .nav .nav-item.active > .nav-link i, .sidebar .nav .nav-item.active > .nav-link .menu-title, .sidebar .nav .nav-item.active > .nav-link .menu-arrow{
        color: #FF9900 !important;
      }
      .btn-primary {
        color: #fff;
        background-color: #ffb716;
        border-color: #ffb716;
      }
      .btn-primary:hover{
        background-color: #FF9900;
        border-color: #FF9900;
      }
      .nav-link:hover{
        color: #FF9900 !important;
        font-weight: 600;
      }
      .text-primary{
        color: #FF9900 !important;
      }
      .mdi-menu{
        color: #fff !important;
      }
      label{
        max-width: 100% !important;
      }
    </style>
</head>
<body>
    <div id="app">

        @include('layouts.menuHorizontal')
        
        @include('layouts.menuVertical')


        <div class="main-panel">
            <div class="content-wrapper">
              
                  @yield('content')

            </div>
          </div>


    </div>


    @include('layouts.layoutJS')
    
    @yield('script')
    
</body>
</html>
