@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Customer Official List
                </h3>
            </div>
            <div>
                <a href="{{route('customers.official_add')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Add New">
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
                            <input type="text" class="form-control" name="s" placeholder="Search" @if(isset($_REQUEST['s'])) value="{{ $_REQUEST['s'] }}" @else value="" @endif />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                            <?php if (isset($_REQUEST['search'])) { ?>
                                <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('customers.official_index')}}"><i class="fa fa-times"></i></a>
                            <?php } ?>
                        </div>
                        <!-- <div class="btnright">
                       
                            <button type="button" class="btn m-1 btn-warning ">CSV</button>
                            <button type="button" class="btn  m-1  btn-info  ">Print</button>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
                        <?php if ($results->count() > '0') { ?>
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Profile</th>
                                        <th>Applicant Name</th>
                                        <th>Father/Spouse Name</th>
                                        <th>Age</th>
                                        <th>email</th>
                                        <th>Gender</th>
                                        <th>Mobile Number</th>
                                        <th>Occupation</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = ($results->currentPage() > 1) ? $results->currentPage() * $results->perpage() : $results->currentPage();
                                        foreach ($results as $result) {
                                    ?>
                                    <tr>
                                        <td width="5%">{{ $i }}</td>
                                        <td class="text-center">
                                            @if(!empty($result['photo']))
                                                <a href="{{URL::to('/files/customers/'.$result['photo'].'')}}"  target="_blank" ><img src="{{URL::to('/files/customers/'.$result['photo'].'')}}" width="50" height="50"/>
                                                </a>
                                                @endif
                                                </td>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->fathers_name }}</td>
                                        <td>{{ $result->age }}</td>
                                        <td>{{ $result->email }}</td>
                                        <td>{{ $result->gender }}</td>
                                        <td>{{ $result->phone }}</td>
                                        <td>{{ $result->occupation }}</td>

                                               
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Edit" href="{{ route("customers.official_edit", $result->customer_id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        @if($sessionadmin->adminname == "Admin")
                                                        <a rel="tooltip" class="delete btn btn-secondary m-btn m-btn--air m-btn--custom" title="Delete" data-value="{{$result['customer_id']}}" href="{{ route('customers.official_delete',$result['customer_id']) }}">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        @endif
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

<style>
    .form-control:disabled,
    .form-control[readonly] {
        background-color: #F26C4F;
        opacity: 1;
        color: #fff;
        text-align: center;
        padding: 11px !important;
        font-size: 20px;
    }
</style>
@endsection