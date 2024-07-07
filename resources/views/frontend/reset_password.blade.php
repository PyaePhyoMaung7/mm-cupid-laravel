@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ
@endsection
@section('title', 'MMCupid :: Reset Password')
@section('content')
    <div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
        <div class="row">
            <div class="col"></div>

            <div class="col-md-5">
                <h3 class="fw-bold text-center mb-5">Please reset your password</h3>

                <form id="login-form" action="{{ url('password-reset') }}" method="POST">
                    @csrf
                    <input type="password"
                        class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                        style="width:100%;" placeholder="Enter Password" name="password" id="password"
                        ng-model="password" ng-blur="validate('password')"
                        ng-change="checkValidation('password');" />
                    <p class="text-danger" ng-if="password_error">@{{ password_error_msg }}</p>

                    <input type="password"
                        class="form-control form-control-lg border border-1 border-black rounded rounded-4 mt-2"
                        style="width:100%;" placeholder="Enter Confirm Password" name="confirm-password"
                        id="confirm-password" ng-model="confirm_password" ng-blur="validate('confirm_password')"
                        ng-change="checkValidation('confirm_password');" />
                    <p class="text-danger" ng-if="confirm_password_error">@{{ confirm_password_error_msg }}</p>
                    <p class="text-danger" ng-if="passwords_unmatch_error">@{{ passwords_unmatch_error_msg }}</p>

                    <div class="text-end mt-2" style="font-size: 14px;">
                        <a href="{{ url('login') }}" class="text-decoration-none text-primary">Request link again</a>
                    </div>

                    <button type="submit" ng-disabled="process_error" id="login-btn"
                        class="btn btn-dark rounded rounded-5 btn-lg mt-3" style="width:100%;">
                        Reset Password
                    </button>

                    <input type="hidden" name="member-id" value="{{ old('member-id', $member_id) }}">
                </form>

                <div class="py-3 text-center" style="font-size: 14px;">
                    Remember password? <a href="{{ url('login') }}" class="text-decoration-none text-primary">Log in</a>
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
