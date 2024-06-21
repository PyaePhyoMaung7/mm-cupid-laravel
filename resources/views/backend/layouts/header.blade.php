<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{ url('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('assets/css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Pnotify -->
    <link href="{{ url('assets/css/pnotify/pnotify.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('assets/css/icheck/green.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ url('assets/css/custom.css?v=20240617') }}" rel="stylesheet">
    <!-- company logo -->
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ url('assets/default_images/' . Session::get('site_logo')) }}">

    <style>
        ::-webkit-scrollbar {
            width: 12px;
            height: 12px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #2A3F54;
            border-radius: 10px;
        }
    </style>
</head>
