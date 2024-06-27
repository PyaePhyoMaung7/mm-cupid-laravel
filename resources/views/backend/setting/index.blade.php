@extends('backend.master')
@section('title', 'Setting')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Setting</h3>
                </div>
            </div>

            <div class="row" style="display: block;">

                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content position-relative">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings text-center">
                                            <th>
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Point</th>
                                            <th class="column-title">Company Name</th>
                                            <th class="column-title">Company Logo</th>
                                            <th class="column-title">Company Email</th>
                                            <th class="column-title">Company Phone</th>
                                            <th class="column-title">Company Address</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                        class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr class="even pointer text-center">
                                            <td class="a-center align-middle">
                                                <input type="checkbox" class="flat" name="table_records">
                                            </td>
                                            <td class="align-middle">{{ $setting->point }}</td>
                                            <td class="align-middle">{{ $setting->company_name }}</td>
                                            <td class="align-middle"><div class="mx-auto" style="width: 80px;"><img class="w-100" src="{{ url('assets/default_images/'. $setting->company_logo) }}"></div></td>
                                            <td class="align-middle">{{ $setting->company_email }}</td>
                                            <td class="align-middle">{{ $setting->company_phone }}</td>
                                            <td class="align-middle">{{ $setting->company_address }}</td>

                                            <td class="align-middle">
                                                <a href="{{ url('admin-backend/setting/edit') }}"><button
                                                        type="button" class="btn btn-success btn-sm"><i
                                                            class="fa fa-pencil"></i>
                                                        Edit</button></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
