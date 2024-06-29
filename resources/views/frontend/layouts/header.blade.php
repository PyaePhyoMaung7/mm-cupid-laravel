<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <title>@yield('title')</title>
    <link
      href="{{ url('assets/front/css/bootstrap.min.css') }}"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="{{ url('assets/front/css/bootstrap-icons.min.css') }}"
    />
    <link rel="stylesheet" href="{{ url('assets/front/css/custom.css?v=20240628') }}">
    <link rel="stylesheet" href="{{ url('assets/front/css/jquery-ui.css') }}">
    <script src="{{ url('assets/front/js/jquery-3.6.0.js') }}"></script>
    <script src="{{ url('assets/front/js/jquery-ui.js') }}"></script>
    <script src="{{ url('assets/front/js/angular.min.js') }}"></script>
    <script src="{{ url('assets/front/js/error_messages.js') }}"></script>
    <script src="{{ url('assets/front/js/success_messages.js') }}"></script>

    <link rel="stylesheet" href="{{ url('assets/css/font-awesome/font-awesome.min.css') }}">
    <!-- Pnotify -->
    <link href="{{ url('assets/css/pnotify/pnotify.css') }}" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('storage/images/' . $setting->company_logo) }}">
    <style>
      .btn-outline-secondary {
        --bs-btn-hover-bg: #6c757d32;
      }
      .pnotify-center {
        right: calc(50% - 200px) !important;
      }
    </style>
    <script>
      const base_url = '{{ url('/') }}';
      const gender_type = { 0 : 'Man' , 1 : 'Woman' , 2 : 'Everyone'};
    </script>

  </head>
  <body style="background-color: #e9d8ff">
  <div class="loading" style="display: none; z-index: 1060;">Loading&#8230;</div>
