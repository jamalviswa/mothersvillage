@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Student Info
                </h3>
        <ul class="nav nav-pills mb-3 shadow-sm" id="pills-tab" role="tablist">
         <li class="nav-item"> <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Personal Details</a> </li>
         <li class="nav-item"> <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Wallet History</a> </li>
        </ul>
            </div>
            <div>
                <a href="{{route('admin.users.students')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Students List">
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
                        <div class="tab-content" id="pills-tabContent p-3">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="m-section">
                            <div class="m-section__content">
                            <div class="text-center profile">
                                    <img src="{{ (!empty($detail['profile'])) ? URL::to('public/files/proof/'.$detail['profile'].'') :  asset('admin/img/myprofile.png') }}" >
                                    </div>
                                    <div class="row" style="position: relative;left: 110px;">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        First Name
                                    </label>
                                    <div class="col-md-5">
                                        <?php echo $detail['first_name']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Last Name
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['last_name']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                       Nick Name
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo !empty($detail['nick_name'])?$detail['nick_name']:"-"; ?>
                                    </div>
                                </div>
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-md-5">-->
                                <!--        Password-->
                                <!--    </label>-->
                                <!--    <div class="col-md-6">-->
                                <!--        <?php echo md5($detail['password']); ?>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Email
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $detail['email']; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Mobile
                                    </label>
                                    <div class="col-md-6">
                                         <span>
                                                <?php $countries = App\Country::where('id',$detail['country'])->first();
                                                echo $countries['country_code'].' ';
                                                ?></span>
                                        <?php echo !empty($detail['mobile']) ? $detail['mobile'] : "-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        Country
                                    </label>
                                    <div class="col-md-6">
                                        @php
                                            $countries = App\Country::where('status','Active')->where('id',$detail['country'])->first();
                                            @endphp
                                        <?php echo !empty($countries['country']) ?$countries['country']: "-" ?>
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="col-md-5">
                                        City
                                    </label>
                                    <div class="col-md-6">
                                        @php
                                            $cities = App\City::where('state_id',$detail['state'])->get();
                                            @endphp
                                          
                                            @foreach($cities as $cate)
                                            {!!($cate['id']==$detail['city'])? $cate['name']  :""; !!} 
                                              @endforeach
                                    </div>
                                </div> 
                                </div>
                            <div class="col-md-4">
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
                                        DOB
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo (!empty($detail['dob'])) ? date('d-m-Y',strtotime($detail['dob'])) : "-"; ?>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-md-6">
                                        Passport number
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo (!empty($detail['passport_no'])) ? $detail['passport_no'] : "-"; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Passport
                                    </label>
                                    <div class="col-md-6">
                                    @if(!empty($detail['passport']))
                                        <a href="{{ URL::to('public/files/proof/'.$detail['passport'].'') }}" target="_blank" download >
                                        <img width="60" height="50" src="{{ (!empty($detail['passport'])) ? URL::to('public/files/proof/'.$detail['passport'].'') : "-" }}" >
                                        </a>
                                        @else -
                                        @endif
                                    </div>
                                </div>
                                
                                   @php
                                    $parent = App\User::where('student_code', $detail['token'])->first();
                                    @endphp
                                    <?php if(!empty($parent)){?>
                                    <div class="form-group row">
                                    <label class="col-md-6">
                                        Parent
                                    </label>
                                    <div class="col-md-6">
                                        <a href="{{route('admin.users.parentview',['id' => $parent['user_id']])}}" ><?php echo  $parent['first_name'] ?></a>
                                            
                                </div>
                                </div>
                                <?php } ?>
                                @php if(!empty($detail['agent_code'])) {
                                $users = App\User::where('token', $detail['agent_code'])->first();
                                $agent = App\Agentdetail::where('agent_id', $users['user_id'])->first();
                                @endphp
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        Agent Code
                                    </label>
                                    <div class="col-md-6">
                                        <?php echo $agent['agent_code'] ?>
                                    </div>
                                </div>
                                @php
                                }
                                @endphp
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
                    </div></div>
                    <div class="tab-pane fade " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="m-section">
                            <div class="form-group row">
                                    <label class="col-md-3" style="font-size: 1rem; font-weight: bold; ">
                                        Total Wallet coins :  <?php echo $detail['coins']; ?>
                                    </label>
                                   
                                </div>
                            <div class="m-section__content">
                               <?php
                            if ($results->count() > '0') { ?>
                                <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>History</th>
                                            <th>Coins </th>
                                            <th>Created Date</th> 
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = ($results->currentPage() > 1) ? $results->currentPage() * $results->perpage() : $results->currentPage();
                                        foreach ($results as $result) {
                                           ?>
                                            <tr>
                                                <td width="20%">{{ $i }}</td>
                                                <td width="40%">
                                                    {{ ($result->action=="top_up")?"Wallet Top up":"" }}
                                                    {{ ($result->action=="health")?"Paid for Health service":"" }}
                                                </td>
                                                
                                                <td width="20%">{{$result->coins }}</td>
                                                <td width="20%">{{date('d-m-Y',strtotime($result->created_date))}}</td>
                                                                                           
                                            </tr>
                                            <?php
                                            $i++;
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            {!! $results->appends(\Request::except('page'))->render() !!}
                             <?php } else { ?>
                            <div class="text-center">
                                <img src="{{ asset('admin/img/no-record.png') }}"
                            </div>
                        <?php } ?>
                            </div>
                    </div></div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    a#pills-home-tab, a#pills-profile-tab {
    background: white !important;
    color: #0054ac;
    padding: 15px 26px 15px 12px;
    font-size: larger;
    border-radius: 0px;
}
 a#pills-home-tab.active,a#pills-profile-tab.active {
    border-bottom: 3px solid;
}
 .nav.nav-pills .nav-item, .nav.nav-tabs .nav-item {
	margin-left: 2px;
	margin-bottom: 0px;
}
 ul#pills-tab {
    /*margin-left: 15px;*/
    margin-bottom: 0px !important;
}
.table td,.table th{
    font-size: 1rem !important;
}
</style>
@endsection
