@extends('backend.master')
@section('title', 'User List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>User List</h3>
                </div>
            </div>

            <div class="row" style="display: block;">

                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_content position-relative">

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th>
                                                <input type="checkbox" id="check-all" class="flat">
                                            </th>
                                            <th class="column-title">Id</th>
                                            <th class="column-title">Username</th>
                                            <th class="column-title">Role</th>
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
                                        @if (count($users) > 0)
                                            @foreach ($users as $user)
                                                <tr class="even pointer">
                                                    <td class="col-1 a-center align-middle">
                                                        <input type="checkbox" class="flat" name="table_records">
                                                    </td>
                                                    <td class="col-1 align-middle">{{ $user->id }}</td>
                                                    <td class="col-2 align-middle">{{ $user->username }}</td>
                                                    <td class="col-2 align-middle">
                                                        {{ $user->role_name }}</td>
                                                    <td class="col-1 align-middle text-center"><i
                                                            @if (userIsActive($user->status)) class="fa fa-circle text-success"
                                                        @else class="fa fa-circle text-danger" @endif></i>
                                                    </td>
                                                    <td class="col-5 align-middle">
                                                        <a href="{{ url('admin-backend/user/info/edit/' . $user->id) }}"><button
                                                                type="button" class="btn btn-success btn-sm"><i
                                                                    class="fa fa-pencil"></i>
                                                                Edit</button></a>
                                                        @if (userIsActive($user->status))
                                                            <a
                                                                href="{{ url('admin-backend/user/change/status/' . $user->id . '/1') }}"><button
                                                                    type="button" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-ban"></i>
                                                                    Disable</button></a>
                                                        @else
                                                            <a
                                                                href="{{ url('admin-backend/user/change/status/' . $user->id . '/0') }}"><button
                                                                    type="button" class="btn btn-primary btn-sm"><i
                                                                        class="fa fa-unlock"></i>
                                                                    Enable</button></a>
                                                        @endif
                                                        <a href="{{ url('admin-backend/user/delete/' . $user->id) }}"><button
                                                                type="button" class="btn btn-info btn-sm"><i
                                                                    class="fa fa-trash"></i>
                                                                Delete</button></a>
                                                        <a
                                                            href="{{ url('admin-backend/user/password/edit/' . $user->id) }}"><button
                                                                type="button" class="btn btn-dark btn-sm"><i
                                                                    class="fa fa-exchange"></i>
                                                                Change Password</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <h3>There is no user
                            </div>
                            @endif
                            </tbody>
                            </table>
                            <div class="mt-3 float-right">
                                {{ $users->onEachSide(2)->links() }}
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
