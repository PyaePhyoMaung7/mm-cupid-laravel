@extends('backend.master')
@section('title', 'Member List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Member List</h3>
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
                                            <th class="column-title">Id</th>
                                            <th class="column-title">Username</th>
                                            <th class="column-title">Email</th>
                                            <th class="column-title">Phone</th>
                                            <th class="column-title">Gender</th>
                                            <th class="column-title">Birthday</th>
                                            <th class="column-title">Photo</th>
                                            <th class="column-title">City</th>
                                            <th class="column-title">Status</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                        class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($members) > 0)
                                            @foreach ($members as $member)
                                                <tr class="even pointer text-center">
                                                    <td class="a-center align-middle">
                                                        <input type="checkbox" class="flat" name="table_records">
                                                    </td>
                                                    <td class="align-middle">{{ $member->id }}</td>
                                                    <td class="align-middle">{{ $member->username }}</td>
                                                    <td class="align-middle">{{ getFifteenChars($member->email) }}</td>
                                                    <td class="align-middle">{{ $member->phone }}</td>
                                                    <td class="align-middle">{{ $member->gender }}</td>
                                                    <td class="align-middle">{{ $member->date_of_birth }}</td>
                                                    <td class="align-middle col-1">{{ 'hello' }}</td>
                                                    <td class="align-middle">{{ $member->city_id }}</td>
                                                    <td class="align-middle">{{ $member->status }}</td>
                                                    <td class="align-middle">
                                                        <a href=""><button type="button"
                                                                class="btn btn-success shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                    class="fa fa-check"></i>
                                                                <span>Confirm</span></button></a>

                                                        <a href=""><button type="button"
                                                                class="btn btn-dark shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                    class="fa fa-eye"></i> <span>View</span></button></a>
                                                        <a href="{{ url('member/point/' . $member->point) }}"><button type="button"
                                                                class="btn btn-primary shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                    class="fa fa-diamond"></i>
                                                                <span>Point</span></button></a>

                                                        <a href="javascript:void(0)"
                                                            onclick="confirmRelease({{ url('member/change/status?id=' . $member->id . '&status=2') }})"><button
                                                                type="button"
                                                                class="btn btn-white text-danger shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                    class="fa fa-unlock"></i> <span>Release</span>
                                                            </button></a>

                                                        <a href="javascript:void(0)"
                                                            onclick="confirmRelease({{ url('member/change/status?id=' . $member->id . '&status=5') }})"><button
                                                                type="button"
                                                                class="btn btn-danger py-0 d-flex shadow-sm justify-content-between align-items-center btn-sm w-100"><i
                                                                    class="fa fa-ban"></i> <span>Ban</span> </button></a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h3>There is no member

                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 float-right">
                                {{ $members->onEachSide(2)->links() }}
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
