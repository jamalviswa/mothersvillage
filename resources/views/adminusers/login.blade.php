@extends('layouts.login')
@section('content')
<!-- <div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--singin" id="m_login">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1 imgbg	m-login__content" style="background-image: url(<?php echo asset("/admin/img/villa.jpg") ?>)">
            <div class="m-grid__item m-grid__item--middle">   
            </div>
        </div>
        <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
            <div class="m-stack m-stack--hor m-stack--desktop">
                <div class="m-stack__item m-stack__item--fluid">
                    <div class="m-login__wrapper loginbox">
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title title_login">
                                    Mother's Village
                                </h3>
                            </div>
                            <form class="m-login__form m-form validation-form" action="" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group m-form__group ">
                                    <input class="form-control m-input formtext validate[required]" type="text" placeholder="Email" autocomplete="off" name="email"/>
                                </div>
                                <div class="form-group m-form__group ">
                                    <input class="form-control m-input formtext m-login__form-input--last validate[required]" type="password" placeholder="Password" name="password"/>
                                </div>
                                <div class="m-login__form-action" style="margin-top: 33px;">
                                    <button class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div> -->
<div class="full vertical">
    <div class="form full-form auth-cover">
        <div class="form-container">
            <div class="form-form">
                <div class="form-form-wrap">
                    <div class="form-container">
                        <div class="form-content">
                            <h1> Log In to <a href="/" class="router-link-active"><span class="brand-name">CORK</span></a></h1>
                            <p class="signup-link">New Here? <a href="/auth/register" class="">Create an account</a></p>
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
                                    <div class="field-wrapper text-center keep-logged-in">
                                        <div class="checkbox-outline-primary custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" value="true" id="__BVID__14"><label class="custom-control-label" for="__BVID__14">Keep me logged in</label></div>
                                    </div>
                                    <div class="field-wrapper"><a href="/auth/pass-recovery" class="forgot-pass-link">Forgot Password?</a></div>
                                </div>
                            </form>
                            <p class="terms-conditions"> © 2020 All Rights Reserved. <a href="/" class="router-link-active">CORK</a> is a product of Arrangic Solutions LLP. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>. </p>
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
@endsection