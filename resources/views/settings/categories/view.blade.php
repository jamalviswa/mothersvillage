@extends('layouts.admin')

@section('content')
<?php $i = 1; ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">

    <!-- BEGIN: Subheader -->

    <div class="m-subheader ">

        <div class="d-flex align-items-center">

            <div class="mr-auto">

                <h3 class="m-subheader__title m-subheader__title--separator">

                    Service Info

                </h3>

            </div>

            <div>

                <a href="{{route('admin.services.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Service List">

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

                                <div class="row">
                                    <!--<div class=" col-md-3"></div>-->
                                    <div class=" col-md-5">

                                        <div class="form-group row">

                                            <label class="col-md-5">

                                                Category 

                                            </label>
                                            <label class="col-md-1">:</label>

                                            <div class="col-md-6">
                                                @php
                                                $categories = App\Category::where('status','Active')->get();

                                                @endphp
                                                @foreach($categories as $category)
                                                @if($detail['category'] == $category['id']) {{$category['category']}} @endif
                                                @endforeach
                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label class="col-md-5">

                                                Service Name

                                            </label>
                                            <label class="col-md-1">:</label>

                                            <div class="col-md-6">

                                                {{ $detail['name']}}

                                            </div>

                                        </div>
                                        @php
                                        $service_based_subjects = App\Service_based_subjects::where('service_id','=',$detail['service_id'])->where('status','Active')->get();
                                        @endphp
                                        <!--<div class="form-group row">-->

                                        <!--    <label class="col-md-6">-->

                                        <!--Service Name-->

                                        <!--</label>-->

                                        <!--<div class="col-md-6">-->
                                        @if(isset($service_based_subjects))

                                        @foreach($service_based_subjects as $subject)
                                        @if($i==1)
                                        // {{$subject['subject_name']}}
                                        @endif
                                        @if($i>1)
                                        // {{', '.$subject['subject_name']}}
                                        @endif

                                        <?php $i++; ?>
                                        @endforeach
                                        @endif

                                        <!--    </div>-->

                                        <!--</div>-->

                                        <div class="form-group row">

                                            <label class="col-md-5">

                                                Image 

                                            </label>
                                            <label class="col-md-1">:</label>
                                            <div class="col-md-6">

                                                @if(!empty($detail['image']))

                                                <a href="{{URL::to('public/files/services/'.$detail['image'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/services/'.$detail['image'].'')}}" style="margin-top: 5px;" class="img-sm"/>

                                                </a>

                                                @else

                                                -

                                                @endif

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



