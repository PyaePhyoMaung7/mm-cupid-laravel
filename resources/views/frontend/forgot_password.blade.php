@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ
@endsection
@section('title', 'MMCupid :: Forgot Password')
@section('content')
    <div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
        <div class="row">
            <div class="col"></div>

            <div class="col-md-5">
                <h3 class="fw-bold text-center">Forgot your password?</h3>
                <div class="py-3 text-center" style="font-size: 16px;">
                    <div>We will send instructions to this email to reset your password. </div>
                </div>

                <form id="login-form" action="{{ url('password-reset-email') }}" method="POST">
                    @csrf
                    <input type="text"
                        class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                        style="width:100%;" placeholder="Enter Email" name="email" id="email" ng-model="email"
                        ng-blur="validate('email')" ng-change="checkValidation();validate('email');"
                        value="{{ old('email') }}" />
                    <p class="text-danger" ng-if="email_error">@{{ email_error_msg }}</p>

                    <button type="button" ng-click="login()" ng-disabled="process_error" id="login-btn"
                        class="btn btn-dark rounded rounded-5 btn-lg mt-3" style="width:100%;">
                        Continue
                    </button>

                    <input type="hidden" name="form-sub" value="1">
                </form>

                <div class="py-3 text-center" style="font-size: 14px;">
                    <a href="{{ url('login') }}" class="text-decoration-none text-primary">Remember password? Log in</a>
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
                text: 'Your account has been activated successfully.</br>Please Login',
                width: '350px',
                type: 'success',
                styling: 'bootstrap3'
            });
        </script>
    @elseif (session('fail_msg'))
        <script>
            new PNotify({
                title: 'Welcome to ' + '{{ $setting->company_name }}' +  ' !',
                text: 'Unfortunately, your account activation failed!.</br>Please try again.',
                width: '350px',
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
