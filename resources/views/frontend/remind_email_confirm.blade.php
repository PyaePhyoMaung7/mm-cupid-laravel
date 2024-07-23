@extends('frontend.master')
@section('description')
    Myanmar Dating, Online Dating, Myanmar Cupid, MMcupid, သင့်ဖူးစာရှင်ကိုရှာဖွေလိုက်ပါ
@endsection
@section('keywords')
    mmcupid | MMcupid | find love | find lover | dating | date partner | ဖူးစာရှာ | အချစ်ရှာ | ကောင်လေးရှာ | ကောင်မလေးရှာ
@endsection
@section('title', 'MMCupid :: Email Confirm')
@section('content')
    <div class="container my-5" ng-app="myApp" ng-controller="myCtrl" ng-init="init()">
        <h3 class="fw-bold text-center">Thank you for signing up!</h3>
        <div class="py-3 text-center" style="font-size: 16px;">
            <div>We have sent you an email that contains email confirmation code.</div>
            <div>Please check your email and follow instructions in order to activate your account.</div>
        </div>
    </div>
@endsection
