@extends('layouts.admin')
@section('content')
<?php
$requestdatas = (!empty(old())) ? old() : $detail;
// dd(old());
 ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Edit Sub Admin Details
                </h3>
            </div>
            <div>
                <a href="{{route('adminusers.subadmin_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
                <i class="fa fa-long-arrow-left"></i>
                </a>
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
                            <form method="post" action="{{ route('adminusers.subadmin_update',$detail['admin_id']) }}" class="validation_form" id="upload" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8 offset-md-2">
                                <div class="m-section__content">
                                    <div id="err"></div>
                                    <div class="form-group row">
                                        <label class="col-md-5">
                                            User Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['username'] }}" type="text" autocomplete="off" class="form-control" name="username" />
                                            @error('username')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div> 


                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Email <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input value="{{ $requestdatas['email'] }}" type="text" autocomplete="off" class="form-control" name="email" />
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                         
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-5">
                                        Admin Type <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <select required="" class="form-control" name="adminname">
                                              <option value="">Select  Admin Type</option>
                                              <option {{ $requestdatas['adminname'] =="Subadmin"? "selected":"" }} value="Subadmin">Subadmin</option>
                                              <option {{ $requestdatas['adminname'] =="Admin"? "selected":"" }} value="Admin">Admin</option>
                                            </select>
                                            @error('adminname')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-md-5">
                                         Profile <span class="red">*</span>
                                        </label>
                                        <div class="col-md-7">
                                            <input type="file"  accept="image/png, image/jpg, image/jpeg" class="form-control" name="profile"  />
                                        @if(!empty( $detail->profile))
                                            <img src="{{URL::to('public/files/admin/'. $detail->profile.'')}}" class="img-sm"/>
                                         @endif
                                            @error('profile')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>

                                   

                                   
                                     
                                    <div class="form-group text-right">
                                        <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                            Submit
                                        </button>
                                    </div>
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
<style>
     .radio-sec input {
position: relative;
top: 0px;
margin-right: 5px;
margin-left: 0px;
}
</style>
@endsection
