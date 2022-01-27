@extends('layouts.login')
@section('content')

<div class="full vertical">
    <div class="form full-form auth-cover">
        <div class="form-container">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1> <span class="brand-name">MOTHER'S VILLAGE</span></a></h1>

                            <form class="text-left">
                                <div class="form">  
                                    <div id="username-field" class="field-wrapper input"><svg xmlns="http://www.w3.org/200/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg><input type="text" placeholder="Username" class="form-control" id="__BVID__11"></div>
                                    <div id="password-field" class="field-wrapper input mb-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg><input type="password" placeholder="Password" class="form-control" id="__BVID__12"></div>
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper toggle-pass d-flex align-items-center">
                                            <p class="d-inline-block">Show Password</p>
                                            <div class="switch s-primary custom-control custom-switch"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__13"><label class="custom-control-label" for="__BVID__13"></label></div>
                                        </div>
                                        <div class="field-wrapper"><button type="submit" class="btn btn-primary">Log In</button></div>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-image">
                <div class="l-image"></div>
            </div>
        </div>
    </div>
</div>
<style>
    .auth-cover .form-container {
        display: flex;
    }

    .auth-cover .form-form {
        width: 50%;
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }

    .auth-cover .form-form .form-form-wrap {
        max-width: 480px;
        margin: 0 auto;
        min-width: 311px;
        min-height: 100%;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }

    .auth-cover .form-form .form-container {
        align-items: center;
        display: flex;
        flex-grow: 1;
        padding: 20px 45px;
        width: 100%;
        min-height: 100%;
    }

    .auth-cover .form-form .form-container .form-content {
        display: block;
        width: 100%;
    }

    .auth-cover .form-form .form-form-wrap .user-meta {
        margin-bottom: 35px;
    }

    .auth-cover .form-form .form-form-wrap .user-meta img {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        margin-right: 15px;
        border: 4px solid #e0e6ed;
    }

    .auth-cover .form-form .form-form-wrap .user-meta div {
        align-self: center;
    }

    .auth-cover .form-form .form-form-wrap .user-meta p {
        font-size: 31px;
        /* color: #3b3f5c; */
        margin-bottom: 0;
    }

    .auth-cover .form-form .form-form-wrap h1 .brand-name {
        color: #4361ee;
        font-weight: 600;
    }

    .auth-cover .form-form .form-form-wrap p.signup-link {
        font-size: 14px;
        color: #3b3f5c;
        font-weight: 700;
        margin-bottom: 50px;
    }

    .auth-cover .form-form .form-form-wrap p.signup-link a {
        color: #4361ee;
        border-bottom: 1px solid;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.input {
        position: relative;
        padding: 11px 0 25px 0;
        border-bottom: none;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.input:focus {
        border: 1px solid #000;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.toggle-pass p {
        font-weight: 600;
        color: #3b3f5c;
        margin-bottom: 0;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper .logged-in-user-name {
        font-size: 37px;
        color: #3b3f5c;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper svg {
        position: absolute;
        top: 16px;
        color: #4361ee;
        fill: rgba(27, 85, 226, 0.2392156863);
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.terms_condition {
        margin-bottom: 20px;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.terms_condition label {
        font-size: 14px;
        color: #888ea8;
        padding-left: 31px;
        font-weight: 100;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.terms_condition a {
        color: #4361ee;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper input {
        display: inline-block;
        vertical-align: middle;
        border-radius: 0;
        min-width: 50px;
        max-width: 635px;
        width: 100%;
        min-height: 36px;
        background-color: #fff;
        border: none;
        transition: all 0.2s ease-in-out 0s;
        color: #3b3f5c;
        font-weight: 600;
        font-size: 16px;
        border-bottom: 1px solid #e0e6ed;
        padding: 0 0 10px 35px;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper input::-moz-placeholder,
    .auth-cover .form-form .form-form-wrap form .field-wrapper input::-ms-input-placeholder,
    .auth-cover .form-form .form-form-wrap form .field-wrapper input::-webkit-input-placeholder {
        color: #bfc9d4;
        font-size: 14px;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper input:focus {
        border-bottom: 1px solid #4361ee;
        box-shadow: none;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.toggle-pass {
        align-self: center;
        text-align: left;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.toggle-pass .switch {
        margin-bottom: 0;
        vertical-align: sub;
        margin-left: 7px;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper button.btn {
        align-self: center;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper a.forgot-pass-link {
        width: 100%;
        font-weight: 700;
        color: #4361ee;
        text-align: center;
        display: block;
        letter-spacing: 2px;
        font-size: 15px;
        margin-top: 15px;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper .n-chk .new-control-indicator {
        top: 1px;
        border: 1px solid #bfc9d4;
        background-color: #f1f2f3;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper .n-chk .new-control-indicator:after {
        top: 52%;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.keep-logged-in {
        margin-top: 60px;
    }

    .auth-cover .form-form .form-form-wrap form .field-wrapper.keep-logged-in label {
        font-size: 14px;
        color: #888ea8;
        padding-left: 31px;
        font-weight: 100;
    }

    .auth-cover .form-form .terms-conditions {
        max-width: 480px;
        margin: 0 auto;
        color: #3b3f5c;
        font-weight: 600;
        margin-top: 90px;
    }

    .auth-cover .form-form .terms-conditions a {
        color: #4361ee;
        font-weight: 700;
    }

    .auth-cover .form-image {
        display: flex;
        flex-direction: column;
        position: fixed;
        right: 0;
        min-height: auto;
        height: 100vh;
        width: 50%;
    }

    .auth-cover .form-image .l-image {
        background-image: url(<?php echo asset("/admin/img/villa.jpg") ?>);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        margin-right: 0px;
        background-position: 50%;
        background-repeat: no-repeat;
        background-size: cover;
        background-position-x: center;
        background-position-y: center;
    }

    @media (max-width: 991px) {
        .auth-cover .form-form {
            width: 100%;
        }

        .auth-cover .form-form .form-form-wrap {
            min-width: auto;
        }

        .auth-cover .form-image {
            display: none;
        }
    }

    @media (max-width: 575px) {
        .auth-cover .form-form .form-form-wrap form .field-wrapper.toggle-pass {
            margin-bottom: 28px;
        }
    }

    @media (-ms-high-contrast: active),
    (-ms-high-contrast: none) {
        .auth-cover .form-form .form-form-wrap {
            width: 100%;
        }

        .auth-cover .form-form .form-container {
            height: 100%;
        }
    }
</style>
@endsection