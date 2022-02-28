@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Document Details
                </h3>
            </div>
            <div>
                <a href="{{route('customers.official_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  
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
                            <form method="post" action="{{ route('customers.personal_store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8 offset-md-2">
                                    <div class="m-section__content">

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Name of the Applicant<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control m-select2" id="country" name="phase">
                                                    <option>Select Application Number</option>
                                                    <?php
                                                    $phases = App\Customer::where('status', 'Active')->get();
                                                    foreach ($phases as $phase) {
                                                    ?>
                                                        <option value="<?php echo $phase->customer_id ?>"><?php echo $phase->application_number ?></option>

                                                    <?php }
                                                    ?>
                                                </select>
                                                @error('phase')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Application Number<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Date of Application<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="date" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Applicant Aadhar Details
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('aadhar_number') }}" id="aadhar_number" type="text" autocomplete="off" placeholder="Enter Aadhar Number" class="form-control" name="aadhar_number" maxlength="14" style="margin-bottom: 8px;" />
                                                <input type="file" accept="application/pdf,image/jpeg" class="form-control" name="aadhar" autocomplete="off" />
                                                @error('aadhar')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('aadhar_number')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Applicant Pan Details
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter PAN Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file" accept="application/pdf" class="form-control" name="pan" autocomplete="off" />
                                                @error('pan')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('pan_number')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Applicant Passport Details
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Passport Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file" accept="application/pdf" class="form-control" name="pan" autocomplete="off" />
                                                @error('pan')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('pan_number')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Name of the Co-Applicant
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Co-applicant Address
                                            </label>
                                            <div class="col-md-7">
                                                <textarea rows="4" class="form-control" name="address"> {{ old('address')}}</textarea>

                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Co-Applicant Aadhar Details
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('aadhar_number') }}" type="text" autocomplete="off" placeholder="Enter Aadhar Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file" accept="application/pdf" class="form-control" name="aadhar" autocomplete="off" />
                                                @error('aadhar')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('aadhar_number')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Co-Applicant Pan Details
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter PAN Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file" accept="application/pdf" class="form-control" name="pan" autocomplete="off" />
                                                @error('pan')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('pan_number')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Co-Applicant Passport Details
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Passport Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file" accept="application/pdf" class="form-control" name="pan" autocomplete="off" />
                                                @error('pan')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('pan_number')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Applicant Mobile Number
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Co-Applicant Mobile Number
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Co-Applicant Mail Id
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Phase<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="phase" name="phase">
                                                    <option>Select Phase</option>
                                                    <?php
                                                    $phases = App\Phase::where('status', 'Active')->get();
                                                    foreach ($phases as $phase) {
                                                    ?>
                                                        <option value="<?php echo $phase->phase_id ?>"><?php echo $phase->phase_name ?></option>

                                                    <?php }
                                                    ?>
                                                </select>
                                                @error('phase')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row block hide">
                                            <label class="col-md-5">
                                                Block <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="block" name="block">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row floor hide">
                                            <label class="col-md-5">
                                                Floor <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="floor" name="floor">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row flattype hide">
                                            <label class="col-md-5">
                                                Flat Type <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="flattype" name="flattype">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row flatnumber hide">
                                            <label class="col-md-5">
                                                Flat Number <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" id="flatnumber" name="flatnumber">

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Facing <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="facing">
                                                    <option value="">---Select---</option>
                                                    <option {{ old('facing')=="North"?"selected":"" }} value="North">North</option>
                                                    <option {{ old('facing')=="East"?"selected":"" }} value="East">East</option>
                                                    <option {{ old('facing')=="West"?"selected":"" }} value="West">West</option>
                                                    <option {{ old('facing')=="South"?"selected":"" }} value="South">South</option>
                                                </select>
                                                @error('facing')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Saleable Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('salable_area') }}" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" autocomplete="off" class="form-control" name="salable_area" />
                                                @error('salable_area')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Plinth Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('plinth_area') }}" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" autocomplete="off" class="form-control" name="plinth_area" />
                                                @error('plinth_area')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                UDS Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('uds_area') }}" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" autocomplete="off" class="form-control" name="uds_area" />
                                                @error('uds_area')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Comn Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('comn_area') }}" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" maxlength="10" autocomplete="off" class="form-control" name="comn_area" />
                                                @error('comn_area')
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
    $(".m-select2").select2();

    $('#phase').change(function() {
        var phase = $(this).val();
        $.ajax({
            url: "{{route('customers.map')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "phase": phase
            },
            dataType: 'html',
            success: function(data) {
                $('.block').removeClass('hide');
                $("#block").html(data);
            }
        });
    });
    $('#block').change(function() {
        var block = $(this).val();
        $.ajax({
            url: "{{route('customers.map')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "block": block
            },
            dataType: 'html',
            success: function(data) {
                $('.floor').removeClass('hide');
                $("#floor").html(data);
            }
        });
    });
    $('#floor').change(function() {
        var floor = $(this).val();
        $.ajax({
            url: "{{route('customers.map')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "floor": floor
            },
            dataType: 'html',
            success: function(data) {
                $('.flattype').removeClass('hide');
                $("#flattype").html(data);
            }
        });
    });
    $('#flattype').change(function() {
        var flattype = $(this).val();
        $.ajax({
            url: "{{route('customers.map')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "flattype": flattype
            },
            dataType: 'html',
            success: function(data) {
                $('.flatnumber').removeClass('hide');
                $("#flatnumber").html(data);
            }
        });
    });

    $('#aadhar_number').on('keypress change blur', function() {
        $(this).val(function(index, value) {
            return value.replace(/[^a-z0-9]+/gi, '').replace(/(.{4})/g, '$1 ');
        });
    });

    $('#aadhar_number').on('copy cut paste', function() {
        setTimeout(function() {
            $('#aadhar_number').trigger("change");
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
</style>

@endsection