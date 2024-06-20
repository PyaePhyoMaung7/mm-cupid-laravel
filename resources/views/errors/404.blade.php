@extends('errors.layouts.error')
@section('title', 'Page Not Found')
@section('content')
    <div class="container">
        <img src="{{ url('assets/default_images/404_error.jpg') }}" class="rounded" />

        <h1>
        <span>404</span> <br />
        Page Not Found
        </h1>
        <p>The page you are trying to access does not exist.</p>
        <a href="javascript:history.back()" class="btn btn-primary rounded-pill"><i class="fa fa-arrow-left"></i> Go back</a>
    </div>
@endsection
