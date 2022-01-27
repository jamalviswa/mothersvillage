@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Payment Report
                </h3>
            </div>
            <div>

            </div>
        </div>
    </div>
    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section__content">
                    <form method="GET" class="search-form form-inline" action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" name="s" placeholder="Search"  @if(isset($_REQUEST['s'])) value="{{ $_REQUEST['s'] }}" @else value="" @endif/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                            <?php if (isset($_REQUEST['search'])) { ?>
                                <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('payments.index')}}"><i class="fa fa-times"></i></a>
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

                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th> S.No </th>
                                        <th>Name</th>
                                        <th>Mobile No</th>
                                        <th>Package</th>

                                        <th>Payment Date</th>
                                        <th>User Type</th>
                                        <th>Amount</th>

                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <tr>
                                        <td>1 </td>
                                        <td>John </td>
                                        <td>87452136</td>
                                        <td>Monthly Subscription</td>

                                        <td>26/06/2021</td>
                                        <td>Premium User</td>
                                        <td> 250 </td>
                                    </tr>
                                    <tr>
                                        <td>2 </td>
                                        <td>Joseph </td>
                                        <td>89745621</td>
                                        <td>Package 1 </td>

                                        <td>27/06/2021</td>
                                        <td>Free User</td>
                                        <td>700</td>

                                    </tr>
                                    <tr>
                                        <td>3 </td>
                                        <td>Francis </td>
                                        <td>98745622</td>
                                        <td>Package 2 </td>

                                        <td>28/06/2021</td>
                                        <td>Premium User</td>
                                        <td>600</td>

                                    </tr>
                                    <tr>
                                        <td>4 </td>
                                        <td>Keith </td>
                                        <td>97854611</td>
                                        <td>Package 3 </td>

                                        <td>29/06/2021</td>
                                        <td>Premium User</td>
                                        <td>800</td>

                                    </tr>


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: #F26C4F;
        opacity: 1;
        color: #fff;
        text-align: center;
        padding: 11px !important;
        font-size: 20px;
    }
</style>
@endsection
