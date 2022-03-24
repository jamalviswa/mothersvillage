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
                        <div>
                            <h1>Mount Kailash Properties</h1>
                            <p>Mothers Village <br> Nesavalar Colony Road.<br> (Before Ondipudur Flyover)<br> Singanallur, Coimbatore - 641005.<br> Ph 0422 - 4399328</p>
                            
                        </div>
                        <div>Receipt</div>
                        <div>No <span>185</span> <span>Date:...........</span></div>
                        <div>Received with thanks from................... <span>Application No............</span></div>
                        <div>a sum of Rupees..................</div>
                        <div>by Cheque / DD No. ......................... <span>Dated ...............</span></div>
                        <div>Drawn on .................. <span>Bank towards............</span></div>
                        <div>Reffered by: .............. <span> for Mount Kailash Properties</span></div>
                        <input type="text" disabled>
                        <div >cheque subject to realisation <span>Authorised Signatory</span></div>
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
</style>
@endsection