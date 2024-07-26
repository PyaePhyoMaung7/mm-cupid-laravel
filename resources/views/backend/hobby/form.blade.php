@extends('backend.master')
@section('title', isset($hobby) ? 'Hobby Update' : 'Hobby Create')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="#" onclick="history.back()"><button class="btn btn-dark" type="button"><i class="fa fa-arrow-left" style="font-size: 20px;"></i></button></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="h4">{{ isset($hobby) ? 'Update Hobby' : 'Create Hobby' }}</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            @if (isset($hobby))
                                <form id="demo-form2" action="{{ route('hobby.update') }}" class="form-horizontal form-label-left"
                                    method="POST">
                                <input type="hidden" name="id" value="{{ $hobby->id }}">
                            @else
                                <form id="demo-form2" action="{{ route('hobby.store') }}" class="form-horizontal form-label-left"
                                    method="POST">
                            @endif

                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="hobby-name">Hobby name
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="hobby-name" name="name" value="{{ old('name', isset($hobby) ? $hobby->name : '' ) }}"
                                            class="form-control" placeholder="Enter Hobby Name">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        @if (!isset($hobby))
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        @endif
                                        <button type="submit" class="btn btn-success">{{ isset($hobby) ? 'Update' : 'Create' }}</button>
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

