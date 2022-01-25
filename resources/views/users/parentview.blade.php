@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Parent Info
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.parents')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Student List">
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
                                    <img src="{{ (!empty($detail['profile'])) ? URL::to('public/files/proof/'.$detail['profile'].'') :  asset('admin/img/myprofile.png') }}" >
                                    </div>
                                <div class="row">
                            <div class="col-md-4 offset-md-2">
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
                                        <?php echo !empty($detail['last_name'])? $detail['last_name'] : "-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Email
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['email'])? $detail['email'] : "-"; ?>
                                    </div>
                                </div>
                                    
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Mobile
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['mobile']) ? $detail['mobile'] :"-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Gender
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['gender'])? $detail['gender'] : "-"; ?>
                                    </div>
                                </div>
                                <?php if(!empty($detail['fbid'])) { ?>
                                    <div class="form-group row">
                                    <label class="col-md-6">
                                        Facebook ID
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['fbid'])? $detail['fbid'] : "-"; ?>
                                    </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="col-md-4">
                                   
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Whatsapp No
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['whatsapp_no']) ? $detail['whatsapp_no'] :"-"; ?>
                                    </div>
                                </div>
                                      <div class="form-group row">
                                    <label class="col-md-6">
                                        Line ID
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['line_id']) ? $detail['line_id'] :"-"; ?>
                                    </div>
                                </div>
                                      <div class="form-group row">
                                    <label class="col-md-6">
                                        VChat ID
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['vchat_id']) ? $detail['vchat_id'] :"-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Address
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['address']) ? $detail['address'] : "-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Children
                                    </label>
                                    @php
                                    $child = App\User::where('token', $detail['student_code'])->first();
                                    @endphp
                                    <div class="col-md-6">
                                    @if(!empty($child))
                                        <a href="{{route('admin.users.studentview',['id' => $child['user_id']])}}" ><?php echo  $child['first_name'] ?></a>
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
