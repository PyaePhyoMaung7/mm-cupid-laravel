@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ
@endsection
@section('title', 'MMCupid :: Log In')
@section('content')
    <div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
        <div class="row">
            <div class="col"></div>

            <div class="col-md-5">
                <h1 class="fw-bold text-center" style="font-size: 60px">Sign in</h1>
                <div class="py-3 text-center" style="font-size: 14px;">
                    Don't have account yet? <a href="{{ url('register') }}" class="text-decoration-none text-primary">Sign up</a>
                </div>

                <form id="login-form" action="{{ url('login') }}" method="POST">
                    @csrf
                    <input type="text"
                        class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                        style="width:100%;" placeholder="Enter Email" name="email" id="email" ng-model="email"
                        ng-blur="validate('email')" ng-change="checkValidation();validate('email');"
                        value="{{ old('email') }}" />
                    <p class="text-danger" ng-if="email_error">@{{ email_error_msg }}</p>

                    <div class="position-relative">
                        <input type="password" ng-keypress="tryLogin($event)"
                            class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                            style="width:100%;" placeholder="Enter Password" name="password" id="password"
                            ng-model="password" ng-blur="validate('password')"
                            ng-change="checkValidation();validate('password');" value="" />
                        <i class="fa fa-eye-slash position-absolute top-0 end-0 mt-3 me-3 fs-5" id="password-icon"
                            ng-mousedown="openPassword('password')" ng-mouseup="closePassword('password')"></i>
                        <p class="text-danger" ng-if="password_error">@{{ password_error_msg }}</p>
                    </div>

                    <button type="button" ng-click="login()" ng-disabled="process_error" id="login-btn"
                        class="btn btn-dark rounded rounded-5 btn-lg mt-4" style="width:100%;">
                        Log in
                    </button>

                    <input type="hidden" name="form-sub" value="1">
                </form>

                <div class="py-3 text-center" style="font-size: 14px;">
                    <a href="{{ url('forgot-password') }}" class="text-decoration-none text-primary">Forgot password?</a>
                </div>
            </div>

            <div class="col"></div>
        </div>
    </div>
@endsection
@section('javascript')
    <!-- PNotify -->
    <script src="{{ url('assets/js/pnotify/pnotify.js') }}"></script>
    @if (session('success_msg'))
        <script>
            new PNotify({
                title: 'Welcome to ' + '{{ $setting->company_name }}' +  ' !',
                text: "{{ session('success_msg')}}",
                width: '360px',
                type: 'success',
                styling: 'bootstrap3'
            });
        </script>
    @elseif (session('fail_msg'))
        <script>
            new PNotify({
                title: 'Welcome to ' + '{{ $setting->company_name }}' +  ' !',
                text: "{{ session('fail_msg')}}",
                width: '360px',
                type: 'success',
                styling: 'bootstrap3'
            });
        </script>
    @endif

    <script>
        function showErrorMessage(error) {
            new PNotify({
                title: 'Oh No!',
                text: error,
                type: 'error',
                styling: 'bootstrap3'
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            @foreach ($errors->all() as $error)
                showErrorMessage("{{ $error }}");
            @endforeach
        });
    </script>

    @if (session('error_msg'))
        <script>
            new PNotify({
                title: 'Oh No!',
                text: "{{ session('error_msg') }}",
                type: 'error',
                styling: 'bootstrap3'
            });
        </script>
    @endif
    <script src="{{ url('assets/front/js/login.js?v=20240702') }}"></script>
@endsection
