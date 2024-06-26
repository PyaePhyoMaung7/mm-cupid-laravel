@extends('backend.master')
@section('title', isset($city) ? 'City Update' : 'City Create')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($city) ? 'Update City' : 'Create City' }}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>City info</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            @if (isset($city))
                                <form id="demo-form2" action="{{ route('city.update') }}" class="form-horizontal form-label-left"
                                    method="POST">
                                <input type="hidden" name="id" value="{{ $city->id }}">
                            @else
                                <form id="demo-form2" action="{{ route('city.store') }}" class="form-horizontal form-label-left"
                                    method="POST">
                            @endif

                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="cityname">City name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="cityname" name="name" value="{{ old('name', isset($city) ? $city->name : '' ) }}"
                                            class="form-control" placeholder="Enter City Name">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        @if (!isset($city))
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        @endif
                                        <button type="submit" class="btn btn-success">{{ isset($city) ? 'Update' : 'Create' }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /page content -->
@endsection

@section('javascript')
    @if ($errors->has('name'))
    <script>
        new PNotify({
            title: 'Oh No!',
            text: "{{ $errors->first('name') }}",
            type: 'error',
            styling: 'bootstrap3'
        });
    </script>
    @endif
@endsection

