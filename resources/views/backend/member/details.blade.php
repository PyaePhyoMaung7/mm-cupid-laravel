@extends('backend.master')
@section('title', 'Member Details')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="#" onclick="history.back()"><button class="btn btn-dark" type="button"><i class="fa fa-arrow-left" style="font-size: 20px;"></i></button></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="h4">Member Detail</h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br/>
                            @if ($member)
                            <div class="row">
                                @foreach ($member->getGalleryByMember as $image)
                                    <div class="col-2">
                                        <div style="border-radius: 15px; width: 150px; height: 200px;" class="shadow-sm overflow-hidden ms-1 mb-2 d-flex justify-content-center align-items-center">
                                            <a class="w-100 h-100" target="_blank" href="{{ $image->name }}" alt="">
                                                <img class="w-100 h-100" style="object-fit: cover" src="{{ asset('/storage/uploads/' . $member->id . '/' . $image->name) }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if ($member->status == getVerificationStatus('pending'))
                            <div class="row my-2">
                                <div class="col-6" style="overflow: hidden">
                                    <a class="w-100 h-100" target="_blank" href="{{ $member->verify_photo }}" alt="">
                                        <img class="w-100 h-100 shadow-sm" style="border-radius: 15px; object-fit: cover" src="{{ $member->verify_photo }}" alt="">
                                    </a>
                                </div>
                                <div class="col-6">
                                    <div class="mb-5">
                                        <h3>Steps for Verification</h3>
                                        <div style="font-size: 15px;">
                                            <p>Check the person in above photos</p>
                                            <p>Check the person in the left photo</p>
                                            <p>It should be the same person</p>
                                            <p>Check personal details</p>
                                            <p>If everything seems right, approve the member</p>
                                        </div>
                                    </div>
                                    <a
                                    href="javascript:void(0)"><button
                                        onclick="confirmVerify('{{ url('admin-backend/member/change/status/' . $member->id . '/' . getVerificationStatus('verified')) }}')"
                                        type="button"
                                        class="btn btn-success btn-lg mt-5 shadow-sm py-0 w-100"><i
                                            class="fa fa-check"></i>
                                        <span>Confirm</span></button></a>
                                </div>
                            </div>
                            @endif

                            <div class="row mx-auto" style="font-size: 18px;">
                                <div class="py-3 pl-5 shadow-sm w-100" style="border-radius: 15px;">
                                    <h5 class="" style="font-weight: bold">Personal Details</h5>
                                    <div class="row mb-2">
                                        <div class="col-4">Name</div>
                                        <div class="col-8">: {{ $member->username }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Email</div>
                                        <div class="col-8">: {{ $member->email }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Phone</div>
                                        <div class="col-8">: {{ $member->phone }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Gender</div>
                                        <div class="col-8">: {{ $member->gender_name }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Date of Birth</div>
                                        <div class="col-8">: {{ $member->date_of_birth }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">City</div>
                                        <div class="col-8">: {{ $member->getCityByMember->name }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Hobbies</div>
                                        <div class="col-8">: {{ getHobbies($member->getMemberHobbiesByMember) }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Education</div>
                                        <div class="col-8">: {{ $member->education }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">About</div>
                                        <div class="col-8">: {{ $member->about }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Height</div>
                                        <div class="col-8">: {{ $member->height_feet . "' " . $member->height_inches . '"' }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Preferred partner</div>
                                        <div class="col-8">: {{ getGenderName($member->partner_gender) . ' between ' . $member->partner_min_age . ' and ' . $member->partner_max_age }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Status</div>
                                        <div class="col-8">:
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
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Last log in</div>
                                        <div class="col-8">: {{ $member->last_log_in }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Point</div>
                                        <div class="col-8">: {{ $member->point }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Work</div>
                                        <div class="col-8">: {{ $member->work }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4">Religion</div>
                                        <div class="col-8">: {{ $member->religion_name }}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-4"><i class="fa fa-eye"></i></div>
                                        <div class="col-8">: {{ $member->view_count }}</div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="alert alert-success alert-dismissible w-50 text-center" style="margin: 0 auto;" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Sorry!</strong> The user account is deleted or not found.
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
