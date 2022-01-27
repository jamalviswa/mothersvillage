@extends('layouts.login')
@section('content')



 <div class="m-grid m-grid--hor m-grid--root m-page">
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
</div> 

@endsection