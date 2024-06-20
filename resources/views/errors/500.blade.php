@extends('errors.layouts.error')
@section('title', 'Internal server error')
@section('content')
    <div class="container">
        <img src="{{ url('assets/default_images/500_error.jpg') }}" class="rounded" />

        <h1>
        <span>500</span> <br />
        Internal server error
        </h1>
        <p>We are currently trying to fix the problem.</p>
        <a href="javascript:history.back()" class="btn btn-primary rounded-pill"><i class="fa fa-arrow-left"></i> Go back</a>
    </div>
@endsection
