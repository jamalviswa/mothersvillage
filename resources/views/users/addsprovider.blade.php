@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); 
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Service Provider
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.sproviders')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Servcie Providers">
                <i class="la la-long-arrow-left"></i>
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
                           
                            <form method="post" action="{{ route('admin.users.store_sprovider') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 offset-md-3">
                                <div class="m-section__content">
                                    <div class="form-group row" id="err"></div>
                                <div class="form-group row">
                                        <label class="col-md-3">
                                            Category <span class="red">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <select class="form-control" style="height: 34px !important;" name="category" id="category">
                                            @php
                                            $categories = App\Category::where('status','Active')->get();
                                            @endphp
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option {{ old('category') == $category['id'] ? "selected" : "" }} value="{{ $category['id'] }}">{{ $category['category'] }}</option>
                                              @endforeach
                                            </select>
                                            @error('category')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div> 
                                    <div>
 

                                   <div class="form-group row service_list hide">
                                        <label class="col-md-3">
                                            Services
                                        </label>
                                        <div class="col-md-9" style="font-size: 13px;">
                                            <input type="checkbox" class="selectall" /> Select All <br>
                                            <div id="service"></div>
                                            @error('company_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Company Name 
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="company_name" value="{{ old('company_name')}}" />
                                            @error('company_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            First Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}" />
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
                                            <input type="text" class="form-control" name="last_name"   value="{{ old('last_name')}}"/>
                                            @error('last_name')
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
                                            <input type="text" class="form-control"  maxlength="15" name="mobile"  value="{{ old('mobile')}}" />
                                            @error('mobile')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">
                                            Address <span class="red">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <textarea rows="4" class="form-control" name="address"> {{ old('address')}}</textarea>
                                            @error('address')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
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
                                            ID Proof <span class="red">*</span>
                                        </label>
                                        <div class="col-md-9">
                                            <input type="file"  accept="image/*" class="form-control" name="idproof"/>
                                            
                                             @error('idproof')
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
$('#category').change(function () {
    var category=$(this).val();
   if(category=='6'){
       $('.service_list').removeClass('hide');
        $.ajax({
                    url: '{{ route('admin.services.get_services') }}',
                    type: 'post',
                    data: {'category': category, '_token': '{{ csrf_token() }}'},
                    success: function (response) {
                        $('#service').html(response);
                    }
                }); 
    }else{
        $('.service_list').addClass('hide');
    }
    });
           
$(".selectall").click(function(){
$(".individual").prop("checked",$(this).prop("checked"));
});
</script>
@endsection
 