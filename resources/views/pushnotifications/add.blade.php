@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                  Push Notification
                </h3>
            </div>
            <!--<div>-->
            <!--    <a href="{{route('pushnotifications.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Package List">-->
            <!--        <i class="fa fa-long-arrow-left"></i>-->
            <!--    </a>-->
            <!--</div>-->
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
                            <form method="post" action="#" id="upload" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="m-section__content">
                                            <!--<div id="err"></div>-->
                                            <div class="form-group row">
                                                <label class="col-md-4">
                                                    User Type
                                                </label>
                                                <div class="col-md-8">
                                                    <select class="form-control">
                                                        <option>Select User</option>
                                                        <option>User 1</option>
                                                        <option>User 2</option>
                                                    </select>
                                                    @error('usertype')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">
                                                    Title <span class="red">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="{{ old('title') }}" type="text" autocomplete="off" class="form-control" name="title" />
                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">
                                                    Message
                                                </label>
                                                <div class="col-md-8">
                                                    <textarea rows="4" cols="50" name="message" form="usrform" class="form-control" autocomplete="off"></textarea>
                                                    @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-4">
                                                    Link
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="{{ old('link') }}" type="text" autocomplete="off" class="form-control" name="link" />
                                                    @error('link')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-md-4">
                                                    Page
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="{{ old('page') }}" type="text" autocomplete="off" class="form-control" name="page" />
                                                    @error('page')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-md-4">
                                                    Expiry Date
                                                </label>
                                                <div class="col-md-8">
                                                    <input value="{{ old('expirydate') }}" type="text" autocomplete="off" class="form-control" name="expirydate" />
                                                    @error('expirydate')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group text-left">
                                                <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
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