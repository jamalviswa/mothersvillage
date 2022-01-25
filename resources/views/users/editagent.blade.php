@extends('layouts.admin')
@section('content')
<?php 
$requestdatas = (!empty(old())) ? old() : $detail;
// print_r($requestdatas);exit;
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Edit Agent
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.agents')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Agent List">
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
                            <form method="post" action="{{ route('admin.users.update',$detail['user_id']) }}" class="validation_form" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 offset-md-3">
                                <div class="m-section__content">
                               
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            First Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="first_name" value="{!! $requestdatas['first_name'] !!}" />
                                            @error('first_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Last Name
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="last_name" value="{!! $requestdatas['last_name'] !!}" />
                                            @error('last_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                         
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Agent Type <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="agent_type" id="agent_type">
                                            <option value="">Select Agent Type</option>
                                             <option {{ $requestdatas['agent_type'] == "Company" ? "selected" : "" }} value="Company">Company</option>
                                              <option {{ $requestdatas['agent_type'] == "Individual" ? "selected" : "" }} value="Individual">Individual</option>
                                            </select>
                                            @error('agent_type')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Email
                                        </label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control" name="email" value="{!! $requestdatas['email'] !!}" />
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Gender
                                        </label>
                                        <div class="col-md-8 radio-sec">
                                                <input {!! (!empty($requestdatas['gender']) && ($requestdatas['gender'] == "Male")) ? "checked" : "" !!} type="radio" class="" name="gender" value="Male"> <span> Male</span><br>
                                                <input {!! (!empty($requestdatas['gender']) && ($requestdatas['gender'] == "Female")) ? "checked" : "" !!} type="radio" class="" name="gender" value="Female"> <span> Female</span><br>
                                            @error('gender')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Address
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="4" class="form-control" name="address">{!! $requestdatas['address'] !!}</textarea>
                                            @error('address')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label class="col-md-4">
                                            Director Name
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="director_name" value="{!! $requestdatas['director_name'] !!}" />
                                            @error('director_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                        <label class="col-md-4">
                                         Incharge Name
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="incharge_name" value="{!! $requestdatas['incharge_name'] !!}" />
                                            @error('incharge_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                         Wechat
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="we_chat" value="{!! $requestdatas['email'] !!}"/>
                                            @error('we_chat')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                         Line
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="line_no" maxlength="15" value="{!! $requestdatas['line_no'] !!}" />
                                            @error('line_no')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                         Whatsapp
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="whatsapp_no"  maxlength="15" value="{!! $requestdatas['whatsapp_no'] !!}" />
                                            @error('whatsapp_no')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                         Kakao Talk
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="kakao_talk" value="{!! $requestdatas['kakao_talk'] !!}"/>
                                            @error('kakao_talk')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            ID Proof
                                        </label>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control validate[custom[image]]" name="idproof"/>
                                             @if(!empty($requestdatas['idproof']))
                                                <a href="{{URL::to('public/files/proof/'.$requestdatas['idproof'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/proof/'.$requestdatas['idproof'].'')}}" class="img-sm"/>
                                                </a>
                                                @else
                                                -
                                                @endif
                                                @error('idproof')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-md-4">
                                           Commission(%)
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"  class="form-control" max="50" maxlength="2" name="commission" value="{!! $requestdatas['commission'] !!}"/>
                                            
                                             @error('commission')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-md-4">
                                           Agent Fee
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text"  class="form-control"  class="form-control" name="agent_fee" value="{!! $requestdatas['agent_fee'] !!}"/>
                                             @error('agent_fee')
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
$('#category').change(function () {
    var category=$(this).val();
    $.ajax({
                    url: '{{ route('admin.services.get_services') }}',
                    type: 'post',
                    data: {'category': category, '_token': '{{ csrf_token() }}'},
                    success: function (response) {
                        $('#service').html("<option value=''>Select Service</option>" + response);
                    }
                });
            });
</script>
@endsection