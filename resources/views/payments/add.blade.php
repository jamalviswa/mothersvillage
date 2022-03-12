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
                                            $phases = App\Cost::where('status', 'Active')->get();
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
                                        Applicant Name <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7 state" id="state1">
                                        <input value="{{ old('appln_name') }}" type="text" disabled autocomplete="off" class="form-control" name="appln_name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Applicant Date <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7 states" id="state2">
                                        <input value="{{ old('appln_name') }}" type="text" disabled autocomplete="off" class="form-control" name="appln_name" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Gross Amount <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7" id="state3">
                                        <input value="{{ old('gross_amount') }}" type="text" disabled autocomplete="off" class="form-control" name="gross_amount" />
                                    </div>
                                </div>

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
                                <div class="form-group row ownfund">
                                    <label class="col-md-5">
                                        Payment Schedule<span class="red">*</span>
                                    </label>
                                    <div class="col-md-7">
                                        <select class="form-control payment" name="payment_schedule">
                                            <option value=''>--Select--</option>
                                            <option value="10">10%</option>
                                            <option value="15">15%</option>
                                            <option value="20">20%</option>

                                        </select>
                                        @error('fund_date')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="m-portlet" id="payment1" style="display: none;">
                                    <div class="m-portlet__body">
                                        <!--begin::Section-->
                                        <div class="m-section">
                                            <div class="m-section__content">
                                                <div class="table-responsive">
                                                    <table class="table m-table m-table--head-bg-brand">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Payment Schedule</th>
                                                                <th>Total Amount</th>
                                                                <th>Received Amount</th>
                                                                <th>Balance Amount</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Type</th>
                                                                <th>Transaction Number</th>                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="5%">1.</td>
                                                                <td>On Booking 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>

                                                                    <select class="form-control onbook" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>


                                                                </td>
                                                                <td id="onchequetd" style="display:none;">
                                                                    <input value="{{ old('fund_date') }}"  type="text" placeholder="Cheque No" class="form-control" name="fund_date" />
                                                                </td>
                                                                <td id="oncashtd">
                                                                    <input value="{{ old('fund_date') }}" disabled type="text" class="form-control" name="fund_date" />
                                                                </td>
                                                                <td id="onnefttd" style="display:none;">
                                                                <input value="{{ old('fund_date') }}"  type="text" placeholder="NEFT ID" class="form-control" name="fund_date" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">2.</td>
                                                                <td>Payment for Agreements 40%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control agreements" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td id="agreementschequetd" style="display:none;">
                                                                    <input value="{{ old('fund_date') }}"  type="text" placeholder="Cheque No" class="form-control" name="fund_date" />
                                                                </td>
                                                                <td id="agreementscashtd">
                                                                    <input value="{{ old('fund_date') }}" disabled type="text" class="form-control" name="fund_date" />
                                                                </td>
                                                                <td id="agreementsnefttd" style="display:none;">
                                                                <input value="{{ old('fund_date') }}"  type="text" placeholder="NEFT ID" class="form-control" name="fund_date" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">3.</td>
                                                                <td>Completion of stilt + First Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">4.</td>
                                                                <td>Completion of Second Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">5.</td>
                                                                <td>Completion of Third Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">6.</td>
                                                                <td>Completion of Fourth Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">7.</td>
                                                                <td>Completion of Fifth Floor 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">8.</td>
                                                                <td>Handovering 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="m-portlet" id="payment2" style="display: none;">
                                    <div class="m-portlet__body">
                                        <!--begin::Section-->
                                        <div class="m-section">
                                            <div class="m-section__content">
                                                <div class="table-responsive">
                                                    <table class="table m-table m-table--head-bg-brand ment">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Payment Schedule</th>
                                                                <th>Total Amount</th>
                                                                <th>Received Amount</th>
                                                                <th>Balance Amount</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Type</th>
                                                                <th>Cheque Number</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="5%">1.</td>
                                                                <td>On Booking 15%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>

                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>


                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">2.</td>
                                                                <td>Payment for Agreements 40%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">3.</td>
                                                                <td>Completion of stilt + First Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">4.</td>
                                                                <td>Completion of Second Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">5.</td>
                                                                <td>Completion of Third Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">6.</td>
                                                                <td>Completion of Fourth Floor 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">7.</td>
                                                                <td>Completion of Fifth Floor 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">8.</td>
                                                                <td>Handovering 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="m-portlet" id="payment3" style="display: none;">
                                    <div class="m-portlet__body">
                                        <!--begin::Section-->
                                        <div class="m-section">
                                            <div class="m-section__content">
                                                <div class="table-responsive">
                                                    <table class="table m-table m-table--head-bg-brand pay">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Payment Schedule</th>
                                                                <th>Total Amount</th>
                                                                <th>Received Amount</th>
                                                                <th>Balance Amount</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Type</th>
                                                                <th>Cheque Number</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td width="5%">1.</td>
                                                                <td>On Booking 20%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>

                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>


                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">2.</td>
                                                                <td>Payment for Agreements 40%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">3.</td>
                                                                <td>Completion of stilt + First Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">4.</td>
                                                                <td>Completion of Second Floor 10%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">5.</td>
                                                                <td>Completion of Third Floor 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">6.</td>
                                                                <td>Completion of Fourth Floor 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">7.</td>
                                                                <td>Completion of Fifth Floor 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="5%">8.</td>
                                                                <td>Handovering 5%</td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="number" class="form-control" name="fund_date" /></td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control datepicker" name="fund_date" /></td>
                                                                <td>
                                                                    <select class="form-control" name="payment_type">
                                                                        <option value=''>--Select--</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="Cash">Cash</option>
                                                                        <option value="NEFT">NEFT</option>
                                                                    </select>
                                                                </td>
                                                                <td> <input value="{{ old('fund_date') }}" type="text" class="form-control" name="fund_date" /></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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

    jQuery(document).ready(function() {
        jQuery('.payment').change(function() {
            if (jQuery(this).val() === "10") {
                jQuery('#payment1').show();
                jQuery('#payment2').hide();
                jQuery('#payment3').hide();
            } else if (jQuery(this).val() === "15") {
                jQuery('#payment1').hide();
                jQuery('#payment2').show();
                jQuery('#payment3').hide();
            } else {
                jQuery('#payment1').hide();
                jQuery('#payment2').hide();
                jQuery('#payment3').show();
            }
        });
    });

    jQuery(document).ready(function() {
        jQuery('.onbook').change(function() {
            if (jQuery(this).val() === "Cheque") {
                jQuery('#onchequetd').show();
                jQuery('#onnefttd').hide();
                jQuery('#oncashtd').hide();
            } else if (jQuery(this).val() === "NEFT") {
                jQuery('#onchequetd').hide();
                jQuery('#onnefttd').show();
                jQuery('#oncashtd').hide();
            } else {
                jQuery('#onchequetd').hide();
                jQuery('#onnefttd').hide();
                jQuery('#oncashtd').show();
            }
        });
    });

    jQuery(document).ready(function() {
        jQuery('.agreements').change(function() {
            if (jQuery(this).val() === "Cheque") {
                jQuery('#agreementschequetd').show();
                jQuery('#agreementsnefttd').hide();
                jQuery('#agreementscashtd').hide();
            } else if (jQuery(this).val() === "NEFT") {
                jQuery('#agreementschequetd').hide();
                jQuery('#agreementsnefttd').show();
                jQuery('#agreementscashtd').hide();
            } else {
                jQuery('#agreementschequetd').hide();
                jQuery('#agreementsnefttd').hide();
                jQuery('#agreementscashtd').show();
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
                $("#state1").html(data);
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
                $("#state2").html(data);
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
                "gross_amount": country
            },
            dataType: 'html',
            success: function(data) {
                $("#state3").html(data);
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

    .m-table.m-table--head-bg-brand.pay thead th {
        background: #61317a;
    }

    .m-table.m-table--head-bg-brand.ment thead th {
        background: #329f5b;
    }
</style>
@endsection