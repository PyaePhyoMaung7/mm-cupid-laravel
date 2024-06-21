@extends('backend.master')
@section('title', isset($user) ? 'User Update' : 'User Create')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($user) ? 'Update User' : 'Create User' }}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>User info</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            @if (isset($user))
                                <form id="demo-form2" action="{{ route('user.update') }}" class="form-horizontal form-label-left"
                                    method="POST">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                            @else
                                <form id="demo-form2" action="{{ route('user.store') }}" class="form-horizontal form-label-left"
                                    method="POST">
                            @endif

                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username
                                        <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="username" name="username" value="{{ old('username', isset($user) ? $user->username : '' ) }}"
                                            class="form-control" placeholder="Enter User Name">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="role">Role <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <select id="user-role" name="role" class="form-control">
                                            <option value="" >Choose User Role</option>
                                            <option value="{{ getUserRole('admin') }}"
                                            {{ (old('role') == getUserRole('admin')) ? 'selected' : '' }}>Admin</option>
                                            <option value="{{ getUserRole('editor') }}"
                                            {{ (old('role') == getUserRole('editor')) ? 'selected' : '' }}>Editor</option>
                                            <option value="{{ getUserRole('customer_service') }}"
                                            {{ (old('role') == getUserRole('customer_service')) ? 'selected' : '' }}>Customer Service</option>
                                        </select>
                                    </div>
                                </div>

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
                                        <button type="submit" class="btn btn-success">{{ isset($user) ? 'Update' : 'Create' }}</button>
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

