@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Pack
                </h3>
            </div>
            <div>
                <a href="{{route('payments.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Pack List">
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
                            <form method="post" action="{{ route('payments.store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-md-6">
                                <div class="m-section__content">
                                    <!--<div id="err"></div>-->
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                                <label class="col-md-4">
                                                    Choose a Pack <span class="red">*</span>
                                                </label>
                                                <div class="col-md-8">
                                                    <select name="pack" class="form-control" id="pack">
                                                        <option>Select pack</option>
                                                        <option id="free" value="Free">Free</option>
                                                        <option id="premium" value="Premium">Premium</option>
                                                    </select>
                                                    @error('template')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                    <div class="form-group row" id="price" style="display:none;">
                                        <label class="col-md-4">
                                            Pack Price ($) <span class="red"></span>
                                        </label>
                                        <div class="col-md-8">
                                             <input value="{{ old('price') }}" type="text" autocomplete="off" class="form-control" name="price" />
                                            <!--@error('price')-->
                                            <!--  <span class="invalid-feedback" role="alert">-->
                                            <!--     {{ $message }}-->
                                            <!--  </span>-->
                                            <!-- @enderror-->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label class="col-md-4">
                                                Price Duration <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8 radio-sec">
                                                <label><input type="radio" class="" name="duration" value="1 Month"> <span> 1 month</span></label><br>
                                                <label><input type="radio" class="" name="duration" value="1 Year"> <span> 1 year</span></label><br>
                                                @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                   <div class="form-group text-left">
                                        <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group row">
                                        <label class="col-md-4">
                                            No of Cards
                                        </label>
                                        <div class="col-md-8">
                                             <input value="{{ old('num_cards') }}" type="text" autocomplete="off" class="form-control" name="num_cards" />
                                            @error('num_cards')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                
                                       <div class="form-group row">
                                            <label class="col-md-4">
                                                Status <span class="red">*</span>
                                            </label>
                                            <div class="col-md-8 radio-sec">
                                                <label><input type="radio" class="" name="status" value="Active" checked="checked"> <span> Active</span></label><br>
                                                <label><input type="radio" class="" name="status" value="Inactive"> <span> Inactive</span></label><br>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
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
<script>
// $(document).ready(function(){
//   $("#free").click(function(){
//     $("#price").hide();
   
//   });
//   $("#premium").click(function(){
//     $("#price").show();
//   });
// });

// $('.pack').on('change', function () {
//     if (this.value == 'Premium') {
//         $("#price").show();
//     } else {
//         $("#price").hide();
//     }

// });

$('#pack').change(function () {
    var pack=$(this).val();
   if(pack=='Premium'){
       $('#price').addClass('hide');
       
    }else{
        $('.#price').removeClass('hide');
    }
    });
</script>
<style>
    .radio-sec input {
position: relative;
top: 0px;
margin-right: 5px;
margin-left: 0px;
}
 </style>
@endsection