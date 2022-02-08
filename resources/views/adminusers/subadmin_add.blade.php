@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Sub Admin Details
                </h3>
            </div>
            <div>
                <a href="{{route('adminusers.subadmin_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  
                         m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
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
                            <form method="post" action="{{ route('adminusers.subadmin_store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8 offset-md-2">
                                    <div class="m-section__content">
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                User Name <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('username') }}" type="text" autocomplete="off" class="form-control" name="username" />
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
                                                <input value="{{ old('email') }}" type="email" autocomplete="off" class="form-control" name="email" />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Password
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('password') }}" type="password" autocomplete="off" class="form-control" name="password" />
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Admin Type
                                            </label>
                                            <div class="col-md-7">
                                                <select required="" class="form-control" name="adminname">
                                                    <option>Select Admin Type</option>
                                                    <option {{ old('adminname')=="Subadmin"?"selected":"" }} value="Subadmin">Subadmin</option>
                                                    <option {{ old('adminname')=="Admin"?"selected":"" }} value="Admin">Admin</option>
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
                                                Profile (max-size up to 2Mb) <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control" name="profile" />
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
<script>
    // $("#marketing_range-add-more").click(function() {
    //     $(".marketing_range_list").append('<li class="added-li"><div class="row" style="margin-bottom: 12px;"><div class="col-md-4"><input style="width: 100%;" class="form-control " name="son_name[]" type="text" autocomplete="off" placeholder="Name"></div><div class="col-md-2"><input class="form-control" name="son_age[]" type="text" autocomplete="off" placeholder="Age" style="width: 100%;"></div><div class="col-md-3"><select class="form-control profession_son" name="son_profession[]"><option value="">Select Profession</option><option value="Children">Children</option><option value="Student" id="student">Student</option><option value="Employee">Employee</option><option value="Others">Others</option></select></div><div class="col-md-5" id="brand_other" style="display:none;margin-top: 12px"><select class="form-control" name="son_school[]"><option value="">Select School</option><option value="MVS">MVS</option><option value="Others">Others</option></select></div></div><a class="btn btn-danger removebtn" style="margin: 0px;margin-bottom: 5px;" href="#" onclick="parentNode.parentNode.removeChild(parentNode)">-</a></li>');
    // });
    $("#marketing_range-add-mor").click(function() {
        $(".marketing_range_lis").append('<li class="added-li"><div class="row" style="margin-bottom: 12px;"><div class="col-md-5"><input required="" style="width: 100%;" class="form-control " name="daughter_name[]" type="text" autocomplete="off" placeholder="Name"></div> <div class="col-md-3"><input class="form-control " required=""  name="daughter_age[]" type="text" autocomplete="off" placeholder="Age" style="width: 100%;"></div> <div class="col-md-4"><select class="form-control" name="daughter_profession[]"><option value="">--Select Profession--</option><option value="Children">Children</option><option value="Student">Student</option><option value="Employee">Employee</option><option value="Others">Others</option></select></div></div><a class="btn btn-danger removebtn" style="margin: 0px;margin-bottom: 5px;" href="#" onclick="parentNode.parentNode.removeChild(parentNode)">-</a></li>');
    });

    $(document).on('click', '#marketing_range-add-more', function() {
        var html = '<li class="added-li">';
        html += '<div class="row" style="margin-bottom: 12px;">';
        html += '<div class="col-md-4">';
        html += '<input style="width: 100%;" class="form-control " name="son_name[]" type="text" autocomplete="off" placeholder="Name">';
        html += '</div>';
        html += '<div class="col-md-2">';
        html += '<input class="form-control" name="son_age[]" type="text" autocomplete="off" placeholder="Age" style="width: 100%;">';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<select class="form-control profession" name="son_profession[]">';
        html += '<option value="">Select Profession</option>';
        html += '<option value="Children">Children</option>';
        html += '<option value="Student" id="Student">Student</option>';
        html += '<option value="Employee">Employee</option>';
        html += '<option value="Others">Others</option>';
        html += '</select>';
        html += '</div>';
        html += '<div class="col-md-5" id="brand" style="margin-top: 12px;display:none;">';
        html += '<select class="form-control" name="son_school[]">';
        html += '<option value="">Select School</option>';
        html += '<option value="MVS">MVS</option>';
        html += '<option value="Others">Others</option>';
        html += '</select>';
        html += '</div>';
        html += '</div>';
        html += '<a class="btn btn-danger removebtn" style="margin: 0px;margin-bottom: 5px;" href="#" onclick="parentNode.parentNode.removeChild(parentNode)">-</a>';
        html += '</li>';
        $('.marketing_range_list').append(html);
    });



    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        endDate: "today"
    });
    jQuery(document).ready(function() {
        jQuery('.profession_son').change(function() {
            if (jQuery(this).val() === "Student") {
                jQuery('#brand_other').show();

            } else {
                jQuery('#brand_other').hide();

            }
        });
    });
    jQuery(document).ready(function() {
        jQuery('.profession').change(function() {
            if (jQuery(this).val() === "Student") {
                jQuery('#brand').show();

            } else {
                jQuery('#brand').hide();

            }
        });
    });
    jQuery(document).ready(function() {
        jQuery('.profession_daughter').change(function() {
            if (jQuery(this).val() === "Student") {
                jQuery('#son').show();

            } else {
                jQuery('#son').hide();

            }
        });
    });
</script>

<style>
    .radio-sec input {
        position: relative;
        top: 0px;
        margin-right: 5px;
        margin-left: 0px;
    }

    .course-div {
        box-shadow: 0 0 5px 2px #ddd;
        padding: 18px;
        margin: 15px 0;
    }

    ul {
        list-style: none;
        margin-left: 0px;
    }

    .btn.btn-success.btn-green {
        background-color: green !important;
        padding: 14px 8px !important;
        height: 33px !important;
        text-align: center !important;
        margin: 8px 0 9px 6px !important;
        color: #fff !important;
    }

    a.btn.btn-danger.removebtn {
        padding: 7px 11px;
        height: 33px;
        text-align: center;
        margin: 8px 0 9px 6px;
        color: #fff;
    }

    .inptwo {
        width: 53px;
    }
</style>

@endsection