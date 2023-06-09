<style>
    ul.nav li.dropdown:hover>ul.dropdown-menu {
        display: block;
    }

    @media (min-width: 979px) {
        ul.nav li.dropdown:hover>ul.dropdown-menu {
            display: block;
        }
    }
</style>

<div class="main-content" role="main">
    <div class="main-inner">

        <section class="match-content">
            <div class="table_tittle">
                <span class="lable-user-name">
                    CLIENT LIVE BETS REPORT
                </span>
                <button class="btn btn-xs btn-primary" onclick="goBack()">Back</button>
            </div>
             
                <div class="clearfix data-background">
                     <input type="hidden" name="ajaxUrl" id="ajaxUrl" value="bethistory">
                    <form method="post" id="formSubmit" class="form-horizontal form-label-left input_mask"><input type="hidden" name="compute" value="3d52c13ced1cebb6db5450515eee8422">
                        <input type="hidden" name="sportId" id="sportId" value="4">
                        <input type="hidden" name="perpage" id="perpage" value="10">
                        <div  class="col-md-2 col-xs-6">
                            <input type="text" name="from_date" value="<?php echo date('Y-m-d', strtotime("-1 days")); ?>" id="from-date" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="From date" autocomplete="off">
                        </div>
                        <div  class="col-md-2 col-xs-6">
                            <input type="text" name="to_date" value="<?php echo date('Y-m-d'); ?>" id="to-date" class="form-control col-md-7 col-xs-12 has-feedback-left" placeholder="To date" autocomplete="off">
                        </div>
                        <div  class="col-md-2 col-xs-6">
                            <input type="text" name="searchTerm" value="" id="mstruserid" maxlength="100" size="50" class="form-control" placeholder="Search">
                        </div>
                        <div  class="col-md-2 col-xs-6">
                            <select class="form-control" name="betStatus" id="betStatus">
                                <option value="All">Match/Unmatch</option>
                                <option value="Match">Match</option>
                                <option value="Unmatch">Unmatch</option>
                            </select>
                        </div>
                        <div  class="col-md-2 col-xs-6">
                            <select class="form-control" name="pStatus" id="pStatus">
                                <option value='Open'>Open</option>
                                <option value="Settled" selected>Settled</option>
                            </select>
                        </div>
                        <div  class="col-md-2 col-xs-6">
                            <button type="button" onclick="filterdata()" name="submit"  style="width:100%;" class="btn btn-success" id="submit_form_button" value="filter" data-attr="submit"><i class="fa fa-filter"></i> Filter
                            </button>
                           
                        </div>
                    </form>
                </div>
             
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="tab_bets get-mchlist">
                    <ul id="betsalltab" class="nav nav-pills match-lists">

                        <li class="active">
                            <a onclick="customGap(5)" id="sport-5" dat-attr="5">All</a>
                        </li>
                        <?php
                        if (!empty($event_types)) {
                            foreach ($event_types as $event_type) {
                                if ($event_type['is_casino'] == 'Yes') {
                                    continue;
                                }
                        ?>
                                <li>
                                    <a onclick="customGap(<?php echo $event_type['event_type']; ?>)" id="sport-<?php echo $event_type['event_type']; ?>" dat-attr="<?php echo $event_type['event_type']; ?>"><?php echo $event_type['shortname']; ?></a>
                                </li>

                        <?php }
                        }
                        ?>




                        <li class="">
                            <a onclick="customGap(10)" id="sport-10" dat-attr="10">Fancy</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Casino
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if (!empty($event_types)) {
                                    foreach ($event_types as $event_type) {
                                        if ($event_type['is_casino'] == 'No') {
                                            continue;
                                        }
                                ?>
                                        <li>
                                            <a onclick="customGap(<?php echo $event_type['event_type']; ?>)" id="sport-<?php echo $event_type['event_type']; ?>" dat-attr="<?php echo $event_type['event_type']; ?>"><?php echo $event_type['shortname']; ?></a>
                                        </li>

                                <?php }
                                }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                <div id="divLoading"></div>
                <!--Loading class -->
                <div class="col-md-12 table-scroll " id="stack" style="padding:0px;">

                </div>



            </div>
        </section>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "../server_side/scripts/server_processing.php"
        });
    });


    window.onload = (event) => {

        customGap(4);
        // $.ajax({
        //     url: '<?php echo $onload_url ?>/',
        //     type: "POST",
        //     dataType: 'json',
        //     data: {
        //         pegination: 20
        //     },
        //     beforeSend: function() {
        //         blockUI();
        //     },
        //     complete: function() {
        //         $.unblockUI();
        //     },
        //     success: function(res) {

        //         $('#stack').html(res);
        //         $('#example').DataTable({
        //             "searching": false,
        //             "paging": true,
        //         });
        //     }
        // });

    };
    $('#from-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'YYYY-MM-DD'
    });
    $('#to-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        format: 'YYYY-MM-DD'
    });

    function blockUI() {
        $.blockUI({
            message: ' <img src="<?php echo base_url() ?>spinner.gif" />'
        });
    }

    function filterdata() {

        sportstype = $("#sportid").val();

        var tdate = $("#to-date").val();
        var fdate = $("#from-date").val();
        var searchterm = $("#mstruserid").val();
        var bstatus = $("#betStatus").val();
        var pstatus = $("#pStatus").val();


        $.ajax({
            url: '<?php echo base_url(); ?>admin/Reports/filterbethistory',
            data: {
                tdate: tdate,
                fdate: fdate,
                searchterm: searchterm,
                bstatus: bstatus,
                pstatus: pstatus,
                user_id: <?php echo $user_id; ?>,
                sportstype: sportstype
            },
            type: "POST",
            dataType: 'json',
            beforeSend: function() {
                blockUI();
            },
            complete: function() {
                $.unblockUI();
            },
            success: function(res) {
                $('#stack').html('');
                $('#stack').html(res);
                $('#example').DataTable({
                    "searching": false,
                    "paging": false,
                });
            }
        });
    }


    function customGap(stype) {
        $("#betsalltab>li.active").removeClass("active");
        $("#sport-" + stype).parent().addClass("active");
        $("#sportid").val();
        var tdate = $("#to-date").val();
        var fdate = $("#from-date").val();
        var sportstype = stype;
        var searchterm = $("#mstruserid").val();
        var bstatus = $("#betStatus").val();
        var pstatus = $("#pStatus").val();

        $.ajax({
            url: '<?php echo base_url(); ?>admin/Reports/filterbethistory',
            data: {

                tdate: tdate,
                fdate: fdate,
                sportstype: sportstype,
                searchterm: searchterm,
                bstatus: bstatus,
                pstatus: pstatus,
                user_id: <?php echo $user_id; ?>

            },
            type: "POST",
            dataType: 'json',
            beforeSend: function() {
                blockUI();
            },
            complete: function() {
                $.unblockUI();
            },
            success: function(res) {
                $('#stack').html('');
                $('#stack').html(res);
                $('#example').DataTable({
                    "searching": false,
                    "paging": true,
                });
            }
        });
    }
</script>