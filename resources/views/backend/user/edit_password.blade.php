@extends('backend.master')
@section('title', 'User Password Update')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Update Password</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>User password</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                                <form id="demo-form2" action="{{ route('user.password.update') }}" class="form-horizontal form-label-left"
                                    method="POST">
                                <input type="hidden" name="id" value="{{ $id }}">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Password <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label for="confirm-password" class="col-form-label col-md-3 col-sm-3 label-align">Confirm Password <span class="required">*</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input id="confirm-password" class="form-control" type="password" name="confirm-password" placeholder="Enter Confirm Password">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Update</button>
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
    <script>
        function showErrorMessage (error) {
            new PNotify({
            title: 'Oh No!',
            text: error,
            type: 'error',
            styling: 'bootstrap3'
        });
        }

        document.addEventListener('DOMContentLoaded', function () {
            @foreach ($errors->all() as $error)
                showErrorMessage("{{ $error }}");
            @endforeach
        });
    </script>

@endsection

