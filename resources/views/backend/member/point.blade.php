@extends('backend.master')
@section('title', 'Member Point')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>{{ isset($setting) ? 'Update Setting' : 'Create Setting' }}</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Point info</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" action="{{ route('member.point.update') }}" class="form-horizontal form-label-left" method="POST">
                                @csrf
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="member-name">Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="member-name" readonly name="member-name" value="{{ $member->username }}" class="form-control" placeholder="Enter User Name">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="current-point">Current Point <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="current-point" name="current-point" readonly value="{{ $member->point }}" class="form-control" placeholder="Enter Points">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="point">Override Point <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="new-point" name="point" value="{{ old('point') }}" class="form-control" placeholder="Enter Points">
                                    </div>
                                </div>

                                <input type="hidden" name="member_id" value="{{ $member->id }}">

                                <div class="ln_solid"></div>
                                <div class="item form-group">
                                    <div class="col-md-6 col-sm-6 offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <input type="hidden" name="form-sub" value="1">
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
