@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Modifier
                </h3>
            </div>
            <div>
                <a href="{{route('modifiers.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Modifier List">
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
                            <form method="post" action="{{ route('modifiers.store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="m-section__content">
                                    <!--<div id="err"></div>-->
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Modifier Name <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input value="{{ old('modifier') }}" type="text" autocomplete="off" class="form-control" name="modifier" />
                                            @error('modifier')
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
                                            <input type="file" accept="image/*"  class="form-control" name="image" />
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
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection