@extends('errors.layouts.error')
@section('title', 'Access Denied')
@section('content')
    <div class="container">
        <img src="{{ url('assets/default_images/403_error.jpg') }}" />

        <h1>
        <span>403</span> <br />
        Access Denied
        </h1>
        <p>You are not authorized to access this page.</p>
        <a href="javascript:history.back()" class="btn btn-primary rounded-pill"><i class="fa fa-arrow-left"></i> Go back</a>
    </div>
@endsection
