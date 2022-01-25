@extends('layouts.admin')
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Service Providers
                </h3>
            </div>
            <div>
                <a href="{{route('admin.users.addsprovider')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Add Service Provider">
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
                                <select class="form-control" name="category" id="category">
                                            @php
                                            $categories = App\Category::where('status','Active')->get();
                                            @endphp
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option @if(isset($_REQUEST['category']) && $_REQUEST['category'] == $category['id']) selected  @endif value="{{ $category['id'] }}">{{ $category['category'] }}</option>
                                              @endforeach
                                            </select>
                                </div>
                                                                <div class="form-group">
                                <!-- <select class="form-control" name="service" id="service">
                                            <option value="">Select Service</option>
                                            @if(!empty($_REQUEST['category']))
                                            @php
                                            $services = App\Service::where('status','Active')->where('category',$_REQUEST['category'])->get();
                                            @endphp
                                            @foreach($services as $service)
                                            <option @if(isset($_REQUEST['service']) && $_REQUEST['service'] == $service['service_id']) selected  @endif value="{{ $service['service_id'] }}">{{ $service['name'] }}</option>
                                              @endforeach
                                              @endif
                                </select> -->
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary m-btn m-btn--air m-btn--custom" type="submit" name="search"><i class="fa fa-search"></i></button>
                                    <?php if (isset($_REQUEST['search'])) { ?>
                                        <a class="btn btn-danger m-btn m-btn--air m-btn--custom" href="{{route('admin.users.sproviders')}}"><i class="fa fa-times"></i></a>
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
                        <?php  if ($sproviders->count() > '0') { 
                         ?>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th> # </th>
                                            <th>First Name</th>
                                            <th>Company Name</th>
                                            <th>Category</th>
                                            <th>Email</th>                                            
                                            <th>Registered Date</th>
                                            <!-- <th>Status</th> -->
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = ($sproviders->currentPage() > 1) ? $sproviders->currentPage() * $sproviders->perpage() : $sproviders->currentPage();
                                        foreach ($sproviders as $student) {
                                            // var_dump($student->service_id);
                                            //  $service = App\Subject_provider::join('service_based_subjects as b','subject_provider.subject_id','=','b.id')->join('services as c','b.service_id','=','c.service_id')->where('sprovider_details_id',$student->id)->where('subject_provider.status','Active')->where('b.status','Active')->get();
                                             // print_r($service);
                                            $category = App\Category::where('id',$student->category_id)->first();
                                            $subject_name="";
                                            $j=1;
                                            // foreach($service as $ser_val){
                                            //     if($j==1){
                                            //         $subject_name.=$ser_val['name'].' - '.$ser_val['subject_name'];
                                            //     }
                                            //     else{
                                            //         $subject_name.=', '.$ser_val['name'].' - '.$ser_val['subject_name'];
                                            //     }
                                            //     $j++;
                                            // }
                                            ?>
                                            <tr>
                                                <td width="5%"><?php echo $i; ?></td>
                                                <td><?php echo $student->first_name; ?></td>
                                                <td><?php echo $student->company_name; ?></td>
                                                <td><?php echo !empty($category['category'])?$category['category']:"-"; ?></td>
                                                <td><?php echo $student->email; ?></td>                                                
                                                <td><?php echo date('d-m-Y',strtotime($student->datetime)); ?></td>  
                                                <!-- <td><?php echo $student->status; ?></td> -->
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="Edit Details" href="{{ route("admin.users.editsprovider", $student['user_id']) }}">
                                                        <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a rel="tooltip" class="btn btn-secondary m-btn m-btn--air m-btn--custom" title="View Details" href="{{ route("admin.users.sproviderview", $student->user_id) }}">
                                                        <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a  rel="tooltip" class="delete btn btn-secondary m-btn m-btn--air m-btn--custom" title="Delete" data-value="{{$student['user_id']}}" href="{{ route('admin.users.delete',$student['user_id']) }}">
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
                                {!! $sproviders->appends(\Request::except('page'))->render() !!}
                            <!--@include('pagination.default', ['paginator' => $sproviders])-->
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
<script>
$('#category').change(function () {
    var category=$(this).val();
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
