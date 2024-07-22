@extends('backend.master')
@section('title', 'Transactions List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Transactions</h3>
                </div>
            </div>

            <div class="row" style="display: block;">

                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content position-relative" style="height: 70vh;">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Id</th>
                                            <th class="column-title">Member</th>
                                            <th class="column-title no-link last"><span class="nobr">Action</span>
                                            </th>
                                            <th class="bulk-actions" colspan="7">
                                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span
                                                        class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @if(count($transactions) > 0)
                                        @foreach ($transactions as $transaction)
                                            <tr class="even pointer">
                                                <td class="col-1 a-center align-middle">
                                                    <input type="checkbox" class="flat" name="table_records">
                                                </td>
                                                <td class="col-2 align-middle">{{ $transaction->id }}</td>
                                                <td class="col-7 align-middle">{{ $transaction->getMemberByMemberTransaction->username }}</td>
                                                <td class="col-2 align-middle">
                                                    <a href="{{ url('admin-backend/transaction/view/' . $transaction->id) }}"><button type="button"
                                                            class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
                                                            Check</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <h3>There is no transaction</div>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="mt-3 position-absolute" style="bottom: 0; right: 0;">
                                    {{ $transactions->onEachSide(2)->links() }}
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