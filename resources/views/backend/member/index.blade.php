@extends('backend.master')
@section('title', 'Member List')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left d-flex justify-content-between align-items-center w-100">
                    <h3>Member List</h3>
                    <div class="d-flex justify-content-between align-items-center">
                        <input class="form-control" type="text" id="search-key" name="search-key" value="{{ isset($key) ? $key : '' }}" id="">
                        <i onclick="search()" class="fa fa-search" style="font-size: 22px; margin-left: 10px; cursor: pointer;"></i>
                    </div>
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
                                            @foreach ($members as $member)
                                                <tr class="even pointer text-center">
                                                    <td class="a-center align-middle">
                                                        <input type="checkbox" class="flat" name="table_records">
                                                    </td>
                                                    <td class="align-middle">{{ $member->username }}</td>
                                                    <td class="align-middle">{{ getFifteenChars($member->email) }}</td>
                                                    <td class="align-middle">{{ $member->phone }}</td>
                                                    <td class="align-middle">
                                                        @if ($member->gender == getGender('male'))
                                                            <i class="fa fa-mars text-primary"
                                                                style="font-size: 1.5rem; font-weight: bold;"
                                                                aria-hidden="true"></i>
                                                        @elseif ($member->gender == getGender('female'))
                                                            <i class="fa fa-venus"
                                                                style="color: pink; font-size: 1.5rem; font-weight: bold;"
                                                                aria-hidden="true"></i>
                                                        @else
                                                            <i class="fa fa-genderless"
                                                                style="font-size: 1.5rem; font-weight: bold;"
                                                                aria-hidden="true"></i>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">{{ $member->date_of_birth }}</td>
                                                    <td class="align-middle col-1">
                                                        <div style="width: 80px;"><img class="w-100"
                                                                src="{{ $member->thumb }}"></div>
                                                    </td>
                                                    <td class="align-middle">{{ $member->getCityByMember->name }}</td>
                                                    <td class="align-middle">
                                                        @if ($member->status == getVerificationStatus('email'))
                                                            <span class="badge badge-info">email verified</span>
                                                        @elseif ($member->status == getVerificationStatus('pending'))
                                                            <span class="badge badge-warning">pending</span>
                                                        @elseif ($member->status == getVerificationStatus('denied'))
                                                            <span class="badge badge-dark">declined</span>
                                                        @elseif ($member->status == getVerificationStatus('verified'))
                                                            <span class="badge badge-success">verified</span>
                                                        @elseif ($member->status == getVerificationStatus('banned'))
                                                            <span class="badge badge-danger">banned</span>
                                                        @else
                                                            <span class="badge badge-secondary">unverified</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        @if ($member->status == getVerificationStatus('pending'))
                                                            <a
                                                                href="javascript:void(0)"><button
                                                                    onclick="confirmVerify('{{ url('admin-backend/member/change/status/' . $member->id . '/' . getVerificationStatus('verified')) }}')"
                                                                    type="button"
                                                                    class="btn btn-success shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                        class="fa fa-check"></i>
                                                                    <span>Confirm</span></button></a>
                                                        @endif

                                                        <a href="{{ url('admin-backend/member/details/' . $member->id ) }}"><button type="button"
                                                                class="btn btn-primary shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                    class="fa fa-eye"></i> <span>View</span></button></a>


                                                        @if ($member->status == getVerificationStatus('banned'))
                                                            <a href="javascript:void(0)"
                                                                onclick="confirmRelease('{{ url('admin-backend/member/change/status/' . $member->id . '/' . getVerificationStatus('email')) }}')"><button
                                                                    type="button"
                                                                    class="btn btn-white text-danger shadow-sm py-0 d-flex justify-content-between align-items-center btn-sm w-100"><i
                                                                        class="fa fa-unlock"></i> <span>Release</span>
                                                                </button></a>
                                                        @else
                                                            <a href="javascript:void(0)"
                                                                onclick="confirmBan('{{ url('admin-backend/member/change/status/' . $member->id . '/' . getVerificationStatus('banned')) }}')"><button
                                                                    type="button"
                                                                    class="btn btn-danger py-0 d-flex shadow-sm justify-content-between align-items-center btn-sm w-100"><i
                                                                        class="fa fa-ban"></i> <span>Ban</span>
                                                                </button></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                                @if (count($members) <= 0)
                                        <h3 class="text-center mt-5">There is no member</h3>
                                @endif
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

        function confirmRelease(url) {
            Swal.fire({
                title: "Release Confirmation!",
                text: "Are you sure to lift the ban for this member?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, release!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;

                }
            });
        }

        function confirmBan(url) {
            Swal.fire({
                title: "Ban Confirmation!",
                text: "Are you sure to ban this member?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, ban!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;

                }
            });
        }

        function confirmVerify(url) {
            Swal.fire({
                title: "Verification Confirmation!",
                text: "Has this member uploaded valid info and photos?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, approve!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;

                }
            });
        }

        function search() {
            const key = document.getElementById('search-key').value;
            window.location.href = base_url + '/admin-backend/member/index/' + key;
        }
    </script>
@endsection
