@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Agent Management
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.addagent')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Add Agent">
                    <i class="fa fa-plus"></i>
                </a>
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
                            <input type="text" class="form-control" name="s" placeholder="Search" value="<?php echo (!empty($_REQUEST['s'])) ? $_REQUEST['s'] : "" ?>"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                            <?php if (isset($_REQUEST['search'])) { ?>
                                <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('admin.users.agents')}}"><i class="fa fa-times"></i></a>
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
                        <?php if ($agents->count() > '0') {
                            ?>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Agent Code</th>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Agent Type</th>
                                            <th>Created Date</th>
                                            <th>Login</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = ($agents->currentPage() > 1) ? $agents->currentPage() * $agents->perpage() : $agents->currentPage();
                                        foreach ($agents as $agent) {
                                            ?>
                                            <tr>
                                                <td width="5%"><?php echo $i; ?></td>
                                                <td><?php echo $agent->agent_code; ?></td>
                                                <td><?php echo $agent->first_name; ?></td>
                                                <td><?php echo $agent->email; ?></td>
                                                <td><?php echo $agent->agent_type; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($agent->datetime)); ?></td>  
                                                <!-- <td><?php echo $agent->status; ?></td> -->
                                                <td>
                                                    <a href="javascript:;" data-id="<?php echo $agent->user_id; ?>" data-toggle="modal" data-target="#update-login" class="update-login btn btn-secondary m-btn m-btn--air m-btn--custom btn-sm ">
                                                        <i class="fa fa-key"></i>
                                                    </a>  
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Edit Details" href="{{ route("admin.users.editagent", $agent->user_id) }}">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="View Details" href="{{ route("admin.users.agentview", $agent->user_id) }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a class="delete btn btn-secondary m-btn m-btn--air m-btn--custom" data-value="{{$agent['user_id']}}" href="{{ route('admin.users.delete',$agent['user_id']) }}">
                                                            <i class="fa fa-trash"></i>
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
                            @include('pagination.default', ['paginator' => $agents])
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
<div class="modal fade" id="update-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Agent Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" class="validation_form updateloginform" id="updateloginform" action="{{ route('admin.users.updateagentlogin') }}">

                <div class="modal-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" id="username" name="username" value=""/>
                        <?php echo csrf_field(); ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" id="password" name="password" value=""/>
                        <?php echo csrf_field(); ?>
                    </div>
                    <div id="server-error-message"class="error" style="color: #ee0000; font-size: 12px">
                    </div>
                    <input type="hidden" id="agent-id" name="agent-id"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

            </form>
        </div>
    </div>
</div>
<script>

//    var updatelogin = function () {
//        $.ajax({
//            url: "updateagentlogin",
//            type: "post",
//            data: $(".updateloginform").serialize(),
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
//            success: function (response) {
//                var res = JSON.parse(response);
//                //alert(response);
//                if (res.success) {
//                    document.getElementById('updateloginform').reset();
//                    // $('#update-login').modal('hide');
//                    // $('#server-error-message').html('');
//                    location.reload();
//                } else {
//                    $('#server-error-message').html(res.message);
//                }
//            },
//        });
//    };

  //  $(document).ready(function () {
//        $('.update-login').click(function () {
//            alert("dfs");
//
//            $('#server-error-message').html('');
//            $('#server-error-message').text('');
//            var id = $(this).attr('data-id');
//            $.ajax({
//                url: "getagentdetails",
//                type: "post",
//                data: {'id': id, '_token': '{{ csrf_token() }}'},
//                success: function (response) {
//                    alert(response);
//                    $('#username').val(username);
//                },
//            });
//            updatelogin();
//            $('#update-login').find('#agent-id').val(id);
//
//        });
   // });
//  $('.update-login').on('click', function () {
//     var id = $(this).attr('data-id');
//     $.ajax({
//         url: "updateagentpopup",
//         type: 'get',
//         data: {'id': id, '_token': '{{ csrf_token() }}'},
//         success: function (response) {
//             $('#update-login').modal('show');
//             $('#update-login').find('form').html(response);
//         }
//     });
// });

     $('#update-login').on('shown.bs.modal', function (event) {
         var button = $(event.relatedTarget) // Button that triggered the modal
         var modal = $(this)
         modal.find('#agent-id').val(button.attr('data-id'));
         modal.find('#status').val(button.attr('data-status'));
        
          $.ajax({
                url: "getagentdetails",
                type: "post",
                data: {'id': button.attr('data-id'), '_token': '{{ csrf_token() }}'},
                success: function (response) {
                    $('#username').val(response.agent_user_name);
                },
            });
            modal.find('#agent-id').val(button.attr('data-id'));
     });
</script>
<script>
    $('#category').change(function () {
        var category = $(this).val();
        $.ajax({
            url: '{{ route('admin.services.get_services') }}',
            type: 'post',
            data: {'category': category, '_token': '{{ csrf_token() }}'},
            success: function (response) {
                $('#service').html("<option value=''>Select Service</option>" + response);
            }
        });
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
 