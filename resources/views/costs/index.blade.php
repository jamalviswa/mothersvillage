@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Cost Details List
                </h3>
            </div>
            <div>
                <a href="{{route('costs.add')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Add Cost Details">
                    <i class="la la-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section__content    ">
                    <form method="GET" class="search-form form-inline " action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" autocomplete="off" name="s" placeholder="Search" @if(isset($_REQUEST['s'])) value="{{ $_REQUEST['s'] }}" @else value="" @endif />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                            <?php if (isset($_REQUEST['search'])) { ?>
                                <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('costs.index')}}"><i class="fa fa-times"></i></a>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                        <?php if ($results->count() > '0') {
                        ?>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Application Number</th>
                                            <th>Applicant Name</th>
                                            <th>Rate per SQFT</th>
                                            <th>Salable Area</th>
                                            <th>UDS Area</th>
                                            <th>Guideline Value</th>
                                            <th>Land Cost</th>
                                            <th>Construction Cost</th>
                                            <th>Gross Amount</th>
                                            <th>Total Amount</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       
                                        $i = ($results->currentpage() - 1) * $results->perpage() + 1;
                                        foreach ($results as $result) {
                                        ?>
                                            <tr>
                                                <td width="5%">{{ $i }}</td>
                                                <td>{{ $result->application_number }}</td>
                                                <td>{{ $result->applicant_name }}</td>
                                                <td>{{ $result->rate_sqft }}</td>
                                                <td>{{ $result->sal_area }}</td>
                                                <td>{{ $result->uds_area }}</td>
                                                <td>{{ $result->guideline_value }}</td>
                                                <td>{{"Rs. "}}{{ $result->land_cost }}</td>
                                                <td>{{"Rs. "}}{{ $result->construction_cost }}</td>
                                                <td>{{"Rs. "}}{{ $result->gross_amount }}</td>
                                                <td>{{"Rs. "}}{{ $result->total_amount }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="View" href="{{ route("costs.view", $result->cost_id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Edit" href="{{ route("costs.edit", $result->cost_id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            {!! $results->appends(\Request::except('page'))->render() !!}
                            <!--@include('pagination.default', ['paginator' => $results])-->
                        <?php } else { ?>
                            <div class="text-center">
                                <img src="{{ asset('admin/img/no-record.png') }}">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection