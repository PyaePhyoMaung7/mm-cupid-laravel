@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ, {{$username}}
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ | {{$username}}
@endsection
@section('title', 'MMCupid :: ' . $username)
@section('content')
    <div ng-app="myApp" ng-controller="myCtrl" ng-init="init({{$id}})">
        <div class="content">
            <div id="carousel-wrapper" style="z-index: 1;" class="opacity-0 bg-black vw-100 position-fixed top-0 p-0">
                <div role="button" id="cancel-btn" ng-click="stopImageView()"
                    style="z-index: 10; left: 3.5vw; width: 100px; height: 100px;"
                    class="position-absolute text-secondary fw-bold fs-3 d-flex justify-content-center">
                    <span id="carousel-cancel-btn">&#10005;</span>
                </div>
                <div class="carousel-indicators position-absolute top-0 mx-auto" style="height: 8%; ">
                    <div class="fs-5 text-white w-100 h-100 d-flex justify-content-center align-items-center"
                        style="background: rgba(0,0,0,0.5);"><span id="current-page"></span></div>
                </div>

                <div id="carousalexample" class="carousel slide mx-auto" data-bs-interval="false">
                    <div class="carousel-inner mx-auto">
                    </div>
                    <a class="carousel-control-prev" ng-click="displayCurrentPage('prev')" id="carousel-prev-btn"
                        data-bs-target="#carousalexample" type="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" ng-click="displayCurrentPage('next')" id="carousel-next-btn"
                        data-bs-target="#carousalexample" type="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div id="member-profile" class="vw-100 vh-100 position-absolute top-0 left-0 opacity-0" style="z-index: -10; ">
                <div class="d-flex justify-content-center align-items-center w-100 h-100" id="scroll-container">
                    <div class="rounded-5 overflow-hidden opacity-100 bg-secondary position-relative"
                        style="width: 540px; height: 80vh;">
                        <div class="overflow-hidden">

                            <div id="upper-container" class="position-absolute top-0 p-4" style="width: 100%;">
                                <div class="d-flex text-white justify-content-between">
                                    <div class="d-flex align-items-center">

                                        <span class="fs-5 fw-bold d-flex align-items-center" ng-if="member.status == {{ getVerificationStatus('verified') }}">
                                            <span class="fa-stack me-2" style="font-size: 14px;">
                                                <i class="fa fa-certificate fa-stack-2x text-primary"></i>
                                                <i class="fa fa-check fa-stack-1x text-white"></i>
                                            </span>
                                        </span>
                                        <span class="fw-bold fs-4 me-2">
                                            @{{ member . username }}, @{{ member . age }}
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

                            <div id="profile-content" class="overflow-y-auto bg-white"
                                style="width:100%; height: 100vh; z-index: 5;">
                                <div class="" ng-repeat="(index, image) in image_arr">
                                    <div class="w-100 h-100" style="padding-left: vw;">
                                        <img ng-src="@{{ image . image }}"
                                            ng-click="showCarousel(index, image.image, $event)"
                                            class="profile-image w-100 h-100 mb-1 object-fit-cover" alt="">
                                    </div>
                                </div>>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="article">
                <article class="article-container position-relative" id="member-content">
                    <header class="article-container-header d-flex justify-content-between">
                        <button class="btn text-decoration-none article-container-title" onclick="history.back()" style="font-size: 26px">
                            <i class="fs-5 fa fa-arrow-left"></i>
                        </button>
                    </header>
                    <section class="article-container-body rtf" style="margin-bottom: 100px;">
                        <div class="container">
                            <div class="mt-1">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="position-relative" style="width: 120px; height: 120px;">
                                            <div class="shadow-sm overflow-hidden w-100 h-100 rounded-circle">
                                                <img ng-src="@{{ member . thumb }}" class="w-100 h-100 object-fit-cover"
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
                                        <h3 class="mt-4">@{{ member . username }}, @{{ member . age }}</h3>
                                        {{-- <i class="fa fa-flag text-success fs-5" ng-if="member.love_status == 0"></i>
                                        <i class="fa fa-flag text-danger fs-5" ng-if="member.love_status == 1"></i> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 d-flex justify-content-between align-items-center rounded-4 bg-body-tertiary mb-2">
                                <div>
                                    <div class="fs-5 fw-bold mb-2">@{{member.username}}, @{{member.age}}</div>
                                    <div>@{{member.gender_name}}, @{{member.city.name}}</div>
                                </div>
                            </div>
                            <div class="p-3 d-flex justify-content-between align-items-center rounded-4 bg-body-tertiary mb-2">
                                <div>
                                    <div class="fs-5 fw-bold mb-2">Work and Education</div>
                                    <div>@{{member.work}}, @{{member.education}}</div>
                                </div>
                            </div>
                            <div class="p-3 d-flex justify-content-between align-items-center rounded-4 bg-body-tertiary mb-2">
                                <div>
                                    <div class="fs-5 fw-bold mb-2">About me</div>
                                    <div>@{{member.about}}</div>
                                </div>
                            </div>
                            <div class="p-3 d-flex justify-content-between align-items-center rounded-4 bg-body-tertiary mb-2">
                                <div>
                                    <div class="fs-5 fw-bold mb-2">Interested in</div>
                                    <span class="rounded-pill m-1 px-2 py-1" style="background-color: #E9D8FF" ng-repeat="hobby in member.hobbies">@{{ hobby.hobby_details.name }}</span>
                                </div>
                            </div>
                            <div class="p-3 d-flex justify-content-between align-items-center rounded-4 bg-body-tertiary mb-2">
                                <div>
                                    <div class="fs-5 fw-bold mb-2">Height</div>
                                    <div>@{{member.hfeet + "'" + member.hinches + "''"}}</div>
                                </div>
                            </div>

                            <button class="btn btn-dark w-100 my-3 fs-5 rounded-pill" ng-click="showMemberProfile()" ><i class="fa fa-photo"></i> View All Photos</button>

                        </div>

                    </section>
                    @include('frontend.layouts.template_footer_bar')
                </article>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/front/js/member_profile.js?v=20240717') }}"></script>
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
