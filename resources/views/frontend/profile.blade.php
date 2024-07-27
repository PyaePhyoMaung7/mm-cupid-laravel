@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ
@endsection
@section('title', 'MMCupid :: Profile')
@section('content')
    <div ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
        <div class="content">
            <div id="inviter-profile" class="vw-100 vh-100 position-absolute top-0 left-0 opacity-0" style="z-index: -10; ">
                <div class="d-flex justify-content-center align-items-center w-100 h-100" id="scroll-container">
                    <div class="rounded-5 overflow-hidden opacity-100 bg-secondary position-relative"
                        style="width: 540px; height: 80vh;">
                        <div class="overflow-hidden">

                            <div id="upper-container" class="position-absolute top-0 p-4" style="width: 100%;">
                                <div class="d-flex text-white justify-content-between">
                                    <div class="d-flex align-items-center">

                                        <span class="fs-5 fw-bold d-flex align-items-center" ng-if="member.status == 4">
                                            <span class="fa-stack me-2" style="font-size: 14px;">
                                                <i class="fa fa-certificate fa-stack-2x text-primary"></i>
                                                <i class="fa fa-check fa-stack-1x text-white"></i>
                                            </span>
                                        </span>
                                        <span class="fw-bold fs-4 me-2">
                                            @{{ inviter.username }}, @{{ inviter.age }}
                                        </span>
                                        <i class="fa fa-circle text-success" style="font-size: 7px;"></i>

                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">

                                        <button class="btn border-0" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i
                                                class="fa fa-ellipsis-h text-light fs-3 me-3"></i></button>

                                        <div style="width: 540px; height: 260px; margin: 0 auto;"
                                            class="offcanvas offcanvas-bottom rounded-top-5 p-3" tabindex="-1"
                                            id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                                            <div class="offcanvas-header">
                                                <button type="button" class="btn-close fs-5" data-bs-dismiss="offcanvas"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body small fs-6 fw-semibold">
                                                <div class="mb-4" style="cursor: pointer;">Add To Favorites</div>
                                                <div class="text-danger mb-4" style="cursor: pointer;">Block</div>
                                                <div class="text-danger" style="cursor: pointer;">Block And Report</div>
                                            </div>
                                        </div>

                                        <span id="profile-cancel-btn" ng-click="cancelProfile()" class="fs-4 fw-bold"
                                            style="cursor: pointer;">&#10005;</span>
                                    </div>
                                </div>
                            </div>

                            <div id="profile-scroll-bar-container" class="position-absolute rounded shadow-lg"
                                style="top: 40%; right: 3%; width: 5px; height: 80px; background-color: #e0e0e0;">
                                <div id="profile-scroll-bar">
                                    <div id="profile-scroll-bar-value"
                                        class="bg-white shadow rounded position-absolute right-0"
                                        style="width: 100%; border: 0.2px solid #bdbdbd; height: 20px; top: 0; transform: scale(1.2);">
                                    </div>
                                </div>
                            </div>

                            <div id="lower-container" class="position-absolute bottom-0 p-4" style="width: 100%; ">
                                <div class="d-flex align-items-end justify-content-between">
                                    <button class="round-btn btn btn-light" ng-disabled="prev_btn_disabled"
                                        id="prev-profile-btn" ng-click="showPrevProfile(inviter_index)"
                                        style="width: 35px; height: 35px;"><i class="fa fs-5 fa-chevron-left"></i></button>
                                    <div class="d-flex">
                                        <div class="round-btn me-3 btn btn-light" style="width: 60px; height: 60px;"
                                            ng-click="viewProfile()"><i class="fa fa-eye fs-3"></i></div>
                                        <div class="round-btn ms-3 btn btn-light" style="width: 60px; height: 60px;"><i
                                                class="fa fa-heart fs-3"></i></div>
                                    </div>
                                    <button class="round-btn btn btn-light me-2" ng-disabled="next_btn_disabled"
                                        id="next-profile-btn" ng-click="showNextProfile(inviter_index)"
                                        style="width: 35px; height: 35px;"><i class="fa fs-5 fa-chevron-right"></i></button>
                                </div>
                            </div>

                            <div id="profile-content" class="overflow-y-auto bg-white"
                                style="width:100%; height: 80vh; z-index: 5;">
                                <div class="w-100 h-100">
                                    <img ng-src="@{{ image_arr[0].image }}"
                                        ng-click="showCarousel(0, image_arr[0].image, $event)"
                                        class="profile-image w-100 h-100 object-fit-cover" alt="">
                                </div>
                                <div class="" style="margin-bottom: 70px;">
                                    <div class="p-4" ng-if="available_to_request_date">
                                        <span class="text-secondary fw-bold">Why @{{ inviter.username }}'s here</span>
                                        <div style="cursor: pointer;" ng-click="dateRequest(member.id)"
                                            class="w-100 tag-color p-3 mt-2 rounded-4 d-flex justify-content-start align-items-center">
                                            <i class="fa fa-coffee me-2 fs-3"></i><span class="fs-5 fw-bold">Invite
                                                @{{ inviter.username }} to date </span>
                                        </div>
                                    </div>
                                    <div class="p-3">
                                        <div class="text-secondary fw-bold">About me</div>
                                        <div class="fs-5 fw-bold mt-2"> @{{ inviter.about }}</div>
                                    </div>

                                    <div class="p-3">
                                        <div class="text-secondary fw-bold">Current location</div>
                                        <div class="fs-5 fw-bold mt-2">@{{ inviter.city.name }}</div>
                                    </div>
                                    <div class="p-3" ng-if="inviter.status == 4">
                                        <div class="text-secondary fw-bold">Verification</div>
                                        <div class="mt-2">

                                            <span class="fs-5 fw-bold d-flex align-items-center">
                                                <span class="fa-stack me-2" style="font-size: 12px;">
                                                    <i class="fa fa-certificate fa-stack-2x text-primary"></i>
                                                    <i class="fa fa-check fa-stack-1x text-white"></i>
                                                </span>@{{ inviter.username }} is verified</span>
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="article">
                <article class="article-container position-relative" id="member-content">
                    <header class="article-container-header d-flex justify-content-between">
                        <span class="article-container-title" style="font-size: 26px">
                            Profile
                        </span>
                        <div class="justify-content-center">
                            <div class="flex align-items-center" style="font-size: 20px;">
                                <a href="javascript:void(0)" title="log out"
                                    onclick="confirmLogout('{{ url('logout') }}')" class="me-1"
                                    style="outline: none; background: transparent; border: 1px solid transparent;"
                                    type="button">
                                    <i class="fa fa-sign-out fs-4"></i>
                                </a>
                                <i class="fa fa-cog fs-4" title="setting" style="margin-right: 7px; cursor: pointer;"></i>
                                <button class="" title="edit profile"
                                    style="outline: none; background: transparent; border: 1px solid transparent;"
                                    type="button">
                                    <i class="fa fa-user fs-4" id="user-profile-btn" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasUserProfile" aria-controls="offcanvasUserProfile"></i>
                                </button>

                                @include('frontend.include_files.offcanvas_point')
                                @include('frontend.include_files.offcanvas_profile')
                                @include('frontend.include_files.offcanvas_profile_edit')
                                @include('frontend.include_files.offcanvas_photo_verify')

                            </div>
                        </div>
                    </header>
                    <section class="article-container-body rtf">
                        <div class="container">
                            <div class="mt-1">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="position-relative" style="width: 120px; height: 120px;">
                                            <div class="shadow-sm overflow-hidden w-100 h-100 rounded-circle">
                                                <img ng-src="@{{ member.thumb }}" class="w-100 h-100 object-fit-cover"
                                                    alt="Profile Photo">
                                            </div>
                                            <span class="fs-5 fw-bold d-flex align-items-center position-absolute z-3"
                                                style="bottom: 10px; right: -5px;" ng-if="member.status == 4">
                                                <span class="fa-stack me-2" style="font-size: 14px;">
                                                    <i class="fa fa-certificate fa-stack-2x text-primary"></i>
                                                    <i class="fa fa-check fa-stack-1x text-white"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <h3 class="mt-4">@{{ member.username }}, @{{ member.age }}</h3>
                                        {{-- <i class="fa fa-flag text-success fs-5" ng-if="member.love_status == 0"></i>
                                        <i class="fa fa-flag text-danger fs-5" ng-if="member.love_status == 1"></i> --}}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <div class="row">

                                    {{-- <button type="button" class="btn btn-outline-dark py-2"
                                        ng-if="member.love_status == 0" ng-click="foundPartner(1)"
                                        data-bs-toggle="button" aria-pressed="true"
                                        style="border-radius: 20px; width: 450px; margin-left: 35px;">
                                        <h3 class=" mb-0">Mark yourself as found partner</h3>
                                    </button>

                                    <button type="button" class="btn btn-outline-dark py-2"
                                        ng-if="member.love_status == 1" ng-click="foundPartner(0)"
                                        data-bs-toggle="button" aria-pressed="true"
                                        style="border-radius: 20px; width: 450px; margin-left: 35px;">
                                        <h3 class=" mb-0">Mark yourself as single</h3>
                                    </button> --}}

                                </div>
                            </div>

                            <div class="row">
                                <div class="card w-100 mb-5" style="background-color: lightgray;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-align: center;">Purchase Points</h5>
                                        <p class="card-text text-center" style="">Want to send more date requests?
                                            Buy cupid points here.</p>
                                        <button class="btn d-block mx-auto fw-bold" id="point-purchase-btn"
                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasPointPurchase"
                                            aria-controls="offcanvasPointPurchase"
                                            style="background-color: azure; border-radius: 10px;">See our packages</button>
                                    </div>
                                </div>
                            </div>

                            <h5 class="ms-2">See who invited you to date</h5>

                            <hr>
                            <div class="mt-1" ng-if="inviters.length > 0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col-9" style="font-size: 17px;">Username</th>
                                            <th scope="col" style="font-size: 17px;">View</th>
                                            <th scope="col" style="font-size: 17px;">Accept</th>
                                            <th scope="col" style="font-size: 17px;">Reject</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="(index, inviter) in inviters">
                                            <td scope="" class="col-9">
                                                <strong>@{{ inviter.invite_details.username.split(' ')[0] }}</strong>
                                            </td>
                                            <td class="">
                                                <div class="round-btn shadow-sm ms-3 btn btn-light"
                                                    ng-click="showInviterProfile(index)" title="view date inviter"
                                                    style="width: 30px; height: 30px; margin: 0 auto !important;"><i
                                                        class="fa fa-eye fs-6"></i></div>
                                            </td>
                                            <td class="">
                                                <div class="round-btn shadow-sm ms-3 btn btn-light"
                                                    ng-click="dateRequestAction(inviter.id, {{getDateRequestStatus('accepted')}})"
                                                    title="accept date invitation"
                                                    style="width: 30px; height: 30px; margin: 0 auto !important;"><i
                                                        class="fa fa-check fs-6"></i></div>
                                            </td>
                                            <td class="">
                                                <div class="round-btn shadow-sm ms-3 btn btn-light"
                                                    ng-click="dateRequestAction(inviter.id, {{getDateRequestStatus('rejected')}})"
                                                    title="reject date invitation"
                                                    style="width: 30px; height: 30px; margin: 0 auto !important;"><i
                                                        class="fa fa-times fs-6"></i></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </section>
                    @include('frontend.layouts.template_footer_bar')
                </article>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/front/js/profile.js?v=20240716') }}"></script>
    <script>
        let today_date = new Date();
        let last_18_years_ago_date;
        if (today_date.getFullYear() % 4 == 0 && today_date.getMonth() == 1 && today_date.getDate() == 29) {
            last_18_years_ago_date = new Date(today_date.getFullYear() - 18, today_date.getMonth(), today_date.getDate() -
                1);
        } else {
            last_18_years_ago_date = new Date(today_date.getFullYear() - 18, today_date.getMonth(), today_date.getDate());
        }
        $("#birthday").datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: 'yy-mm-dd',
            maxDate: last_18_years_ago_date,
            yearRange: "-60:+0"
        });

        $("#birthday").prop('readonly', true);

        function browseImage(index) {
            $('#upload' + index).click();
        }

        function previewImage(index) {
            const fileInput = document.getElementById('upload' + index);
            const preview = document.getElementById('preview' + index);

            let fileName = fileInput.value.split('\\').pop();
            let fileExtension = fileName.split('.').pop();

            let allow_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];

            let file = event.target.files[0];

            if (allow_extensions.includes(fileExtension)) {
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        let imgSrc = event.target.result;
                        preview.innerHTML = `
                <img src= ${imgSrc} class="" style="width: 100%; height: 100%; object-fit: cover" alt="Image Preview"/>
                `;
                    };
                    reader.readAsDataURL(file);
                    preview.style.display = "";
                    $('#upload-icon-' + index).hide();
                    $('.change-photo' + index).show();
                    $('#preview' + index).removeClass('d-none');
                    $('#delete-btn-' + index).removeClass('d-none');
                    $('#update-photo-btn').prop('disabled', false);
                }
            } else {
                $('#upload' + index).val('');
                $('#preview' + index).innerHTML = "";
                $('.change-photo' + index).hide();
                $('#upload-icon-' + index).show();
                $('#preview' + index).addClass('d-none');
                $('#delete-btn-' + index).addClass('d-none');

                alert('Your uploaded file type is not accepted.');
            };

        }

        function confirmLogout(url) {
            Swal.fire({
                title: "Log out confirmation",
                text: "Are you leaving our website? 😢",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, sign out!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;

                }
            });
        }

        const getProfile = document.getElementById('profile-content');
        const getScrollBar = document.getElementById('profile-scroll-bar-value');

        getProfile.addEventListener('scroll', function(e) {
            let percent = Math.round((getProfile.scrollTop / (getProfile.scrollHeight - getProfile.clientHeight)) *
                100);
            percent = percent * 3 / 4;
            getScrollBar.style.top = `${percent}%`;
        })
    </script>
@endsection
