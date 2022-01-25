@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Pack List
                </h3>
            </div>
            <div>
                <a href="{{route('packages.add')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Add Pack">
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
                        <div class="m-section__content">
                            <form method="GET" class="search-form form-inline" action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="s" placeholder="Search"  @if(isset($_REQUEST['s'])) value="{{ $_REQUEST['s'] }}" @else value="" @endif/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                                    <?php if (isset($_REQUEST['search'])) { ?>
                                        <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('packages.index')}}"><i class="fa fa-times"></i></a>
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
                          <?php  if ($results->count() > '0') {
                         ?>
                        <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>Pack Name</th>
                                            <th>Pack Type</th>
                                            <th>No of Cards</th>
                                            <th>Price ($)</th>
                                            <th>Category</th>
                                            <th>Duration</th>
                                            <th>status</th>
                                             <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                     <?php
                                        $i = ($results->currentPage() > 1) ? $results->currentPage() * $results->perpage() : $results->currentPage();
                                        foreach ($results as $result) {
                                              $cat=App\Category::where('category_id',$result['category'])->first();
                                           ?>
                                        <tr>
                                            <td width="5%">{{ $i }}</td>
                                           <td>{{ $result->name }}</td>
                                           <td>{{ $result->pack}}</td>
                                           <td>{{ $result->num_cards }}</td>
                                           <td>{{ $result->price }}</td>
                                          <td>{{ $cat['name'] }}</td>
                                           <td>{{ $result->duration }}</td>
                                           <td>
                                                  <a rel="tooltip" title='Update Status' href="javascript:;" data-status="<?php echo ($result['status'] )?>" data-id="<?php echo $result['package_id']; ?>" data-toggle="modal" data-target="#update-status" class="btn btn-secondary m-btn m-btn--air m-btn--custom btn-sm btn-<?php echo $result['status'] ?>">
                                                    {{ $result['status'] }}
                                                      </a>  
                                           </td>
                                           
                                            <td class="text-center">
                                                    <div class="btn-group">
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Edit" href="{{ route("packages.edit", $result->package_id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                        </a>
                                                        
                                                        <!--<a rel="tooltip"  class="delete btn btn-secondary m-btn m-btn--air m-btn--custom" title="Delete" data-value="{{$result['package_id']}}" href="{{ route('packages.delete',$result['package_id']) }}">-->
                                                        <!--<i class="fa fa-trash"></i>-->
                                                        <!--</a>-->
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
                                <img src="{{ asset('admin/img/no-record.png') }}"
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <div class="modal fade" id="update-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Update Pack Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form method="post" class="validation_form" action="{{ route('packages.updateStatus') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <select class="form-control validate[required]" id="status" name="status">
                                <option value="">--Select--</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                
                            </select>
                            <input type="hidden" id="package_id" name="package_id"/>
                            
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
</div>
 <script>
        $('#update-status').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var modal = $(this)
            modal.find('#package_id').val(button.attr('data-id'));
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
