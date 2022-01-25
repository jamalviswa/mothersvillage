@extends('layouts.admin')
@section('content')
<?php 
$requestdatas = (!empty(old())) ? old() : $detail;
//print_r($requestdatas); 
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Edit Service Provider
                </h3>
            </div> 
            <div>
                <a href="{{route('admin.users.sproviders')}}" rel="tooltip" title="" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--outline-2x m-btn--air m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle" data-original-title="Back to Service providers">
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
                           <form method="post" id="upload" action="{{ route('admin.users.update_sprovider',$detail['user_id']) }}" class="validation_form" enctype="multipart/form-data">
                            @csrf
                             <input type="hidden" name="id" class="id" value="{{$detail['user_id']}}">
                            <div class="col-md-6 offset-md-3">
                                <div class="m-section__content">
                                  <div id="err"></div>
                                <div class="form-group row">
                                        <label class="col-md-4">                                          
                                            Category <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                             <?php //print_r($requestdatas['category_id']);exit; ?>
                                        <select style="height: 34px !important;" class="form-control" name="category_id" id="category">
                                           
                                            @php
                                            $categories = App\Category::where('status','Active')->get();
                                           @endphp
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option <?php echo $requestdatas['category_id'] == $category['id'] ? "selected" : "" ?> value="{{ $category['id'] }}">{{ $category['category'] }}</option>
                                              @endforeach
                                            </select>
                                            @error('category_id')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>  
                                    @if(!empty($requestdatas['services_id']))
                                    
                                    <div class="form-group row service_list ">
                                        <label class="col-md-4">
                                            Services
                                        </label>
                                        <div class="col-md-8" style="font-size: 13px;">
                                            <input type="checkbox" class="selectall" /> Select All <br>
                                            <div id="service">
                                                <?php 
                                                $services = App\Service::where('category', '=', 6)->where('status', "Active")->get();
                                               
                                                $ser_id=explode(',',$requestdatas['services_id']);    
                                                foreach ($services as $key => $value) {
                                                   if(in_array($value->service_id,$ser_id)){
                                                  ?>     
                                                    <span><input type='checkbox' checked class='individual' name='service[]'  value='{{$value->service_id}}' >{{$value->name}}<br></span>
                                                    <?php }
                                                    else{
                                                        ?>
                                                      <span><input type='checkbox' class='individual' name='service[]'  value='{{$value->service_id}}' >{{$value->name}}<br></span>
                                                  <?php  } 
                                                } 
                                              
                                              ?>
                                    </div>
                                    </div>
                                    </div>
                                    @endif
                                    @if(empty($requestdatas['services_id']))
                                     <div class="form-group row service_list hide">
                                        <label class="col-md-4">
                                            Services
                                        </label>
                                        <div class="col-md-8" style="font-size: 13px;">
                                            <input type="checkbox" class="selectall" /> Select All <br>
                                            <div id="service"></div>
                                            @error('company_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Company Name  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="company_name" value="{!! $requestdatas['company_name'] !!}" />
                                            @error('company_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            First Name  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="first_name" value="{!! $requestdatas['first_name'] !!}" />
                                            @error('first_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Last Name  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="last_name" value="{!! $requestdatas['last_name'] !!}" />
                                            @error('last_name')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Gender <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8 radio-sec">
                                              <input {!! ($requestdatas['gender'] == "Male") ? "checked" : "" !!} type="radio" class="" name="gender" value="Male"> <span> Male</span><br>
                                                <input {!! ($requestdatas['gender'] == "Female") ? "checked" : "" !!} type="radio" class="" name="gender" value="Female"> <span> Female</span><br>
                                            @error('gender')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Email  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control" name="email" value="{!! $requestdatas['email'] !!}" />
                                            @error('email')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Mobile  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="mobile" value="{!! $requestdatas['mobile'] !!}" />
                                            @error('mobile')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Address  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <textarea rows="4" class="form-control" name="address">{!! $requestdatas['address'] !!}</textarea>
                                            @error('address')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            Profile  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control validate[custom[image]] " name="profile"/>
                                             @if(!empty($detail['idproof']))
                                                <a href="{{URL::to('public/files/proof/'.$detail['profile'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/proof/'.$detail['profile'].'')}}" class="img-sm"/>
                                                </a>
                                                @else                                               
                                                
                                                @endif
                                                @error('profile')
                                              <span class="invalid-feedback" role="alert">
                                                 {{ $message }}
                                              </span>
                                             @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4">
                                            ID Proof  <span class="red">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input type="file" class="form-control validate[custom[image]] " name="idproof"/>
                                             @if(!empty($detail['idproof']))
                                                <a href="{{URL::to('public/files/proof/'.$detail['idproof'].'')}}" download target="_blank" ><img src="{{URL::to('public/files/proof/'.$detail['idproof'].'')}}" class="img-sm"/>
                                                </a>
                                                @else                                               
                                                
                                                @endif
                                                @error('idproof')
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
<style>
    .radio-sec input {
    position: relative;
    top: 4px;
    margin-right: 11px;
    margin-left: 10px;
}
</style>
<script>
// $('#category').change(function () {
//     var category=$(this).val();
//     var category=$(this).val();
//     $.ajax({
//                     url: '{{ route('admin.services.get_selected_services') }}',
//                     type: 'post',
//                     data: {'category': category, '_token': '{{ csrf_token() }}'},
//                     success: function (response) {
//                     $.each(response.data,function(k,v){
//                         '<option value=""></option>';
//                     });
//                     $('#service').html(response);
//                     }
//                 });
//             });
            
// $(document).ready(function () {
//   $('#category').trigger('change');

//     $('#service').select2({
//         placeholder:'Select'
//     });

//     var category=$('#category').val();
//     var detail_id={{$detail['id']}};
//     // console.log(category);
//     $.ajax({
//         url: '{{ route('admin.services.get_selected_services') }}',
//         type: 'post',
//         data: {'category': category,'sproviders_id':detail_id, '_token': '{{ csrf_token() }}'},
//       dataType: 'json',   //No I18N
//         success: function (response) {
//           var subject='';
//           $.each(response.data,function(k,v){
            
//             subject+='<option value="'+v['id']+'">'+v['name']+' - '+v['subject_name']+'</option>';
//           });
//           $('#service').html(subject);
//         }
//     });
    // $('#upload').on('submit',function(){
        
    //         $.ajax({
    //             url: '{{ route('admin.users.update_sprovider',$detail['user_id']) }}',
    //             type: 'post',
    //             dataType: 'json',
    //             data: new FormData(this),
    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             success: function (response) {
    //                 alert(response.message);
    //                 location.reload();
    //             },
    //             error: function (response) {
    //                 var errors = $.parseJSON(response.responseText);
    //                 // console.log(errors.errors);
    //                 var err=""
    //                 $.each(errors.errors, function (key, value) {
    //                     $.each(value,function(err_k,err_v){
    //                         // err+="<p style='color:red'>"+err_v+"</p><br>"
    //                         err+='<div id="msg" class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>' + err_v + '</div>';

    //                     })
                        
                    
    //                     // $('[name="'+key+'"]').parent().addClass('error');
    //                 });
    //                     $('#err' ).html(err);
    //                     $('#err').focus();
    //             }
    //         });
    //         return false;
    //     });
// });
$('#category').change(function () {
    var category=$(this).val();
    var id= $('.id').val();
   if(category=='6'){
       $('.service_list').removeClass('hide');
        $.ajax({
                    url: '{{ route('admin.services.edit_get_services') }}',
                    type: 'post',
                    data: {'category': category,'id':id, '_token': '{{ csrf_token() }}'},
                    success: function (response) {
                        $('#service').html(response);
                    }
                }); 
    }else{
        $('.service_list').addClass('hide');
    }
    });
           
$(".selectall").click(function(){
$(".individual").prop("checked",$(this).prop("checked"));
});

</script>
@endsection