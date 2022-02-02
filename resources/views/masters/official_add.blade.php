@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Official Details
                </h3>
            </div>
            <div>
                <a href="{{route('customers.personal_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  
                         m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to List">
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
                            <form method="post" action="{{ route('customers.personal_store') }}" id="upload" class="validation_form" enctype="multipart/form-data"> 
                                @csrf
                                <div class="col-md-8 offset-md-2">
                                    <div class="m-section__content">



                                    <div class="form-group row">
                                            <label class="col-md-5">
                                               App Name<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               App No<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               App Date<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                              App Aadhar Details <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('aadhar_number') }}" type="text" autocomplete="off" placeholder="Enter Aadhar Number" class="form-control" name="aadhar_number"  onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file"  accept="application/pdf" class="form-control" name="aadhar"  autocomplete="off"/>
                                                @error('aadhar')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('aadhar_number')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               App Pan Details <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter PAN Number" class="form-control" name="aadhar_number"  onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file"  accept="application/pdf" class="form-control" name="pan"  autocomplete="off"/>
                                                @error('pan')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('pan_number')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               App Mobile Number<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               Co-App Name<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               Co-App Address <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                            <textarea rows="4" class="form-control" name="address"> {{ old('address')}}</textarea>
                                                
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-md-5">
                                              Co-App Aadhar Details <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('aadhar_number') }}" type="text" autocomplete="off" placeholder="Enter Aadhar Number" class="form-control" name="aadhar_number"  onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file"  accept="application/pdf" class="form-control" name="aadhar"  autocomplete="off"/>
                                                @error('aadhar')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('aadhar_number')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               Co-App Pan Details <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('pan_number') }}" type="text" autocomplete="off" placeholder="Enter PAN Number" class="form-control" name="aadhar_number"  onKeyPress="if(this.value.length==10) return false;" name="program_fee" style="margin-bottom: 8px;" />
                                                <input type="file"  accept="application/pdf" class="form-control" name="pan"  autocomplete="off"/>
                                                @error('pan')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                @error('pan_number')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                               Co-App Mobile Number<span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('phone') }}" type="tel" autocomplete="off" class="form-control" name="phone" />
                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Phase <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Block <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Flat No <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Flat Type <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Facing <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Floor <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Saleable Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Plinth Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Comn Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                UDS Area <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Mail Id <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                @error('name')
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
<script>
    $("#marketing_range-add-more").click(function(){
        $(".marketing_range_list").append('<li class="added-li"><div class="row" style="margin-bottom: 12px;"><div class="col-md-5"><input required="" style="width: 100%;" class="form-control " name="son_name[]" type="text" autocomplete="off" placeholder="Name"></div> <div class="col-md-3"><input class="form-control " required=""  name="son_age[]" type="text" autocomplete="off" placeholder="Age" style="width: 100%;"></div> <div class="col-md-4"><select class="form-control" name="son_profession[]"><option value="">--Select Profession--</option><option value="Student">Student</option><option value="Employee">Employee</option></select></div></div><a class="btn btn-danger removebtn" style="margin: 0px;margin-bottom: 5px;" href="#" onclick="parentNode.parentNode.removeChild(parentNode)">-</a></li>');
    });
    $("#marketing_range-add-mor").click(function(){
        $(".marketing_range_lis").append('<li class="added-li"><div class="row" style="margin-bottom: 12px;"><div class="col-md-5"><input required="" style="width: 100%;" class="form-control " name="daughter_name[]" type="text" autocomplete="off" placeholder="Name"></div> <div class="col-md-3"><input class="form-control " required=""  name="daughter_age[]" type="text" autocomplete="off" placeholder="Age" style="width: 100%;"></div> <div class="col-md-4"><select class="form-control" name="daughter_profession[]"><option value="">--Select Profession--</option><option value="Student">Student</option><option value="Employee">Employee</option></select></div></div><a class="btn btn-danger removebtn" style="margin: 0px;margin-bottom: 5px;" href="#" onclick="parentNode.parentNode.removeChild(parentNode)">-</a></li>');
    });
</script>

                                       



                                        


                            



                               
                                


                                       


<style>
    .radio-sec input {
        position: relative;
        top: 0px;
        margin-right: 5px;
        margin-left: 0px;
    }
    .course-div{
       box-shadow: 0 0 5px 2px #ddd;
    padding: 18px;
        margin: 15px 0;
}
ul{
    list-style:none;
    margin-left:0px;
}
.btn.btn-success.btn-green { 
    background-color: green !important;
    padding: 14px 8px  !important;
     height: 33px  !important;
    text-align: center  !important;
    margin: 8px 0 9px 6px  !important;
    color: #fff  !important;
}
a.btn.btn-danger.removebtn {
    padding: 7px 11px;
    height: 33px;
    text-align: center;
    margin: 8px 0 9px 6px;
    color: #fff;
}
</style>

@endsection