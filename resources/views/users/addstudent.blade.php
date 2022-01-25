@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Student
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
                            <form method="post" action="{{ route('admin.users.store_student') }}" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6 offset-md-3">
                                    <div class="m-section__content">
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                First Name <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" maxlength="30" name="first_name" value="{{ old('first_name')}}" />
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Last Name <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="last_name" maxlength="30"  value="{{ old('last_name')}}"/>
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
                                                <input type="text" class="form-control" maxlength="30" name="nick_name" value="{{ old('nick_name')}}" />
                                                @error('nick_name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Email <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="email" class="form-control" name="email"  value="{{ old('email')}}" />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Mobile <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="mobile" maxlength="15"  value="{{ old('mobile')}}" />
                                                @error('mobile')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Gender <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9 radio-sec">
                                                <input type="radio" class="" name="gender" value="Male"> <span> Male</span><br>
                                                <input type="radio" class="" name="gender" value="Female"> <span> Female</span><br>
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
                                                <input type="text"  class="form-control datepicker" name="dob"  value="{{ old('dob')}}" />
                                                @error('dob')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--<div class="form-group row">-->
                                        <!--    <label class="col-md-3">-->
                                        <!--        Education Type <span class="red">*</span>-->
                                        <!--    </label>-->
                                        <!--    <div class="col-md-9">-->
                                        <!--    <input type="text"  class="form-control" name="education_type"  value="{{ old('education_type')}}" />-->
                                        <!--        @error('education_type')-->
                                        <!--          <span class="invalid-feedback" role="alert">-->
                                        <!--             {{ $message }}-->
                                        <!--          </span>-->
                                        <!--         @enderror-->
                                        <!--    </div>-->
                                        <!--</div>-->

                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Country<span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control"  id="country"  name="country" >
                                                    <option>Select Country</option>
                                                    <?php
                                                    $countries = App\Country::where('status', 'Active')->get();
                                                    foreach ($countries as $country) {
                                                        ?>
                                                        <option value="<?php echo $country->id ?>" ><?php echo $country->country ?></option>

                                                    <?php }
                                                    ?>


                                                </select>
                                                     @error('country')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class= "form-group row state hide">
                                            <label class="col-md-3">
                                                State <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control"  id="state1"  name="state" >

                                                </select>
                                            </div>
                                        </div>
                                        <div class="city hide form-group row">
                                            <label class="col-md-3">
                                                City <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="city"  name="city" >

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Profile <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="file"  accept="image/*" class="form-control" name="profile"/>

                                                @error('profile')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Passport <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input type="file" required accept="image/*" class="form-control" name="passport"/>

                                                @error('passport')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Password <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input class="form-control" minlength="8" maxlength="30" name="password" value="" type="password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- <div class="form-group row">
                                            <label class="col-md-3">
                                                Description
                                            </label>
                                            <div class="col-md-9">
                                                <textarea class="form-control summernote" name="description"></textarea>
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group row">
                                            <label class="col-md-3">
                                                Attachment
                                            </label>
                                            <div class="col-md-9">
                                                <input type="file" class="form-control validate[custom[image]]" name="attach"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Tags 
                                            </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="tags" value=""/>
                                                <p class="small text-warning">Use comma to add more tags</p>
                                            </div>
                                        </div> -->
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
    top: 4px;
    margin-right: 11px;
    margin-left: 10px;
}
</style>
<script>
    $('.cityselect').addClass("hide");
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        endDate: "today"
    });
//    $('.country').on('change', function () {
//        var val = $('.country').val();
//        if (val == "8") {
//            $('.cityselect').addClass("hide");
//        } else {
//            $.ajax({
//                type: "POST",
//                url: '{{route('admin.users.get_city')}}',
//                data: {"_token": "{{ csrf_token() }}",
//                    "id": val},
//                success: function (data) {
//                    val = '<option value="">---Select city---</option>' + data;
//                    $('.cityselect').removeClass("hide");
//                    $('.city').html(val);
//                }
//            });
//        }
//    });
    $('#country').change(function() {
        var country = $(this).val();
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
                            $('.zip').addClass('hide');
                            $("#city").html(data);
                        }
                    });
           
});

$('#city').change(function() {
      $city = $(this).val();
      
           
});
</script>
@endsection
