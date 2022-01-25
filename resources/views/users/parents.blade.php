@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Parent List
                </h3>
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
                                    <input type="text" class="form-control" name="s" placeholder="Search" autocomplete="off" value="<?php echo (!empty($_REQUEST['s'])) ? $_REQUEST['s'] : "" ?>"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit"  name="search"><i class="fa fa-search"></i></button>
                                    <?php if (isset($_REQUEST['search'])) { ?>
                                        <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('admin.users.parents')}}"><i class="fa fa-times"></i></a>
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
                    <?php  if ($parents->count() > '0') { ?>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Registered Date</th>
                                             <th>Status</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = ($parents->currentPage() > 1) ? $parents->currentPage() * $parents->perpage() : $parents->currentPage();
                                        foreach ($parents as $student) {
                                            ?>
                                            <tr>
                                                <td width="5%"><?php echo $i; ?></td>
                                                <td><?php echo $student->first_name; ?></td>
                                                <td><?php echo !empty($detail['last_name'])? $detail['last_name'] : "-"; ?></td>
                                                <td><?php echo $student->email; ?></td>
                                                <td><?php echo $student->mobile; ?></td>
                                                <td><?php echo $student->gender; ?></td>
                                                <td><?php echo date('d-m-Y',strtotime($student->datetime)); ?></td>  
                                                 <td>
                                                      <a href="javascript:;" data-status="<?php echo $student->status; ?>" data-id="<?php echo $student->user_id; ?>" data-toggle="modal" data-target="#update-status" class="btn btn-secondary m-btn m-btn--air m-btn--custom btn-sm btn-<?php echo $student->status; ?>">
                                                     <?php echo ($student->status == "Active") ? "Approved" : "Pending"; ?>
                                                     </a> 
                                                 </td> 
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="View Details" href="{{ route("admin.users.parentview", $student->user_id) }}">
                                                        <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>                                             
                                            </tr>
                                            <?php
                                            $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        {!! $parents->appends(\Request::except('page'))->render() !!}
 <!--@include('pagination.default', ['paginator' => $parents])-->
                        <?php } else { ?>
                            <div class="text-center">
                                <img src="<?php echo asset('admin/img/no-record.png'); ?>"
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="update-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Post Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="post" class="validation_form" action="{{ route('admin.users.updateStatus') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control validate[required]" id="status" name="status">
                                <option value="">--Select--</option>
                                <option value="Inactive">Pending</option>
                                <option value="Active">Approve</option>
                            </select>
                            <input type="hidden" id="user_id" name="user_id"/>
                            <?php echo csrf_field(); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#update-status').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            modal.find('#user_id').val(button.attr('data-id'));
            modal.find('#status').val(button.attr('data-status'));
        });
    </script>
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
