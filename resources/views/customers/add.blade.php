@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Personal Details
                </h3>
            </div>
            <div>
                <a href="{{route('customers.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
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
                            <form method="post" action="{{ route('customers.store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <div class="m-section__content">
                                    <!--<div id="err"></div>-->


                                    <div class="form-group row">
                                        <label class="col-md-4">
                                           Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4">
                                          Father / Spouse Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4">
                                         Age <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4">
                                          Gender <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>


                                    <!-- <div class="form-group" id="sub_div"></div>   
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Description <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="4" class="form-control" name="description"> {{ old('description')}}</textarea>
                                            @error('description')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div> -->



                                    
                                    <div class="form-group row">
                                            <label class="col-md-4">
                                                Status <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8 radio-sec">
                                                <label><input type="radio" class="" name="status" value="Active"> <span> Active</span></label><br>
                                                <label><input type="radio" class="" name="status" value="Inactive"> <span> Inactive</span></label><br>
                                                 </div>
                                                 <div class="col-md-8 offset-md-4">
                                                @error('status')
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