@extends('layouts.admin')
@section('content')
<?php //if ($results->count() > '0') {
?>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Block Details
                </h3>
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
                            <div class="m-section__content">
                                <div class="row ul-type">
                                    <div class="col-lg-12 col-sm-12 col-md-12">
                                        <ul class="m-0 p-0">
                                            <?php
                                            $blocks = App\Block::where('status', 'Active')->get();
                                            foreach ($blocks as $block) {
                                            ?>
                                                <li>
                                                    <div class="j-typebox">
                                                        <input type="button" class="j-type date-btn" value="<?php echo $block->block_name ?>">
                                                    </div>

                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <!-- <div class="col-md-2 j-typebox"  style="background-color:#ffff45;">
                                        <p class="j-type" id="phase"><?php echo $block->block_name ?></p>
                                    </div> -->


                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-2 j-typebox" style="background-color:#ffff45;">
                                        <p class="j-type">1 BHK</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#c7f8ca;">
                                        <p class="j-type">2 BHK</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#7ea1fa;">
                                        <p class="j-type">2 BHK P</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#a7905a;">
                                        <p class="j-type">2 BHK SP</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#ffa9ff;">
                                        <p class="j-type">3 BHK</p>
                                    </div>
                                    <div class="col-md-2 j-typebox" style="background-color:#21ffff;">
                                        <p class="j-type">3 BHK P</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="block hide">
                            <hr>
                            <div class="row" id="block">

                            </div>
                        </div>





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //  $('#phase').change(function() {
    //     var phase = $(this).val();
    //     $.ajax({
    //         url: "{{route('blocks.map')}}",
    //         type: 'POST',
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "phase": phase
    //         },
    //         dataType: 'html',
    //         success: function(data) {
    //             $('.block').removeClass('hide');
    //             $("#block").html(data);
    //         }
    //     });
    // });

    $(document).on("click", ".date-btn", function() {
        var phase = $(this).val();
        $(this).css('background-color', 'green');
        $(this).css('color', '#fff');
        $(".date-btn").not($(this)).css('background-color', '#ffff45');
        $(".date-btn").not($(this)).css('color', '#222');
        jQuery.ajax({
            type: "post",
            url: "{{route('blocks.map')}}",
            data: {
                "_token": "{{ csrf_token() }}",
                "phase": phase
            },
            dataType: "html",
            success: function(data) {
                $('#block').html(data);
                $('.block').removeClass('hide');
            }
        });
    });
</script>
<style>
    .ul-type ul {
        list-style: none;
        display: flex;
        justify-content: space-evenly;
    }

    .j-typebox .j-type {
        font-size: 25px;
        font-weight: 600;
        text-align: center;
        color: black;
        border-radius: 20px;
        height: 150px;
        cursor: pointer;
        width: 150px;
        background-color: #21ffff;
    }


    .col-md-2.j-box.lab-2.BHK {
        background-color: #c7f8ca;
    }
    .col-md-2.j-box.lab-1.BHK {
        background-color: #ffff45;
    }
    .col-md-2.j-box.lab-3.BHK {
        background-color: #ffa9ff;
    }
    .col-md-2.j-box.lab-2.BHK.P{
        background-color: #7ea1fa;
    }
    .col-md-2.j-box.lab-2.BHK.SP{
        background-color: #a7905a;
    }
    .col-md-2.j-box.lab-3.BHK.P{
        background-color: #21ffff;
    }

    .j-box {
        height: 115px;
        border: 2px solid BLACK;
        border-radius: 20px;
        text-align: center;
        background-color: #fff;
        max-width: 120px;
        margin-left: 20px;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .j-numb {
        color: #222;
        font-size: 20px;
        text-align: center;
        padding-top: 30px;
        cursor: pointer;
        font-weight: 600;
    }
</style>
@endsection