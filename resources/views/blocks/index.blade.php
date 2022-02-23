@extends('layouts.admin')
@section('content')
<?php //if ($results->count() > '0') {
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Block Details
                </h3>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <!--begin::Section-->
                        <div class="m-section">
                            <div class="m-section__content">
                                <div class="row">
                                    <div class="col-md-2 j-typebox" style="background-color:#ffff45;">
                                        <p class="j-type">1 BHK</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#c7f8ca;">
                                        <p class="j-type">2 BHK</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#7ea1fa;">
                                        <p class="j-type">2 BHK P</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#a7905a;">
                                        <p class="j-type">2 BHK SP</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#ffa9ff;">
                                        <p class="j-type">3 BHK</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#21ffff;">
                                        <p class="j-type">3 BHK P</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    101
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    102
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    103
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    104
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    105
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    106
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    107
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    108
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    109
                                </div>
                            </div>
                            <div class="col-md-2 j-box">
                                <div class="j-numb">
                                    110
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .j-typebox {
        border-radius: 20px;
        height: 150px;
        cursor: pointer;
        max-width:235px ;
        margin-left: 20px;
    }

    .j-typebox .j-type {
        font-size: 25px;
        font-weight: 600;
        text-align: center;
        color: black;
        padding-top: 50px;
    }

    .j-box {
        height: 100px;
        border: 1px solid BLACK;
        border-radius: 20px;
        text-align: center;
        background-color: green;
        max-width: 94px;
        margin-left: 20px;
    }

    .j-numb {
        color: white;
        font-size: 20px;
        text-align: center;
        padding-top: 30px;
        cursor: pointer;
    }
</style>
@endsection