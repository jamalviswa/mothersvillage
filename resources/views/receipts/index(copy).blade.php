@extends('layouts.admin')
@section('content')

<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Payment Receipt
                </h3>
            </div>

        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">

        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                        <div></div>
                    <div class="form-group row">
                                    <label class="col-md-5">
                                        Applicant Date <span class="red">*</span>
                                    </label>
                                    <div class="col-md-7 states" id="state2">
                                        <input value="{{ old('appln_name') }}" type="text" disabled autocomplete="off" class="form-control" name="appln_name" />
                                    </div>
                                </div>

                        <section class="top-section">
                            <div>
                                <img src="" sizes="50x50" alt="Logo">
                                <h1>Mount Kailash Properties</h1>
                            </div>
                            <address>
            Mother's Village
            Nesavalar Colony Road,
            (Before Ondipudur flyover)
            Singanallur, Coimbatore - 641 005
            Ph: 0422-4599328
                            </address>
                        </section>

                        <hr>
                        <div class="date-receipt">
                            <p>No:</p>
                            <h1>Receipt</h1>
                            <p>Date :................</p>
                        </div>
                        <section class="main">
                            <pre>
            Received with thanks from <input type="text">Application No<input type="text">
            a sum of Rupees<input type="text">
            by Cheque/DD No. ................................................ Dated ........................
            drawn on .......................................... Bank towards ...............................
            Referred by : ..........................                     for Mounted Kailash Properties.
        </pre>
                        </section>
                        <section class="bottom-section">
                            <div>
                                <p class="rupee"><span>₹</span></p>
                                <i>Cheque object to realisation</i>
                            </div>
                            <div>
                                <p>Authorised Signatory</p>
                            </div>
                        </section>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    $('#update-status').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find('#category_id').val(button.attr('data-id'));
        modal.find('#status').val(button.attr('data-status'));
    });
</script>
<style>
    .form-control:disabled,
    .form-control[readonly] {
        background-color: #F26C4F;
        opacity: 1;
        color: #fff;
        text-align: center;
        padding: 11px !important;
        font-size: 20px;
    }

    *,
    *::after,
    *::before {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    

    .top-section {
        padding: 0 8%;
        display: flex;
        justify-content: space-between;
    }

    hr {
        width: 90%;
        position: relative;
        left: 5%;
    }

    .top-section h1 {
        font-size: 2.5rem;
    }

    .date-receipt {
        padding: 0 5%;
        display: flex;
        justify-content: space-between;
        margin: 5%;
        align-items: baseline;
    }

    .date-receipt>h1 {
        border: 1px solid black;
        padding: 5px;
        border-radius: 10px;
    }

    .bottom-section {
        padding: 0 7%;
        margin: 3%;
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }

    .rupee {
        font-size: 20px;
        padding: 0.5%;
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;
        margin-bottom: 2px;
    }
</style>
@endsection