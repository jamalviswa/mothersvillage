@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Official Details
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
                                                App No<span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                App Date <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="date" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                App Aadhar No <span class="red">*</span>
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
                                                App Pan No <span class="red">*</span>
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
                                                App Phone No <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Co App Aadhar No <span class="red">*</span>
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
                                                Co App Pan No <span class="red">*</span>
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
                                                Co App Phone No <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Phase <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Block <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Flat No <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Flat Type <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Facing <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Floor <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Saleable Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Plinth Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Comn Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                UDS Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Mail Id <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Own Fund / Bank<span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Loan Sanction Amount <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Sale Value <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                15% Advance <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                85% <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                40% <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Guideline Value <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Land Cost(UDS) <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Construction Cost <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                PDC <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Stamp Duty(7%) <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Registration Charges(4%) <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Constructon Agrmt(2%)<span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                GST 1% <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8">
                                                <input value="{{ old('name') }}" type="tel" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>













































































                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Bank Name <span class="red">*</span>
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
                                                A/c No <span class="red">*</span>
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
                                                Branch <span class="red">*</span>
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
                                                Reffered by<span class="red">*</span>
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
                                                Code No <span class="red">*</span>
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
                                                Cell No <span class="red">*</span>
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
                                                Are you eligible for PMAY Scheme subsidy? <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8 radio-sec">
                                                <label><input type="radio" class="" name="status" value="Active"> <span> Yes</span></label><br>
                                                <label><input type="radio" class="" name="status" value="Inactive"> <span> No </span></label><br>
                                            </div>
                                            <div class="col-md-8 offset-md-4">
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                Particular of Properties owned if any: <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8 radio-sec">
                                                <label><input type="checkbox" name="status" value="Active"> <span> Own land</span></label><br>
                                                <label><input type="checkbox" name="status" value="Active"> <span> Own House</span></label><br>
                                                <label><input type="checkbox" name="status" value="Active"> <span> Others</span></label><br>
                                                <label><input type="checkbox" name="status" value="Active"> <span> None</span></label><br>
                                            </div>
                                            <div class="col-md-8 offset-md-4">
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
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