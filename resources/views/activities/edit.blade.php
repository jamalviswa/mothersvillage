@extends('layouts.admin')
@section('content')
<?php
$requestdatas = (!empty(old())) ? old() : $detail;
// dd(old());
 ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Edit Activity
                </h3>
            </div>
            <div>
                <a href="{{route('activities.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Activity List">
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
                            <form method="post" action="{{ route('activities.update',$detail['activity_id']) }}" id="upload" class="validation_form" enctype="multipart/form-data">
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
                                            <input value="{{ $requestdatas['name'] }}" type="text" autocomplete="off" class="form-control" name="name" />
                                            @error('name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Description <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                             <textarea rows="4"  name="description"  class="form-control" autocomplete="off">{{ $requestdatas['description'] }}</textarea>
                                            @error('description')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Image <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="file"  class="form-control" name="image" />
                                             @if(!empty($detail['image']))
                                                <a href="{{URL::to('public/files/activity/'.$detail['image'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/activity/'.$detail['image'].'')}}" class="img-sm"/>
                                                </a>
                                               
                                                @endif
                                            @error('image')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                  
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group row">
                                        <label class="col-md-4">
                                          Short Code <span class="red">*</span>

                                        </label>
                                        <div class="col-md-8">
                                             <input value="{{ $requestdatas['short_code'] }}" type="text"  class="form-control" name="short_code" />
                                            @error('short_code')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                <div class="form-group row">
                                        <label class="col-md-4">
                                            Icon <span class="red">*</span>
                                        </label> 
                                        <div class="col-md-8">
                                            <input  type="file" class="form-control" name="icon" />
                                             @if(!empty($detail['icon']))
                                                <a href="{{URL::to('public/files/activity/icon/'.$detail['icon'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/activity/icon/'.$detail['icon'].'')}}" class="img-sm"/>
                                                </a>
                                               
                                                @endif
                                            @error('icon')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    
                                    
                                  
                                
                                 
                            </div>
                            </div>
                              <div class="row">
                                 <div class="col-md-12">
                                     <div class="form-group text-right">
                                        <button type="submit" name="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">
                                            Submit
                                        </button>
                                        </div>
                                    </div>
                            </div
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection