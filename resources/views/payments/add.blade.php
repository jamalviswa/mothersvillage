@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Payment Details
                </h3>
            </div>
            <div>
                <a href="{{route('payments.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to  List">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="col-md-8 offset-md-2">
                            <div class="m-section__content">
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Application number<span class="red">*</span>
                                    </label>
                                    <div class="col-md-5">
                                      
                                        <select class="form-control m-select2" name="application_number">
                                                  @php
                                            $categories = App\Customer::where('status','Active')->get();
                                            @endphp
                                                <option value=""> Select Application Number</option>
                                                @foreach($categories as $category)
                                            <option {{ old('application_number') == $category['customer_id '] ? "selected" : "" }} value="{{ $category['customer_id '] }}">{{ $category['application_number'] }}</option>
                                              @endforeach
                                            </select>
                                        @error('application_number')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Name
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('num_cards') }}" type="text" disabled autocomplete="off" class="form-control" name="num_cards" />
                                        @error('num_cards')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Type <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7 radio-sec">
                                        <label class="col-md-4"><input type="radio" class="" name="Type" value="Own_Fund"> <span> Own Fund</span></label><br>
                                        <label class="col-md-4"><input type="radio" class="" name="Type" value="Bank"> <span> Bank</span></label><br>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        @error('Type')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="col-md-8 offset-md-2">
                            <div class="m-section__content">
                                <div class="form-group row">
                                    <h4 class="col-md-10"> Own Fund</h4>

                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Date<span class="red">*</span>
                                    </label>
                                    <div class="col-md-5">
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
                                        Payment Type <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7 radio-sec">
                                        <label class="col-md-4"><input type="radio" class="" name="Type" value="Own_Fund"> <span> Check</span></label><br>
                                        <label class="col-md-4"><input type="radio" class="" name="Type" value="Bank"> <span> Cash</span></label><br>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        @error('Type')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <h5 class="col-md-10"> Check</h5>

                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Check No
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Check Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
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
                                        Amount
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Amount" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
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
                                    <h5 class="col-md-10"> Cash</h5>

                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Amount
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Amount" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
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
                                        Receipt No
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Receipt Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
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
                                        Receipt File
                                    </label>
                                    <div class="col-md-5">
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
                                <div class="form-group text-right col-md-10">
                                    <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="col-md-8 offset-md-2">
                            <div class="m-section__content">
                                <div class="form-group row">
                                    <h4 class="col-md-10"> Bank</h4>

                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Date<span class="red">*</span>
                                    </label>
                                    <div class="col-md-5">
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
                                        Amount
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Amount" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
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
                                        Receipt No
                                    </label>
                                    <div class="col-md-5">
                                        <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter Receipt Number" class="form-control" name="aadhar_number" onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
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
                                        Receipt File
                                    </label>
                                    <div class="col-md-5">
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
                                <div class="form-group text-right col-md-10">
                                    <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- END: Subheader -->

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