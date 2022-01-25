@extends('layouts.admin')
@section('content')
<?php 
//$requestdata = request(); 
$requestdatas = (!empty(old())) ? old() : $detail;
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Edit Student
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.students')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Student List">
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
                            <form method="post" action="{{ route('admin.users.update_student',$detail['user_id']) }}" class="validation_form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 offset-md-3">
                                <div class="m-section__content">
                                
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            First Name
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="first_name" value="{!! $requestdatas['first_name'] !!}" />
                                            @error('first_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Last Name
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="last_name" value="{!! $requestdatas['last_name'] !!}" />
                                            @error('last_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-md-3">
                                            Nick Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" maxlength="30" name="nick_name" value="{!! $requestdatas['nick_name'] !!}" />
                                            @error('nick_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Email
                                        </label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="email" value="{!! $requestdatas['email'] !!}" />
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Mobile
                                        </label>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text country_code" id="basic-addon1">
                                                <?php $countries = App\Country::where('id',$requestdatas['country'])->first();
                                                echo $countries['country_code'];
                                                ?></span>
                                              </div>
                                              <input type="text" class="form-control" name="mobile" value="{!! $requestdatas['mobile'] !!}" aria-describedby="basic-addon1">
                                            </div>
                                            @error('mobile')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Gender
                                        </label>
                                        <div class="col-md-9 radio-sec">
                                                <input {!! ($requestdatas['gender'] == "Male") ? "checked" : "" !!} type="radio" class="" name="gender" value="Male"> <span> Male</span><br>
                                                <input {!! ($requestdatas['gender'] == "Female") ? "checked" : "" !!} type="radio" class="" name="gender" value="Female"> <span> Female</span><br>
                                            @error('gender')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            DOB <span class="red">*</span>
                                        </label>
                                        <div class="col-md-9">
                                        <input type="text"  class="form-control datepicker" name="dob"  value="{!! $requestdatas['dob'] !!}" />
                                            @error('dob')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-md-3">
                                                Country<span class="red">*</span>
                                            </label>
                                           <div class="col-md-9">
                                           <select class="form-control country" name="country" id="country">
                                            @php
                                            $countries = App\Country::where('status','Active')->get();
                                            @endphp
                                            <option value="">---Select Country---</option>
                                            @foreach($countries as $cate)
                                            <option  {!!($cate['id']==$requestdatas['country'])? "selected" :""; !!} value="{{ $cate['id'] }}">{{ $cate['country'] }}</option>
                                              @endforeach
                                            </select>
                                            @error('country')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                        </div>
                                        <div class= "form-group row state ">
                                            <label class="col-md-3">
                                                State <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control"  id="state1"  name="state" >
                                            @php
                                            $states = App\State::where('country_id',$requestdatas['country'])->get();
                                            @endphp
                                            <option value="">---Select Country---</option>
                                            @foreach($states as $cate)
                                            <option  {!!($cate['id']==$requestdatas['state'])? "selected" :""; !!} value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                                              @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="<?php echo empty($requestdatas['city']) ? "city hide":"city"?> form-group row">
                                            <label class="col-md-3">
                                                City <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control " id="city"  name="city" >
                                            @php
                                            $cities = App\City::where('state_id',$requestdatas['state'])->get();
                                            @endphp
                                            <option value="">---Select Country---</option>
                                            @foreach($cities as $cate)
                                            <option  {!!($cate['id']==$requestdatas['city'])? "selected" :""; !!} value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                                              @endforeach
                                                </select>
                                                </select>
                                            </div>
                                        </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Profile
                                        </label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control " name="profile"/>
                                             @if(!empty($requestdatas['profile']))
                                                <a href="{{URL::to('public/files/proof/'.$requestdatas['profile'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/proof/'.$requestdatas['profile'].'')}}" class="img-sm"/>
                                                </a>
                                                @else
                                                -
                                                @endif
                                                @error('profile')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Passport
                                        </label>
                                        <div class="col-md-9">
                                            <input type="file" class="form-control " name="passport"/>
                                             @if(!empty($requestdatas['passport']))
                                                <a href="{{URL::to('public/files/proof/'.$requestdatas['passport'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/proof/'.$requestdatas['passport'].'')}}" class="img-sm"/>
                                                </a>
                                                @else
                                                -
                                                @endif
                                                @error('passport')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Passport Number
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control " max="15" name="passport_no" value="<?php echo $requestdatas['passport_no']  ?>"/>
                                             
                                                @error('passport_no')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-md-3">
                                                Password 
                                            </label>
                                     <div class="col-md-9">
                                                <input class="form-control" value="" minlength="8" maxlength="30" name="password" type="password">
                                                @error('password')
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .radio-sec input {
	position: relative;
	bottom: 2px;
	margin-right: 11px;
	margin-left: 10px;
}
</style>
<script>
//    $('.country').on('change',function(){
//    var val=$('.country').val();
//    
//    $('.cityselect').addClass("hide");
//    $.ajax({
//    type: "POST",
//    url: '{{route('admin.users.get_countrycode')}}',
//    data: {"_token": "{{ csrf_token() }}",
//        "id": val },
//    success: function(data){
//      
//      $('.country_code').html(val);
//    }
//});
//      
//}); 
 $('#country').change(function() {
        var country = $(this).val();
        var val=$('.country').val();
    
    $('.cityselect').addClass("hide");
    $.ajax({
    type: "POST",
    url: '{{route('admin.users.get_countrycode')}}',
    data: {"_token": "{{ csrf_token() }}",
        "id": val },
    success: function(data){
      
      $('.country_code').html(data);
    }
});
         $.ajax({
                        url: "{{route('admin.users.map')}}",
                        type: 'POST',
                        data: {"_token": "{{ csrf_token() }}","country": country},
                        dataType: 'html',
                        success: function (data) {
                            $('.state').removeClass('hide');
                            $('.city').addClass('hide');  
                             $('.zip').addClass('hide');
                            $("#state1").html(data);
                        }
                    });
});

$('#state1').change(function() {
      var state = $(this).val();
             $.ajax({
                        url: "{{route('admin.users.map')}}",
                        type: 'POST',
                        data: {"_token": "{{ csrf_token() }}","state": state},
                        dataType: 'html',
                        success: function (data) {
                            $('.city').removeClass('hide'); 
                            $('.input_city').addClass('hide');
                            $('.input_city').addClass('hide');
                            $('.zip').addClass('hide');
                            $("#city").html(data);
                            $("#city").removeClass('hide'); 
                        }
                    });
           
});

$('#city').change(function() {
      $city = $(this).val();
      
           
});
</script>
@endsection