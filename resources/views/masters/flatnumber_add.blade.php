@extends('layouts.admin')
@section('content')
<?php $requestdata = request(); ?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Add Flat Number Details
                </h3>
            </div>
            <div>
                <a href="{{route('masters.flatnumber_index')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  
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
                            <form method="post" action="{{ route('masters.flatnumber_store') }}" id="upload" class="validation_form" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-8 offset-md-2">
                                    <div class="m-section__content">
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Select Phase
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="phase">
                                                    @php
                                                    $phases = App\Phase::where('status','Active')->get();
                                                    @endphp
                                                    <option value=""> Select Phase</option>
                                                    @foreach($phases as $phase)
                                                    <option {{ old('phase_id') == $phase['phase_id'] ? "selected" : "" }} value="{{ $phase['phase_id'] }}">{{ $phase['phase_name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('phase')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Select Block
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="block">
                                                    @php
                                                    $blocks = App\Block::where('status','Active')->get();
                                                    @endphp
                                                    <option value=""> Select Block</option>
                                                    @foreach($blocks as $block)
                                                    <option {{ old('block_id') == $block['block_id'] ? "selected" : "" }} value="{{ $block['block_id'] }}">{{ $block['block_name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('block')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Select Floor
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="floor">
                                                    @php
                                                    $floors = App\Floor::where('status','Active')->get();
                                                    @endphp
                                                    <option value=""> Select Floor</option>
                                                    @foreach($floors as $floor)
                                                    <option {{ old('floor_id') == $floor['floor_id'] ? "selected" : "" }} value="{{ $floor['floor_id'] }}">{{ $floor['floor_name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('floor')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Select Flat Type
                                            </label>
                                            <div class="col-md-7">
                                                <select class="form-control" name="flattype">
                                                    @php
                                                    $flattypes = App\Flattype::where('status','Active')->get();
                                                    @endphp
                                                    <option value=""> Select Flattype</option>
                                                    @foreach($flattypes as $flattype)
                                                    <option {{ old('flattype_id') == $flattype['flattype_id'] ? "selected" : "" }} value="{{ $flattype['flattype_id'] }}">{{ $flattype['flattype_name'] }}</option>
                                                    @endforeach
                                                </select>
                                                @error('flattype')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-5">
                                                Flat Number <span class="red">*</span>
                                            </label>
                                            <div class="col-md-7">
                                                <input value="{{ old('flatnumber') }}" type="text" autocomplete="off" class="form-control" name="flatnumber" />
                                                @error('flatnumber')
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
@endsection