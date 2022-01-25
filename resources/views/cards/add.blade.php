@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Cards
                </h3>
            </div>
            <div>
                <a href="{{route('cards.index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Cards List">
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
                            <form method="post" action="#" id="upload" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="m-section__content">
                                            <!--<div id="err"></div>-->
                                            <div class="form-group row">
                                                <label class="col-md-3">
                                                    Name <span class="red">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input value="{{ old('name') }}" type="text" autocomplete="off" class="form-control" name="name" />
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">
                                                    Short Code <span class="red">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input value="{{ old('shortcode') }}" type="text" autocomplete="off" class="form-control" name="shortcode" />
                                                    @error('shortcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3">
                                                    Template
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-control">
                                                        <option>Select Template</option>
                                                        <option>Template 1</option>
                                                        <option>Template 2</option>
                                                    </select>
                                                    @error('template')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3">
                                                    Targeted area
                                                </label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="targeted_area">
                                                          @php
                                            $targetareas = App\Targetedarea::where('status','Active')->get();
                                            @endphp
                                                        <option>Select Targeted area</option>
                                                         @foreach($targetareas as $targetarea)
                                            <option {{ old('targeted_area') == $targetarea['target_id'] ? "selected" : "" }} value="{{ $targetarea['target_id'] }}">{{ $targetarea['short_code'] }} ({{ $targetarea['name'] }})</option>
                                              @endforeach
                                                    </select>
                                                    @error('targeted_area')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                           <div class="form-group row">
                                                <label class="col-md-3">
                                                    Distance <span class="red">*</span>
                                                </label>
                                                <div class="col-md-3">
                                                    <input value="{{ old('distance') }}" type="text" autocomplete="off" class="form-control" name="distance" />
                                                    @error('distance')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control">
                                                        <option>Select Unit</option>
                                                        <option>Meter (m)</option>
                                                        <option>Yard (y)</option>
                                                    </select>
                                                    @error('distance')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label class="col-md-3">
                                                    Switch Laps/Sets <span class="red">*</span>
                                                </label>
                                                <div class="col-md-9 radio-sec">
                                                    <label><input type="radio" class="" name="switchlaps" value="1month"> <span> Laps</span></label><br>
                                                    <label><input type="radio" class="" name="switchlaps" value="1year"> <span> Sets</span></label><br>
                                                    @error('switchlaps')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <!--                                                                              
                                                                                                                        </div>
                                                                                                                    </div>
                                            -->

                                            <div class="form-group row">
                                                <label class="col-md-3">
                                                    Intensity of Laps
                                                </label>
                                                <div class="col-md-3">
                                                    <input value="{{ old('distance') }}" type="text" autocomplete="off" class="form-control" name="distance" />
                                                    @error('distance')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                                 <div class="col-md-3">
                                                    <select class="form-control">
                                                        <option>Select Unit</option>
                                                        <option>Meter(m)</option>
                                                        <option>Yard(y)</option>
                                                    </select>
                                                    @error('distance')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                              
                                                <div class="col-md-3 ">
                                                    <select class="form-control" name="laps">
                                                         @php
                                            $laps = App\Lap::where('status','Active')->get();
                                            @endphp
                                                        <option>Select Laps</option>
                                                        @foreach($laps as $lap)
                                            <option {{ old('laps') == $lap['lap_id'] ? "selected" : "" }} value="{{ $lap['lap_id'] }}">{{ $lap['short_code'] }} ({{ $lap['intensity'] }})</option>
                                              @endforeach
                                                    </select>
                                                    @error('laps')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                               
                                            </div>

                                            
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-3">
                                                Rest
                                            </label>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                     <option>Beg</option>
                                                    <option>1000</option>
                                                    <option>4532</option>
                                                  
                                                </select>
                                                 <div class="form-group row">
                                                      <div class="col-md-3">
                                                <label class="j-rests">Beginner</label>
                                            </div>
                                            </div>
                                                @error('rest')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-md-3">
                                               
                                                <select class="form-control">
                                                     <option>Int</option>
                                                    <option>1548</option>
                                                    <option>2598</option>
                                                  
                                                </select>
                                                 <div class="form-group row">
                                                      <div class="col-md-3">
                                                <label class="j-rests">Intermediate</label>
                                            </div>
                                            
                                            </div>
                                                @error('rest')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-control">
                                                     <option>Adv</option>
                                                    <option>7895</option>
                                                    <option>9856</option>
                                                  
                                                </select>
                                                 <div class="form-group row">
                                                      <div class="col-md-3">
                                                <label class="j-rests">Advanced</label>
                                            </div>
                                            </div>
                                                @error('rest')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                       
                                         <div class="form-group row">
                                            <label class="col-md-3">
                                                Modifiers Type
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control">
                                                    <option>Select Modifier</option>
                                                    <option>O (On)</option>
                                                    <option>F (Off)</option>
                                                </select>
                                                @error('modifierstype')
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

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Pack
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="pack">
                                                       @php
                                            $packs = App\Package::where('status','Active')->get();
                                            @endphp
                                                    <option>Select Pack</option>
                                                     @foreach($packs as $pack)
                                            <option {{ old('pack') == $pack['package_id'] ? "selected" : "" }} value="{{ $pack['package_id'] }}">{{ $pack['name'] }}</option>
                                              @endforeach
                                                </select>
                                                @error('pack')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Image <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input value="{{ old('image') }}" type="file" autocomplete="off" class="form-control" name="image" />
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Activity

                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="activity">
                                                       @php
                                            $activities = App\Activity::where('status','Active')->get();
                                            @endphp
                                                    <option>Select Activity</option>
                                                     @foreach($activities as $activity)
                                            <option {{ old('activity') == $activity['activity_id'] ? "selected" : "" }} value="{{ $activity['activity_id'] }}">{{ $activity['name'] }}</option>
                                              @endforeach
                                                </select>
                                                @error('activity')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Type of Card <span class="red">*</span>

                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="card_type">
                                                       @php
                                            $types = App\Cardtype::where('status','Active')->get();
                                            @endphp
                                                    <option>Select Card Type</option>
                                                     @foreach($types as $type)
                                            <option {{ old('card_type') == $type['cardtype_id'] ? "selected" : "" }} value="{{ $type['cardtype_id'] }}">{{ strtoupper($type['type']) }}</option>
                                              @endforeach
                                                </select>
                                                @error('card_type')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Intensity of main card
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="maincard_intensity">
                                                      @php
                                            $colors = App\Maincard::where('status','Active')->get();
                                            @endphp
                                                    <option>Select</option>
                                                   @foreach($colors as $color)
                                            <option {{ old('maincard_intensity') == $color['maincard_id'] ? "selected" : "" }} value="{{ $color['maincard_id'] }}">{{ strtoupper($color['short_code']) }}({{$color['intensity']}})</option>
                                              @endforeach
                                                </select>
                                                @error('maincard_intensity')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3">
                                                Count of Lap <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <input value="{{ old('countoflaps') }}" type="text" autocomplete="off" class="form-control" name="countoflaps" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-3">
                                                Switch Rest/Raps <span class="red">*</span>
                                            </label>
                                            <div class="col-md-9 radio-sec">
                                                <label><input type="radio" class="" name="duration" value="1month"> <span> Rest</span></label><br>
                                                <label><input type="radio" class="" name="duration" value="1year"> <span> Raps</span></label><br>
                                                @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <!--<label class="col-md-4">-->
                                            <!--    <br><br><span class="red"></span>-->
                                            <!--</label>-->
                                            <!--<div class="col-md-8">-->

                                            <!--</div>-->
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-md-3">
                                                Tips/Learning
                                            </label>
                                            <div class="col-md-9">
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <option id="tips" value="yes">Y (Yes)</option>
                                                    <option id="learn" value="Free">N (No)</option>
                                                </select>
                                                @error('tips')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                             </div>
                                              </div>
                                               <div class="form-group row view">
                                       
                                        <div class="col-md-9 offset-md-3">
                                            <textarea rows="4" class="form-control" name="description"> {{ old('description')}}</textarea>
                                            @error('description')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                         <div class="form-group row">
                                            <br>
                                        </div>
                                       <div class="form-group row">
                                            <label class="col-md-3">
                                                Modifiers <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                 <ul class="modifiers_list">
                                                <li><input value="{{ old('modifiers') }}" type="text" autocomplete="off" class="form-control" name="modifiers" /></li>
                                               </ul>
                                                
                                            
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                              <div class="col-md-2 text-right">
                                                    <button type="button" name="addmore" id="addmore" class="btn btn-accent m-btn m-btn--air m-btn--custom">+</button>
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
top: 0px;
margin-right: 5px;
margin-left: 0px;
}
                </style>
                 <script>
 $(".view").hide();
$(document).ready(function(){
  $("#tips").click(function(){
    $(".view").show();
  });
  $("#learn").click(function(){
    $(".view").hide();
  });
});

$(document).ready(function(){
    $("#addmore").click(function(){
      $(".modifiers_list").append("<li class='added-li'><input  class='form-control'  placeholder='Enter Modifiers' type='text' name='' autocomplete='off' /><a class='btn btn-danger removebtn' href='#' onclick='parentNode.parentNode.removeChild(parentNode)'>-</a></li>");
});
});
</script>
                @endsection