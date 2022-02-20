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
    <link rel="stylesheet" href="{{ asset('css/cargando.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>
    <style>
      thead{
        text-align:center;
        background: #cecece;
      }
      .w-5{
        width: 40px !important;
      }
    </style>
</head>
<body>
    <div id="app">

        @include('layouts.menuHorizontal')
        
        @include('layouts.menuVertical')


        <div class="main-panel">
            <div class="content-wrapper">
              <div class="row justify-content-center">
                     
                  @yield('content')

              </div>
            </div>
          </div>


    </div>


    @include('layouts.layoutJS')

</body>
</html>
