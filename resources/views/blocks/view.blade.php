@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Customer Info
                </h3>
            </div>
            <div>
                <a href="" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Application List">
                    <i class="fa fa-long-arrow-left"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content application">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <?php
                        $data['document'] = App\Document::where('customer_id', $detail->customer_id)->get();

                        ?>
                        <div class="accordion">
                            <h4 class="accordion-toggle">Personal Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            NAME OF THE APPLICANT
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->applicant_name  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            APPLICATION NUMBER
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->application_number  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            DATE OF APPLICATION
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->date_of_application  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            FATHER/SPOUSE NAME
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->fathers_name  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            AGE
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->age  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            GENDER
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->gender  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            MOBILE NUMBER
                                        </label>
                                        <div class="col-md-8">
                                            <span>
                                                <?php
                                                echo $detail['phone_code'] . ' ';
                                                ?></span>
                                            <?php echo $detail['phone']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            ALTERNATIVE MOBILE NUMBER
                                        </label>
                                        <div class="col-md-8">
                                            <span>
                                                <?php
                                                echo $detail['altphone_code'] . ' ';
                                                ?></span>
                                            <?php echo $detail['altphone']; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            EMAIL
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo $detail->email  ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            OCCUPATION
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->occupation) ? $detail->occupation : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            TOTAL YEARS OF EXPERIENCE
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->experience) ? $detail->experience : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            RESIDENTIAL/ PERMANENT ADDRESS
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->permanent_address) ? $detail->permanent_address : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            CORRESPONDANCE/ PRESENT ADDRESS
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->present_address) ? $detail->present_address : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            ANNUAL INCOME
                                        </label>
                                        <div class="col-md-8">
                                            <?php echo !empty($detail->income) ? $detail->income : "-" ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            PHOTO
                                        </label>
                                        <div class="col-md-8">
                                            <img width="100" height="100" src="<?php echo  asset('files/customers/' . $detail->photo) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="accordion-toggle">Document Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <?php foreach ($data['document'] as $doc) { ?>
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT NAME
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->co_applicant_name) ? $doc->co_applicant_name : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT MAIL ID
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->coapp_email) ? $doc->coapp_email : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT ADDRESS
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->coapp_address) ? $doc->coapp_address : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT MOBILE NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <span>
                                                <?php
                                                echo $doc['coapp_phone_code'] . ' ';
                                                ?></span>
                                            <?php echo $doc['coapp_phone']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                APPLICANT AADHAR NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->aadhar_number) ? $doc->aadhar_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                APPLICANT PAN NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->pan_number) ? $doc->pan_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                APPLICANT PASSPORT NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->passport_number) ? $doc->passport_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT AADHAR NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->coaadhar_number) ? $doc->coaadhar_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT PAN NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->copan_number) ? $doc->copan_number : "-" ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                CO-APPLICANT PASSPORT NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo !empty($doc->copassport_number) ? $doc->copassport_number : "-" ?>
                                            </div>
                                        </div>
                                        <?php
                                         $phase = App\Phase::where('phase_id', $doc['phase'])->first();
                                         $block = App\Block::where('block_id', $doc['block'])->first();
                                         $floor = App\Floor::where('floor_id', $doc['floor'])->first();
                                         $flattype = App\Flattype::where('flattype_id', $doc['flattype'])->first();
                                         $flatnumber = App\Flatnumber::where('flatnumber_id', $doc['flatnumber'])->first();
                                        ?>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                PHASE
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $phase->phase_name  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                BLOCK
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $block->block_name  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLOOR
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $floor->floor_name  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLAT TYPE
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $flattype->flattype  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLAT NUMBER
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $flatnumber->flatnumber  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                FLAT FACING
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $doc->facing  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                SALEABLE AREA
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $doc->salable_area  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                PLINTH AREA
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $doc->plinth_area  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                UDS AREA
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $doc->uds_area  ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4">
                                                COMN AREA
                                            </label>
                                            <div class="col-md-8">
                                            <?php echo $doc->comn_area  ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php }  ?>
                            </div>

                            <h4 class="accordion-toggle">Cost Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <?php //foreach($data['application_employment'] as $emp){
                                ?>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Name Of Company
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Country
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Position held
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Nature Of Duties
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            From - To period of working
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                </div>
                                <?php //} 
                                ?>
                            </div>
                            <h4 class="accordion-toggle">Payment Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <?php //foreach($data['application_relation'] as $rela){
                                ?>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Full Name
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Relationship
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            DOB
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Place of Birth
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Nationality
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            NRIC No
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            FIN no
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Occupation
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Residential Status
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Parent Siblings
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                </div>
                                <?php //} 
                                ?>
                            </div>
                            <h4 class="accordion-toggle">Receipt Info</h4>
                            <div class="accordion-content" style="margin-top: 15px;">
                                <?php //foreach($data['application_finance'] as $finance){
                                ?>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Member Type
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Monthly Income
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Current Saving
                                        </label>
                                        <div class="col-md-8">

                                        </div>
                                    </div>

                                </div>
                                <?php //} 
                                ?>
                            </div>


                        </div>
                        <div class="download_pdf">
                            <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Download Invoice" href="" target="_blank" download>
                                Download PDF<i style="color: white;font-size: 18px !important;" class="fa fa-download"></i>
                            </a>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .application a.btn.btn-secondary.m-btn.m-btn--air.m-btn--custom {
            padding: 17px;
            background: #0054ac;
            color: white;
            border-radius: 0px;
        }

        .download_pdf {
            margin-top: 24px;
            text-align: right;
        }

        .application i.fa.fa-comments {
            color: white !important;
            padding: 0px 10px;
        }

        .application label.alert-danger {
            padding: 0px 6px;
            background: red;
        }

        .application a#pills-apllicaton-tab,
        a#pills-online_apllicaton-tab {
            background: white !important;
            color: #0054ac;
            padding: 15px 26px 15px 12px;
            font-size: larger;
            border-radius: 0px;
        }

        .application a#pills-apllicaton-tab.active,
        a#pills-online_apllicaton-tab.active {
            border-bottom: 3px solid;
        }

        .application .nav.nav-pills .nav-item,
        .nav.nav-tabs .nav-item {
            margin-left: 2px;
            margin-bottom: 0px;
        }

        .application ul#pills-tab {
            margin-left: 15px;
            margin-bottom: 0px !important;
        }

        .application a.download {
            border: 2px solid #f72a80;
            border-radius: 4px;
            font-size: 15px;
            background: #f72a80;
            color: white;
            padding: 2px;
            margin: 2px;
        }

        .application a.view {
            border: 2px solid green;
            border-radius: 4px;
            font-size: 15px;
            background: green;
            color: white;
            padding: 2px;
            margin: 2px;
        }

        .application .view:hover {
            text-decoration: none !important;
        }

        .application .download:hover {
            text-decoration: none !important;
        }

        .application a .fa.fa-download,
        a .fa.fa-eye {
            font-size: 21px !important;
        }

        .accordion h4 {
            font-size: 16px;
        }

        .accordion-toggle {
            border-bottom: 1px solid #cccccc;
            cursor: pointer;
            margin: 0;
            padding: 10px 0;
            position: relative;
        }

        .accordion-toggle.active:after {
            content: "";
            position: absolute;
            right: 0;
            top: 17px;
            width: 0;
            height: 0;
            border-bottom: 5px solid #f00;
            border-left: 5px solid rgba(0, 0, 0, 0);
            border-right: 5px solid rgba(0, 0, 0, 0);
        }

        .accordion-toggle:before {
            content: "";
            position: absolute;
            right: 0;
            top: 17px;
            width: 0;
            height: 0;
            border-top: 5px solid #000;
            border-left: 5px solid rgba(0, 0, 0, 0);
            border-right: 5px solid rgba(0, 0, 0, 0);
        }

        .accordion-toggle.active:before {
            display: none;
        }

        .accordion-content {
            display: none;
        }

        .accordion-toggle.active {
            color: #0054ac;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.accordion').find('.accordion-toggle').click(function() {
                $(this).next().slideToggle('600');
                $(".accordion-content").not($(this).next()).slideUp('600');
            });
            $('.accordion-toggle').on('click', function() {
                $(this).toggleClass('active').siblings().removeClass('active');
            });
        });
    </script>
    @endsection