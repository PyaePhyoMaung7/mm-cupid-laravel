@extends('backend.master')
@section('title', 'Date Request Details')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="#" onclick="history.back()"><button class="btn btn-dark" type="button"><i
                                class="fa fa-arrow-left" style="font-size: 20px;"></i></button></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="h4">Date Request Info</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            @if ($date_request)
                                <div class="row my-2 mb-5 pr-3">
                                    <div class="col-3" style="overflow: hidden">
                                        @if ($date_request->getInviteMemberInfoById->verify_photo)
                                            <a class="w-100 h-100" target="_blank"
                                                href="{{ $date_request->getInviteMemberInfoById->verify_photo }}"
                                                alt="">
                                                <img class="w-100 h-100 shadow-sm"
                                                    style="border-radius: 15px; object-fit: cover"
                                                    src="{{ $date_request->getInviteMemberInfoById->verify_photo }}"
                                                    alt="">
                                            </a>
                                        @else
                                            <img class="w-100 h-100 shadow-sm"
                                                style="border-radius: 15px; object-fit: cover"
                                                src="{{ getNoImageAvailablePhoto() }}" alt="">
                                        @endif
                                    </div>

                                    <div class="py-3 pl-5 shadow-sm col-9" style="border-radius: 15px;">
                                        <h5 class="" style="font-weight: bold">Inviter Details</h5>
                                        <div class="row mb-2">
                                            <div class="col-4">Name</div>
                                            <div class="col-8">: {{ $date_request->getInviteMemberInfoById->username }}
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Email</div>
                                            <div class="col-8">: {{ $date_request->getInviteMemberInfoById->email }}</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Phone</div>
                                            <div class="col-8">: {{ $date_request->getInviteMemberInfoById->phone }}</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Gender</div>
                                            <div class="col-8">: {{ getGenderName($date_request->getInviteMemberInfoById->gender) }}
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Date of Birth</div>
                                            <div class="col-8">:
                                                {{ $date_request->getInviteMemberInfoById->date_of_birth }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-2 pr-3">
                                    <div class="col-3" style="overflow: hidden">
                                        @if ($date_request->getAcceptMemberInfoById->verify_photo)
                                            <a class="w-100 h-100" target="_blank"
                                                href="{{ $date_request->getAcceptMemberInfoById->verify_photo }}"
                                                alt="">
                                                <img class="w-100 h-100 shadow-sm"
                                                    style="border-radius: 15px; object-fit: cover"
                                                    src="{{ $date_request->getAcceptMemberInfoById->verify_photo }}"
                                                    alt="">
                                            </a>
                                        @else
                                            <img class="w-100 h-100 shadow-sm"
                                                style="border-radius: 15px; object-fit: cover"
                                                src="{{ getNoImageAvailablePhoto() }}" alt="">
                                        @endif
                                    </div>

                                    <div class="py-3 pl-5 shadow-sm col-9" style="border-radius: 15px;">
                                        <h5 class="" style="font-weight: bold">Accepter Details</h5>
                                        <div class="row mb-2">
                                            <div class="col-4">Name</div>
                                            <div class="col-8">: {{ $date_request->getAcceptMemberInfoById->username }}
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Email</div>
                                            <div class="col-8">: {{ $date_request->getAcceptMemberInfoById->email }}</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Phone</div>
                                            <div class="col-8">: {{ $date_request->getAcceptMemberInfoById->phone }}</div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Gender</div>
                                            <div class="col-8">: {{ getGenderName($date_request->getAcceptMemberInfoById->gender) }}
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-4">Date of Birth</div>
                                            <div class="col-8">:
                                                {{ $date_request->getAcceptMemberInfoById->date_of_birth }}</div>
                                        </div>
                                    </div>
                                </div>
                                <a class="" href="{{ url('admin-backend/date-request/contacted/' . $date_request->id) }}"><button type="button"
                                    class="btn btn-success btn-sm mt-3"><i class="fa fa-phone"></i>
                                    Mark As Contacted</button></a>
                            @else
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="alert alert-success alert-dismissible w-50 text-center"
                                        style="margin: 0 auto;" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">×</span>
                                        </button>
                                        <strong>Sorry!</strong> The date request is deleted or not found.
                                    </div>
                                </div>
                            @endif
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
    </script>
@endsection
