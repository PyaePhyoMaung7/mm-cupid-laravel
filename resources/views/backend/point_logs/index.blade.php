@extends('backend.master')
@section('title', 'Point Logs')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Point Logs</h3>
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
                                            <th class="column-title">Member Id</th>
                                            <th class="column-title">Member</th>
                                            <th class="column-title">User Id</th>
                                            <th class="column-title">User</th>
                                            <th class="column-title">Point</th>
                                            <th class="column-title">Created At</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($point_logs as $point_log)
                                            <tr class="even pointer text-center">
                                                <td class="col-2 align-middle">{{ $point_log->member_id }}</td>
                                                <td class="col-2 align-middle">{{ $point_log->getMemberByPointLog->username }}</td>
                                                <td class="col-2 align-middle">{{ $point_log->user_id }}</td>
                                                <td class="col-2 align-middle">{{ $point_log->getUserByPointLog->username }}</td>
                                                <td class="col-2 align-middle">{{ $point_log->point }}</td>
                                                <td class="col-2 align-middle">{{ $point_log->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(count($point_logs) <= 0)
                                    <h3 class="text-center mt-5">There is no point log</div>
                                @endif
                                <div class="mt-3 position-absolute" style="bottom: 0; right: 0;">
                                    {{ $point_logs->onEachSide(2)->links() }}
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
