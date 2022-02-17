@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Cost Tariff 
                </h3>
            </div>
            <div>
                <a href="{{route('costs.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to  List">
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
                            <form method="post" action="{{ route('costs.store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="m-section__content">
                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    Application number
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                    @error('num_cards')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    Applicant name
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                    @error('num_cards')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                            <!--<div id="err"></div>-->
                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    Rate per SQFT <span class="red">*</span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    Area Of the Flat(Salable Area) <span class="red">*</span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    Salable Value
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                    @error('num_cards')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    UDS (in sq ft.)<span class="red">*</span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-8">
                                                    Guideline Value<span class="red">*</span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                    @error('name')
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
                                    <div class="col-md-6"><span>[A]</span>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Land Cost
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><span>[B]</span>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Construction Cost
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><span>[C]</span>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Electricity charges
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Metro Water Supply
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Car Park
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Amenities charges
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Maintenance Charges(To be decided )
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8 stronglabel">
                                                Gross Amount=[A]+[B]+[C]
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" disabled type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>









                                        <span>[D]</span>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Stamp Duty charges @7% on [A]
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Registration charges @4% on [A](demand draft)
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Registration charges for Construction Agreement @2% on [B]+[C]
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><span>[E]</span>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                Corpus fund
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div><span>[F]</span>
                                        <div class="form-group row">
                                            <label class="col-md-8">
                                                GST @1%
                                            </label>
                                            <div class="col-md-4">
                                                <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                                @error('num_cards')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label class="col-md-4">
                                                Status <span class="red">*</span>
                                            </label>
                                            <div class="col-md-4 radio-sec">
                                                <label><input type="radio" class="" name="status" value="Active" checked="checked"> <span> Active</span></label><br>
                                                <label><input type="radio" class="" name="status" value="Inactive"> <span> Inactive</span></label><br>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div> -->
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
    // $(document).ready(function(){
    //   $("#free").click(function(){
    //     $("#price").hide();

    //   });
    //   $("#premium").click(function(){
    //     $("#price").show();
    //   });
    // });

    // $('.pack').on('change', function () {
    //     if (this.value == 'Premium') {
    //         $("#price").show();
    //     } else {
    //         $("#price").hide();
    //     }

    // });

    $('#pack').change(function() {
        var pack = $(this).val();
        if (pack == 'Premium') {
            $('#price').addClass('hide');

        } else {
            $('.#price').removeClass('hide');
        }
    });
</script>
<style>
    .radio-sec input {
        position: relative;
        top: 0px;
        margin-right: 5px;
        margin-left: 0px;
    }
</style>
@endsection