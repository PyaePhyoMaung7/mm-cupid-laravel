@extends('backend.master')
@section('title', 'Date Request List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Date Request List</h3>
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
                                            <th class="column-title">Inviter</th>
                                            <th class="column-title">Accepter</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($date_requests as $date_request)
                                            <tr class="even pointer text-center">
                                                <td class="col-4 align-middle">{{ $date_request->getInviteMemberInfoById->username }}</td>
                                                <td class="col-4 align-middle">{{ $date_request->getAcceptMemberInfoById->username }}</td>
                                                <td class="col-2 align-middle">
                                                    <a href="{{ url('admin-backend/date-request/view/' . $date_request->id) }}"><button type="button"
                                                            class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
                                                            View</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if(count($date_requests) <= 0)
                                    <h3 class="text-center mt-5">There is no date requests</div>
                                @endif
                                <div class="mt-3 position-absolute" style="bottom: 0; right: 0;">
                                    {{ $date_requests->onEachSide(2)->links() }}
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
