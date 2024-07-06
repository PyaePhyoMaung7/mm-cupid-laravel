@extends('backend.master')
@section('title', 'Member List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Manage member point</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <a href="<?php echo $admin_base_url . 'show_member.php' ; ?>"><button class="btn btn-dark">Back</button></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            <form id="demo-form2" action="<?php $admin_base_url; ?>manage_point.php" class="form-horizontal form-label-left" method="POST">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="member-name">Username <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" id="member-name" readonly name="member-name" value="<?php echo $member_name; ?>" class="form-control" placeholder="Enter User Name">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="existing-point">Existing Point <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="existing-point" name="existing-point" readonly value="<?php echo $existing_point; ?>" class="form-control" placeholder="Enter Points">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="added-point">Add Point <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="number" id="added-point" name="added-point" value="<?php echo $added_point; ?>" class="form-control" placeholder="Enter Points">
                                    </div>
                                </div>

                                <input type="hidden" name="member-id" value="<?php echo $member_id; ?>">

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
    </div>
    <!-- /page content -->
@endsection
@section('javascript')
    <script>
        function confirmDelete(url) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;

                }
            });
        }
    </script>
@endsection
