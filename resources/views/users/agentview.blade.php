@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Service Provider Info
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.agents')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Student List">
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
                                    <img src="{{ (!empty($detail['profile'])) ? URL::to('public/files/profile/'.$detail['profile'].'') :  asset('admin/img/myprofile.png') }}" >
                                    </div>
                                <div class="row">
                            <div class="offset-md-2 col-md-4">
                            <!--<div class="form-group row">-->
                            <!--        <label class="col-md-6">-->
                            <!--            Category & Service-->
                            <!--        </label>-->
                            <!--        <div class="col-md-6">-->
                                    @php
                                            $service = App\Service::where('service_id',$detail['service_id'])->first();
                                            $category = App\Category::where('id',$detail['category_id'])->first();
                                             @endphp
                                        <!--<?php echo $category['category'].' / '.$service['name']; ?>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Agent Code
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['agent_code']; ?>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-6">
                                        First Name
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['first_name']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Last Name
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['last_name']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Email
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['email']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Gender
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['gender']) ? $detail['gender'] : "-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Mobile
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['mobile']; ?>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-4">
                                
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Address
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['address']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        ID Proof
                                    </label>
                                    <div class="col-md-6">
                                    @if(!empty($detail['idproof']))
                                                <a href="{{URL::to('public/files/proof/'.$detail['idproof'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/proof/'.$detail['idproof'].'')}}" class="img-sm"/>
                                                </a>
                                                @else
                                                -
                                                @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Registered date
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo (!empty($detail['datetime'])) ? date('d-m-Y',strtotime($detail['datetime'])) : "-"; ?>
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
    </div>
</div>@endsection
