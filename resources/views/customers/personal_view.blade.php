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
                <a href="{{route('customers.personal_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
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
                            <div class="m-section__content">
                                <div class="text-center profile">
                                    <img src="{{ (!empty($detail['photo'])) ? URL::to('public/files/customers/'.$detail['photo'].'') :  asset('admin/img/mothers.png') }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Name of the Applicant
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['applicant_name']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Application Number
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['application_number']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Date of Application
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['date_of_application']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Father / Spouse Name
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['fathers_name']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Age
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['age']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Gender
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['gender']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Mobile Number
                                            </label>
                                            <div class="col-md-5">
                                                <span>
                                                    <?php
                                                    echo $detail['phone_code'] . ' ';
                                                    ?></span>
                                                <?php echo $detail['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Alternative Mobile Number
                                            </label>
                                            <div class="col-md-5">
                                                <span>
                                                    <?php
                                                    echo $detail['altphone_code'] . ' ';
                                                    ?></span>
                                                <?php echo $detail['altphone']; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Email
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo $detail['email']; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Occupation
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo !empty($detail['occupation']) ? $detail['occupation'] : "-"; ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Total year of Experience
                                            </label>
                                            <div class="col-md-5">
                                                <?php
                                                if (!empty($detail['experience'])) {
                                                    echo $detail['experience'] . " years";
                                                } else {
                                                    echo  "-";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Residential / Permanent Address
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo !empty($detail['permanent_address']) ? $detail['permanent_address'] : "-"; ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Correspondance / Present Address
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo !empty($detail['present_address']) ? $detail['present_address'] : "-"; ?>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Annual Income
                                            </label>
                                            <div class="col-md-5">
                                                <?php echo !empty($detail['income']) ? $detail['income'] : "-"; ?>

                                            </div>
                                        </div>
                                      
                                        <?php
                                        $families = App\Son::where('customer_id', $detail['customer_id'])->get();
                                       
                                        foreach ($families as $family) {
                                        ?>
                                           <span style="font-size: 18px;color: #0054ac;font-weight: 600;">Son</span>
                                            <div class="boxsh row" style="width: 100%;display: flow-root;">
                                                <div class="course-div">
                                                    <div class="form-group row">
                                                        <label class="col-md-5">
                                                            Name
                                                        </label>
                                                        <div class="col-md-3">
                                                            <?php echo !empty($family['son_name']) ? $family['son_name'] : "-"; ?>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-5">
                                                            Age
                                                        </label>
                                                        <div class="col-md-3">
                                                            <?php echo !empty($family['son_age']) ? $family['son_age'] : "-"; ?>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-5">
                                                            Profession
                                                        </label>
                                                        <div class="col-md-3">
                                                            <?php echo !empty($family['son_profession']) ? $family['son_profession'] : "-"; ?>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-5">
                                                            School
                                                        </label>
                                                        <div class="col-md-3">
                                                            <?php echo !empty($family['son_school']) ? $family['son_school'] : "-"; ?>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-5">
                                                            Class
                                                        </label>
                                                        <div class="col-md-3">
                                                            <?php echo !empty($family['son_class']) ? $family['son_class'] : "-"; ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                    
                                        ?>

                                        <?php
                                        $daughters = App\Daughter::where('customer_id', $detail['customer_id'])->get();
                                       
                                          
                                        
                                            foreach ($daughters as $daughter) {
                                            ?>
                                            <span style="font-size: 18px;color: #0054ac;font-weight: 600;">Daughter</span>
                                                <div class="boxsh row" style="width: 100%;display: flow-root;">
                                                    <div class="course-div">
                                                        <div class="form-group row">
                                                            <label class="col-md-5">
                                                                Name
                                                            </label>
                                                            <div class="col-md-3">
                                                                <?php echo !empty($daughter['daughter_name']) ? $daughter['daughter_name'] : "-"; ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-5">
                                                                Age
                                                            </label>
                                                            <div class="col-md-3">
                                                                <?php echo !empty($daughter['daughter_age']) ? $daughter['daughter_age'] : "-"; ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-5">
                                                                Profession
                                                            </label>
                                                            <div class="col-md-3">
                                                                <?php echo !empty($daughter['daughter_profession']) ? $daughter['daughter_profession'] : "-"; ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-5">
                                                                School
                                                            </label>
                                                            <div class="col-md-3">
                                                                <?php echo !empty($daughter['daughter_school']) ? $daughter['daughter_school'] : "-"; ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-5">
                                                                Class
                                                            </label>
                                                            <div class="col-md-3">
                                                                <?php echo !empty($daughter['daughter_class']) ? $daughter['daughter_class'] : "-"; ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        
                                        ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .course-div {
        box-shadow: 0 0 5px 2px #ddd;
        padding: 18px;
        margin: 15px 0;
    }

    a#pills-home-tab,
    a#pills-profile-tab {
        background: white !important;
        color: #0054ac;
        padding: 15px 26px 15px 12px;
        font-size: larger;
        border-radius: 0px;
    }

    a#pills-home-tab.active,
    a#pills-profile-tab.active {
        border-bottom: 3px solid;
    }

    .nav.nav-pills .nav-item,
    .nav.nav-tabs .nav-item {
        margin-left: 2px;
        margin-bottom: 0px;
    }

    ul#pills-tab {
        /*margin-left: 15px;*/
        margin-bottom: 0px !important;
    }

    .table td,
    .table th {
        font-size: 1rem !important;
    }
</style>
@endsection