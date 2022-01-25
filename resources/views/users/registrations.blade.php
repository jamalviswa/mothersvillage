@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    <?php echo $event->post_title; ?> - Registrations
                </h3>
            </div>
            <div>
                <a href="<?php echo url(); ?>/admin/events/exportregistrations/<?php echo $event->ID; ?>" rel="tooltip" title="Export" class="m-portlet__nav-link btn  btn-secondary  m-btn m-btn--outline-2x m-btn--air  m-btn--pill  m-dropdown__toggle" data-original-title="Export">
                    Export
                </a>
            </div>
        </div>
    </div>
    <!-- END: Subheader -->

    <div class="m-content">
        <div class="row">
            <div class="col-md-3">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        @include('eventsidebar')
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <form method="post" action="<?php echo url(); ?>/admin/events/updateParticipant" class="validation_form">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <div class="form-group row ml-0">
                                <div class="mr-3">
                                    <select class="form-control" name="status">
                                        <option value="Pending">Pending</option>
                                        <option value="Active">Approved</option>
                                        <option value="Trash">Rejected </option>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                                </div>
                            </div>
                            <!--begin::Section-->
                            <div class="m-section">
                                <div class="m-section__content">
                                    <?php if (count($bookings) > 0) { ?>
                                        <div class="table-responsive">
                                            <table class="table m-table m-table--head-bg-brand" id="data-table">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="checkall"/></th>
                                                        <th>#</th>
                                                        <th>User Name</th>
                                                        <th>Gender</th>
                                                        <th>NRIC/EP</th>
                                                        <th>Mobile No.</th>
                                                        <th>Email Address</th>
                                                        <th>Event Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    foreach ($bookings as $booking) {
                                                        ?>
                                                        <tr>
                                                            <td><input type="checkbox" class="checkparticipant" name="id[]" value="<?php echo $booking->participant_id; ?>"/></td>
                                                            <td><?php echo $i; ?></td>
                                                            <td>
                                                                <?php echo $booking->full_name; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $booking->gender; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $booking->nric_no; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $booking->mobile; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $booking->emailid; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo date('d M, Y', strtotime($meta_data['event_date'])); ?>
                                                            </td>
                                                            <td>
                                                                <a data-toggle="modal" title="Update Status" data-status="<?php echo $booking->status; ?>" data-id="<?php echo $booking->participant_id; ?>" href="javascript:;" data-toggle="modal" data-target="#updatestatus" class="label label-<?php echo $booking->status; ?>">
                                                                    <?php
                                                                    if ($booking->status == "Active") {
                                                                        echo "Approved";
                                                                    } else if ($booking->status == "Pending") {
                                                                        echo "Pending";
                                                                    } else {
                                                                        echo "Rejected";
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a class="delconfirm" href="<?php echo url(); ?>/admin/events/removeParticipant/<?php echo $booking->participant_id; ?>">Remove</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php } else { ?>
                                        <div class="text-center">
                                            <img src="<?php echo asset('img/no-record.png'); ?>"
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <?php echo csrf_field(); ?>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="updatestatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Status</h4>
            </div>
            <form method="post" action="<?php echo url(); ?>/admin/events/updateParticipant">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" name="status" id="status">
                            <option value="Pending">Pending</option>
                            <option value="Active">Approved</option>
                            <option value="Trash">Rejected </option>
                        </select>
                        <input type="hidden" id="id" name="id[]"/>
                        <?php echo csrf_field(); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .label.label-Pending {
        background: blue;
        color: #fff;
        font-weight: 600;
        padding: 1px 7px;
    }.label.label-Active{
        background: green;
        color: #fff;
        font-weight: 600;
        padding: 1px 7px;
    }.label.label-Trash {
        background: red;
        color: #fff;
        font-weight: 600;
        padding: 1px 7px;
    }
</style>
<script>
    $('#updatestatus').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find('#id').val(button.attr('data-id'));
        modal.find('#status').val(button.attr('data-status'));
    });

    $(document).on('click', '#checkall', function() {
        if ($(this).is(':checked')) {
            $('.checkparticipant').prop('checked', true);
        }else{
            $('.checkparticipant').prop('checked', false);
        }
    });
</script>@endsection

