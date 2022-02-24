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
            <!-- <div>
                <a href="{{route('payments.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to  List">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
            </div> -->
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
                                <div class="form-group row state hide">
                                    <label class="col-md-5">
                                        Applicant Name <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <select class="form-control" disabled id="state1" style="-webkit-appearance: none;" name="appln_name" />

                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group row state hide">
                                    <label class="col-md-5">
                                        Applicant Date <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <select class="form-control" disabled id="state2" style="-webkit-appearance: none;" name="appln_name" />

                                        </select>
                                    </div>
                                </div> -->
                                <!-- <div class="form-group row state hide">
                                    <label class="col-md-5">
                                        Applicant Name
                                    </label>
                                    <div class="col-md-7">
                                   
                                        <input value="{{ old('appln_name') }}" id="state1" type="text" disabled autocomplete="off" class="form-control" name="appln_name" />
                                        @error('appln_name')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Transaction Type <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7 radio-sec">
                                        <label><input type="radio" class="types" name="type" value="Own Fund"> <span> Own Fund</span></label><br>
                                        <label><input type="radio" class="types" name="type" value="Bank"> <span> Bank</span></label><br>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <h4 class="col-md-10"> Own Fund</h4>

                                </div> -->
                                <!-- <div class="ownfund"> -->
                                <div class="form-group row ownfund">
                                    <label class="col-md-5">
                                        Date<span class="red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" />
                                        @error('fund_date')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ownfund">
                                    <label class="col-md-5">
                                        Payment Type <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <select class="form-control payment" name="payment_type">
                                            <option value=''>--Select--</option>
                                            <option value="Cheque">Cheque</option>
                                            <option value="Cash">Cash</option>

                                        </select>

                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        @error('payment_type')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- </div> -->
                                <!-- <div class="form-group row">
                                    <h5 class="col-md-10"> Check</h5>
                                </div> -->
                                <div class="form-group row cheque">
                                    <label class="col-md-5">
                                        Cheque Number
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('cheque_number') }}" type="text" autocomplete="off" placeholder="Enter Cheque Number" class="form-control" name="cheque_number" />
                                        @error('cheque_number')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group row cheque">
                                    <label class="col-md-5">
                                        Amount
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('amount') }}" type="text" autocomplete="off" placeholder="Enter Amount" class="form-control" name="amount" />
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <h5 class="col-md-10"> Cash</h5>
                                </div> -->
                                <div class="form-group row cash">
                                    <label class="col-md-5">
                                        Amount
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('amount') }}" type="text" autocomplete="off" placeholder="Enter Amount" class="form-control" name="amount" />
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <h4 class="col-md-10"> Bank</h4>
                                </div> -->
                                <!-- <div class="bank"> -->
                                <div class="form-group row bank">
                                    <label class="col-md-5">
                                        Date<span class="red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('bank_date') }}" type="text" class="form-control datepicker" name="bank_date" />
                                        @error('bank_date')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row bank">
                                    <label class="col-md-5">
                                        Amount
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('amount') }}" type="text" autocomplete="off" placeholder="Enter Amount" class="form-control" name="amount" />
                                        @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- </div> -->
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Receipt No
                                    </label>
                                    <div class="col-md-7">
                                        <input value="{{ old('receipt_number') }}" type="text" autocomplete="off" placeholder="Enter Receipt Number" class="form-control" name="receipt_number" />
                                        @error('receipt_number')
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
                                    <div class="col-md-7">
                                        <input type="file" accept="application/pdf" class="form-control" name="receipt_file" autocomplete="off" />
                                        @error('receipt_file')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Subheader -->

</div>
<script>
    $('.ownfund').hide();
    $('.bank').hide();
    $(document).on('click', '.types', function() {
        if ($(this).val() == 'Own Fund' && $(this).is(':checked')) {

            $('.bank').hide();
            $('.ownfund').show();
            $('.cheque').hide();
            $('.cash').hide();
            $('.bank input').val('');
            $('.ownfund input').val('');
            $('.types[value="Bank"]').prop("checked", false);
        } else if ($(this).val() == 'Bank' && $(this).is(':checked')) {

            $('.bank').show();
            $('.ownfund').hide();
            $('.cheque').hide();
            $('.cash').hide();
            $('.bank input').val('');
            $('.ownfund input').val('');
            $('.types[value="Own Fund"]').prop("checked", false);
        } else {

            $('.bank').hide();
            $('.ownfund').hide();
            $('.bank input').val('');
            $('.ownfund input').val('');
            $('.types[value="Own Fund"]').prop("checked", false);
            $('.types[value="Bank"]').prop("checked", false);
        }
    });

    $('.cheque').hide();
    $('.cash').hide();
    jQuery(document).ready(function() {
        jQuery('.payment').change(function() {
            if (jQuery(this).val() === "Cheque") {
                jQuery('.cheque').show();
                jQuery('.cash').hide();
            } else {
                jQuery('.cheque').hide();
                jQuery('.cash').show();

            }
        });
    });

    $('#country').change(function() {
        var country = $(this).val();
        $.ajax({
            url: "{{route('payments.map')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "application_name": country
            },
            dataType: 'html',
            success: function(data) {
                $('.state').removeClass('hide');
                $("#state1").html(data);
                // $("#state2").html(data);
            }
        });
    });

    $('#country').change(function() {
        var country = $(this).val();
        $.ajax({
            url: "{{route('payments.map')}}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "application_date": country
            },
            dataType: 'html',
            success: function(data) {
                $('.state').removeClass('hide');
                $("#state2").html(data);
                // $("#state2").html(data);
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
</style>
@endsection