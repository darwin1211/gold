<script>
    var socket = io.connect('<?php echo get_ws_endpoint(); ?>', {
        transports: ['websocket'],
        rememberUpgrade: false
    });
</script>



<main id="main" class="main-content">
    <div class="main-inner">
        <section class="match-content">
            <div id="UpCommingData" style="display: none;"></div>
            <div id="MatchOddInfo">

                <div class="match-tabs_31057636 matchBoxs_1190470587" style="">
                    <div class="match-box">



                        <div class="match-odds-tittle match-tittle">



                            <div class="marketTitle">


                                <svg onclick="showTv(31057636,'112.196.188.58',1038);" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 445.44 445.44" style="enable-background:new 0 0 445.44 445.44;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M404.48,108.288H247.808l79.36-78.336l-14.336-14.336L230.4,96.512l-82.432-81.408L133.632,29.44l79.36,78.336H40.96
c-22.528,0-40.96,18.432-40.96,40.96v240.64c0,22.528,18.432,40.96,40.96,40.96h363.52c22.528,0,40.96-18.432,40.96-40.96v-240.64
C445.44,126.72,427.008,108.288,404.48,108.288z M276.48,336.64c0,16.896-13.824,30.72-30.72,30.72H87.04
c-16.896,0-30.72-13.824-30.72-30.72V203.52c0-16.896,13.824-30.72,30.72-30.72h158.72c16.896,0,30.72,13.824,30.72,30.72V336.64z
M353.28,355.072c-19.968,0-35.84-15.872-35.84-35.84c0-19.968,15.872-35.84,35.84-35.84s35.84,15.872,35.84,35.84
C389.12,339.2,373.248,355.072,353.28,355.072z M394.24,251.136h-81.92v-20.48h81.92V251.136z M394.24,199.936h-81.92v-20.48
h81.92V199.936z"></path>
                                        </g>
                                    </g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                    <g></g>
                                </svg>
                                <span class="match-name-team"><?php echo $event_name; ?>
                                </span>


                                <!--?php// } ?-->


                                <div class="hidden-lg">
                                    <!-- <div class="select-tv-ico">
                                        <time><img onclick="showAnimated();" src="<?php echo base_url(); ?>assets/app/live-tv.png"></time> <span>Animation</span>
                                    </div> -->
                                    <div class="mobile-tv-show">
                                        <span id="close" class="cls-btn">x</span>
                                        <div id="Moblivetv" class="MatchLiveTvHideShow"><iframe id="mobilePlayer" allowfullscreen="true" frameborder="0" scrolling="" style="overflow: scroll; width: 100%; max-width: 100%  max-height: 247px;" src="<?php echo json_decode(matchScore($event_id))->animation; ?>" height="188"></iframe></div>
                                    </div>
                                </div>




                            </div>

                            <?php
                            if (!empty($live_tv_url)) { ?>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body" style="padding:0px;">


                                        <iframe id="tvPlayer" src="<?php echo $live_tv_url; ?>" style="border-radius: 1px;width:100%;height:220px;overflow:hidden !important;position:relative;"></iframe>
                                    </div>
                                </div>
                            <?php }

                            ?>

                            <div class="strt-time">
                                <div class="strt-timematch">
                                    <span class="lable-item">Market Start Time</span>
                                    <span class="ng-binding"> <?php

                                                                echo date('d M Y H:i:s', strtotime($events_data['open_date']));
                                                                ?></span>
                                </div>


                                <div class="strt-timeGame">
                                    <span class="lable-item">Game Start Time</span>
                                    <span id="demo_31057636">00</span>

                                    <?php

                                    if ($events_data['is_inplay'] == 'No') { ?>
                                        <span class="going_inplay"> Going In-play </span>
                                    <?php                } else { ?>
                                        <span class="inplay_txt"> In-play </span>
                                    <?php }

                                    ?>

                                </div>


                            </div>


                        </div>
                        <div class="score_area"><span style="" class="matchScore" id="matchScore_31057636">
                                <div class="score_main">
                                    <?php if ($event_type == 4) { ?>
                                        <div class="cricket-score">
                                            <div class="row">
                                                <div class="col-md-4 col-xs-4 col">
                                                    <div class="teamtype"> <img id="team_1_status" class="" src="<?php echo base_url(); ?>assets/images/cricket-bat.svg">
                                                        <p class="matchName" id="team_1_name"></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-xs-4 col">
                                                    <div class="target-score"> <span class="currunt_sc">0-0</span> <span class="currunt_over">(0.)</span> <span class="score-btn" onclick="showScoreBoard(31057636)">Scoreboard</span></div>
                                                </div>
                                                <div class="col-md-4 col-xs-4 col">
                                                    <div class="teamtype"> <img id="team_2_status" class="active" src="<?php echo base_url(); ?>assets/images/cricket-bat.svg">
                                                        <p class="matchName" id="team_2_name"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="score-footer">
                                                <div class="item-score batsman">
                                                    <ul>
                                                        <li class="active"> <img src="<?php echo base_url(); ?>assets/images/cricket-icons.svg"> <span id="score_player_1"></span></li>
                                                        <li class=""><img src="<?php echo base_url(); ?>assets/images/cricket-icons.svg"> <span id="score_player_2"></span></li>

                                                        <li class=""><img src="<?php echo base_url(); ?>assets/images/cricket-ball.svg"> <span id="score_player_3"></span></li>
                                                    </ul>
                                                </div>
                                                <div class="item-score score-over-fter">
                                                    <div class="over-status">
                                                        <div class="score-over">
                                                            <ul id="score-over">
                                                                <li>
                                                                    <p>Over </p>
                                                                </li>
                                                                <li class="-color six-balls"><span></span></li>
                                                                <li class="-color six-balls"><span></span></li>
                                                                <li class="-color six-balls"><span></span></li>
                                                                <li class="-color six-balls"><span></span></li>
                                                                <li class="-color six-balls"><span></span></li>
                                                                <li class="-color six-balls"><span></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="commantry-status"><span class="commantry"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            <?php } ?>
                            </span>
                        </div>



                        <?php echo $marketExchangeHtml; ?>

                    </div>
                </div>


                <?php
                if (get_user_type() != 'Super Admin') {
                    if ($fancy_user_info->is_fancy_active == 'Yes') {
                        echo $fancyExchangeHtml;
                    }
                } else {
                    echo $fancyExchangeHtml;
                } ?>











                <div id="tv-box-popup">

                </div>

                <script>
                    dragElement(document.getElementById("tv-box-popup"));
                    matchInterval('31057636', '07:30:11 PM', "Nov 10,2021");
                </script>

            </div>
            <?php if (isMobile()) { ?>
                <div class="mod-header tab_bets betsheading" style="">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item betdata active all-bet-tab-menu">
                            <a class="allbet" href="javascript:void(0);" onclick="getDataByType('all','all-bet-tab-menu');"><span class="bet-label">All Bet</span>
                                <span class="bat_counter" id="cnt_row">(0)</span></a>
                        </li>
                        <!-- <li class="nav-item betdata">
                            <a class="unmatchbet" href="javascript:void(0);" onclick="getDataByType(this,'2');"><span class="bet-label">UnMatch Bet</span>
                                <span class="bat_counter" id="cnt_row1">(0)</span> </a>
                        </li> -->
                        <li class="nav-item betdata fancy-bet-tab-menu">
                            <a class="unmatchbet" href="javascript:void(0);" onclick="getDataByType('fancy','fancy-bet-tab-menu');"><span class="bet-label">Fancy Bet</span>
                                <span class="bat_counter" id="cnt_row3">(0)</span> </a>
                        </li>
                        <li class="nav-item full-screen">

                            <a class="btn full-btn" onclick="viewAllMatch()" href="javascript:void(0);"><i class="fas fa-compress"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="" id="MatchUnMatchBetaData">
                    <script>
                        $(document).ready(function() {
                            // $('.UnMachShowHide').hide();
                            //  $('.MachShowHide').hide();
                        });
                        $(".MatchBetHide").click(function() {
                            $(".MachShowHide").slideToggle("fast");
                            $(this).find(".matchbetupdown").toggleClass("down up");
                        });
                        $(".UnMatchBetHide").click(function() {
                            $(".UnMachShowHide").slideToggle("fast");
                            $(this).find(".unmatchbetupdown").toggleClass("down up");
                        });
                    </script>


                    <div id="accountView" class="tableid2 accountViewcls" role="main" style="display: none;">
                        <span id="msg_error"></span><span id="errmsg"></span>
                        <div class="balance-panel-body">
                            <div class="table-responsive sports-tabel" id="UnMatchBets">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="heading_user_table">
                                            <td> Actions</td>
                                            <td>Runner </td>
                                            <td>Bet type</td>

                                            <td> Client</td>
                                            <td> Odds</td>
                                            <td> Stack</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div id="accountView" class="tableid3 accountViewcls" role="main" style="display: none;">
                        <span id="msg_error"></span><span id="errmsg"></span>
                        <div class="balance-panel-body">
                            <div class="table-responsive sports-tabel">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                        <tr class="heading_user_table">

                                            <td>No.</td>
                                            <td>Runner</td>
                                            <td>Bet Type</td>

                                            <td> Client</td>
                                            <td>Odds</td>
                                            <td>Stack</td>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div id="accountView" class="tableid4 accountViewcls" role="main" style="display: block;">
                        <span id="msg_error"></span><span id="errmsg"></span>
                        <div class="balance-panel-body">
                            <div class="table-responsive sports-tabel">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <td>No.</td>

                                            <?php
                                            $user_type = $_SESSION['my_userdata']['user_type'];
                                            if ($user_type != 'User') { ?>
                                                <td>User</td>
                                            <?php }
                                            ?>
                                            <td>Runner</td>
                                            <td>Bhaw</td>
                                            <td>Amount</td>
                                            <td>P_L</td>

                                            <td>Bet Type</td>
                                            <!--td>P&L</td-->
                                            <td>Time</td>
                                            <td>ID</td>
                                            <td> IP</td>
                                        </tr>
                                    </thead>
                                    <tbody id="all-betting-data">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




                    <script>
                        function deleteAllMatchOdds(MstCode, UserId, code, remark) {
                            $.ajax({
                                url: site_url + 'useraction/deleteAllbettingMatch',
                                data: {
                                    MstCode: MstCode,
                                    UserId: UserId,
                                    code: code,
                                    remark: remark
                                },
                                type: 'get',
                                dataType: 'json',
                                success: function(output) {
                                    if (output.error == '0') {
                                        var arrayMstCode = MstCode.split(',');
                                        $.each(arrayMstCode, function(keyNew, valueNew) {
                                            var mstID = valueNew;
                                            jQuery("#user_row_" + mstID).remove(); //Deleted Successfully ...											 
                                        });
                                        new PNotify({
                                            title: 'Success',
                                            text: output.message,
                                            type: 'success',
                                            styling: 'bootstrap3',
                                            delay: 3000
                                        });
                                        $('#fancyposition').modal('hide');
                                    } else {

                                        new PNotify({
                                            title: 'Error',
                                            text: output.message,
                                            type: 'error',
                                            styling: 'bootstrap3',
                                            delay: 3000
                                        });
                                    }
                                }
                            });

                        }

                        function filterBets(MatchId, MarketId) {
                            var searchId = $('#searchId').val();
                            $.ajax({
                                url: site_url + 'Application/GatBetData',
                                data: {
                                    marketId: MarketId,
                                    matchId: MatchId,
                                    searchId: searchId
                                },
                                type: 'get',
                                dataType: 'html',
                                success: function(output) {
                                    //console.log("viewMAtchUnMAtch"+output);
                                    //alert("reset")
                                    //console.log(output);
                                    $("#MatchUnMatchBetaData").show();
                                    $("#MatchUnMatchBetaData").html(output);
                                }
                            });
                        }

                        function filterReset(MatchId, MarketId) {
                            var searchId = '';
                            $.ajax({
                                url: site_url + 'Application/GatBetData',
                                data: {
                                    marketId: MarketId,
                                    matchId: MatchId,
                                    searchId: searchId
                                },
                                type: 'get',
                                dataType: 'html',
                                success: function(output) {
                                    //console.log(output);
                                    //alert("reset")
                                    $("#MatchUnMatchBetaData").show();
                                    $("#MatchUnMatchBetaData").html(output);

                                }
                            });
                        }
                    </script>
                </div>


                <div id="footerimg" style="margin-bottom: 30px;width: 100%; float: left; margin-top: 10px;">
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/footer01.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/footer02.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/3PT.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/7U7D.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/32C.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="aaa.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/AB.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/dt.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/P.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/HL.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/SPP.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/TT20.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/WM.jpg">


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/3CD.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/AR.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/BJ.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/CB.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/CM.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/CQ.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/CT.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/CW.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/DC.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/FS.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/GTH.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/L7.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/MB.jpg"></a>


                    </div>
                    <div style="width:15%;float:left;margin-top:10px;margin-right:10px;">
                        <a href="http://pdmexch.bet/dashboard"><img style="width: 100%;" src="<?php echo base_url(); ?>assets/app/SSB.jpg"></a>


                    </div>
                </div>
            <?php } ?>
        </section>
        <div id="betSidenav" class="betsidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="betcloseNav()">×</a>
            <section class="right-bet-content">
                <!-- <div id="livetv">
                    <div class="mod-header">
                        <div class="select-tv-ico">
                            <time><img onclick="showAnimated();" src="<?php echo base_url(); ?>assets/app/live-tv.png"></time> <span>Live Tv</span>
                        </div>
                        <span id="close" class="cls-btn">x</span>
                    </div>
                    <div class="MatchLiveTvHideShow"><iframe id="mobilePlayer" allowfullscreen="true" frameborder="0" scrolling="" style="overflow: scroll; width: 100%; max-width: 100%  max-height: 247px;" src="<?php echo json_decode(matchScore($event_id))->animation; ?>" height="188"></iframe></div>
                </div> -->
                <div id="tv-box-popup"></div>

                <div class="betSlipBox" style="">
                    <div class="betBox bet-slip-box" style="display: none;">
                        <span id="msg_error"></span><span id="errmsg"></span>
                        <div class="lds-dual-ring  loader" style="display:none"></div>
                        <audio id="myAudio">
                            <source src="<?php echo base_url(); ?>assets/images/beep.mp3" type="audio/mpeg">
                        </audio>
                        <form method="POST" id="placeBetSilp"><input type="hidden" name="compute" value="715c2e46276cee429d5de10eca9b3ccb">
                            <div class="bet-box_inner">
                                <div class="profit_loss-head">
                                    <div class="items">
                                        <span class="stake_label">Bet for</span>
                                        <div id="ShowRunnderName" style="font-weight:bold;">
                                            <span class="close_btn"><i class="fas fa-times-circle"></i></span>
                                        </div>
                                    </div>
                                    <div class="items profit" id=" ">
                                        <span class="stake_label">Profit</span>
                                        <div class="stack_input_field">
                                            <span id="profitData" style="color:rgb(0, 124, 14);font-weight:bold"> 0.00</span>
                                        </div>
                                    </div>
                                    <div class="items profit" id=" ">
                                        <span class="stake_label">Loss</span>
                                        <div class="stack_input_field">
                                            <span id="LossData" style="color:rgb(255, 0, 0);font-weight:bold"> 0.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="inner-bet-section">
                                    <div class="oddds-stake-box">
                                        <div class="items odds">
                                            <div class="stack_input_field numbers-row">
                                                <input type="number" step="0.01" id="ShowBetPrice" class="calProfitLoss odds-input form-control  CommanBtn">
                                            </div>
                                        </div>
                                        <div class="items stake" id=" ">
                                            <div class="stack_input_field numbers-row">
                                                <input type="number" pattern="[0-9]*" step=1 id="stakeValue" class="calProfitLoss stake-input form-control  CommanBtn">
                                                <input type="hidden" name="selectionId" id="selectionId" value="" class="form-control">
                                                <input type="hidden" name="matchId" id="matchId" value="" class="form-control">
                                                <input type="hidden" name="isback" id="isback" value="" class="form-control">
                                                <input type="hidden" name="MarketId" id="MarketId" value="" class="form-control">
                                                <input type="hidden" name="betting_type" id="betting_type" value="" class="form-control">
                                                <input type="hidden" name="event_type" id="event_type" value="<?php echo $event_type; ?>" class="form-control">
                                                <input type="hidden" name="placeName" id="placeName" value="" class="form-control">
                                                <input type="hidden" name="text" id="stackcount" value="0" class="form-control">
                                                <input type="hidden" name="text" id="isfancy" value="0" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="bet-btns">
                                        <?php

                                        if (!empty($chips)) {
                                            foreach ($chips as $key => $chip) { ?>
                                                <div class="btn brt_btn"><button class=" chipName7" type="button" value="<?php echo $chip['chip_value']; ?>" onclick="StaKeAmount(this);"><?php echo $chip['chip_name']; ?></button></div>
                                        <?php }
                                        }
                                        ?>

                                        <div class="btn brt_btn"><button class=" " type="button" onclick="ClearStack( );">Clear</button></div>
                                    </div>
                                    <div class="bet-box-footer">
                                        <button class="btn cancle-bet" type="button" onclick="ClearAllSelection();"> Reset Bet</button>
                                        <button class="btn place-bet" type="button" onclick="PlaceBet();"> Place Bet</button>
                                        <!-- <button class="btn multi-bet" type="button" onclick="PlaceMultiBet();"> Place Multiple Bet</button> -->
                                        <!-- <button class="btn btn-success CommanBtn placefancy" type="button" onclick="PlaceBet();" style="display:none"> Place Bet</button> -->
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>




                <div class="side-bar-thumb" style="display: none;">
                    <div class="slider vertical-slider">
                        <div class="slick slick-initialized slick-slider slick-vertical"><button type="button" data-role="none" class="slick-prev slick-arrow" aria-label="Previous" role="button" style="display: inline-block;">Previous</button>

                            <div aria-live="polite" class="slick-list draggable" style="height: 0px;">
                                <div class="slick-track" role="listbox" style="opacity: 1; height: 0px; transform: translate3d(0px, 0px, 0px);">
                                    <div class="item slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/horse-racing-Recovered-copy.gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/soccer (1).gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/Cricket0001.gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/tennis (1).gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="0" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/CASINO.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="1" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/eZUGI.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/horse-racing.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="3" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide03" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/super-spade.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="4" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide04" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/soccer.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="5" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide05" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/tennis.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="6" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide06" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/ONE-TOUCH.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="7" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide07" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/PRAGMATIC-PLAY-LIVE.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="8" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide08" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/ASIA-GAMING.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="9" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide09" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/soccer003.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="10" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide010" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/Cricket0003.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="11" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide011" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/horse-racing02.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="12" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide012" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/tennis003.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="13" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide013" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/soccer002.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="14" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide014" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/tennis002.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="15" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide015" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/Cricket0002.gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="16" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide016" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/CASINO (1).gif">
                                    </div>
                                    <div class="item slick-slide" data-slick-index="17" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide017" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/horse-racing-Recovered-copy.gif">
                                    </div>
                                    <div class="item slick-slide slick-current slick-active" data-slick-index="18" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide018" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/soccer (1).gif">
                                    </div>
                                    <div class="item slick-slide slick-active" data-slick-index="19" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide019" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/Cricket0001.gif">
                                    </div>
                                    <div class="item slick-slide slick-active" data-slick-index="20" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide020" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/tennis (1).gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned slick-active" data-slick-index="21" aria-hidden="false" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/CASINO.gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned" data-slick-index="22" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/eZUGI.gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned" data-slick-index="23" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/horse-racing.gif">
                                    </div>
                                    <div class="item slick-slide slick-cloned" data-slick-index="24" aria-hidden="true" tabindex="-1" style="width: 0px;">

                                        <img src="<?php echo base_url(); ?>assets/app/super-spade.gif">
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" style="display: inline-block;">Next</button>
                        </div>
                    </div>
                </div>
                <div class="overlay_mobile in"></div>
                <?php if (!isMobile()) { ?>
                    <div class="mod-header tab_bets betsheading" style="">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item betdata active all-bet-tab-menu">
                                <a class="allbet" href="javascript:void(0);" onclick="getDataByType('all','all-bet-tab-menu');"><span class="bet-label">All Bet</span>
                                    <span class="bat_counter" id="cnt_row">(0)</span></a>
                            </li>
                            <!-- <li class="nav-item betdata">
                            <a class="unmatchbet" href="javascript:void(0);" onclick="getDataByType(this,'2');"><span class="bet-label">UnMatch Bet</span>
                                <span class="bat_counter" id="cnt_row1">(0)</span> </a>
                        </li> -->
                            <li class="nav-item betdata fancy-bet-tab-menu">
                                <a class="unmatchbet" href="javascript:void(0);" onclick="getDataByType('fancy','fancy-bet-tab-menu');"><span class="bet-label">Fancy Bet</span>
                                    <span class="bat_counter" id="cnt_row3">(0)</span> </a>
                            </li>
                            <li class="nav-item full-screen">

                                <a class="btn full-btn" onclick="viewAllMatch()" href="javascript:void(0);"><i class="fas fa-compress"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="" id="MatchUnMatchBetaData">
                        <script>
                            $(document).ready(function() {
                                // $('.UnMachShowHide').hide();
                                //  $('.MachShowHide').hide();
                            });
                            $(".MatchBetHide").click(function() {
                                $(".MachShowHide").slideToggle("fast");
                                $(this).find(".matchbetupdown").toggleClass("down up");
                            });
                            $(".UnMatchBetHide").click(function() {
                                $(".UnMachShowHide").slideToggle("fast");
                                $(this).find(".unmatchbetupdown").toggleClass("down up");
                            });
                        </script>


                        <div id="accountView" class="tableid2 accountViewcls" role="main" style="display: none;">
                            <span id="msg_error"></span><span id="errmsg"></span>
                            <div class="balance-panel-body">
                                <div class="table-responsive sports-tabel" id="UnMatchBets">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr class="heading_user_table">
                                                <td> Actions</td>
                                                <td>Runner </td>
                                                <td>Bet type</td>

                                                <td> Client</td>
                                                <td> Odds</td>
                                                <td> Stack</td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div id="accountView" class="tableid3 accountViewcls" role="main" style="display: none;">
                            <span id="msg_error"></span><span id="errmsg"></span>
                            <div class="balance-panel-body">
                                <div class="table-responsive sports-tabel">
                                    <table class="table table-bordered table-hover ">
                                        <thead>
                                            <tr class="heading_user_table">

                                                <td>No.</td>
                                                <td>Runner</td>
                                                <td>Bet Type</td>

                                                <td> Client</td>
                                                <td>Odds</td>
                                                <td>Stack</td>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <div id="accountView" class="tableid4 accountViewcls" role="main" style="display: block;">
                            <span id="msg_error"></span><span id="errmsg"></span>
                            <div class="balance-panel-body">
                                <div class="table-responsive sports-tabel">
                                    <table class="table table-striped jambo_table bulk_action">
                                        <thead>
                                            <tr class="headings">
                                                <td>No.</td>

                                                <?php
                                                $user_type = $_SESSION['my_userdata']['user_type'];
                                                if ($user_type != 'User') { ?>
                                                    <td>User</td>
                                                <?php }
                                                ?>
                                                <td>Runner</td>
                                                <td>Bhaw</td>
                                                <td>Amount</td>
                                                <td>P_L</td>

                                                <td>Bet Type</td>
                                                <!--td>P&L</td-->
                                                <td>Time</td>
                                                <td>ID</td>
                                                <td> IP</td>
                                            </tr>
                                        </thead>
                                        <tbody id="all-betting-data">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>




                        <script>
                            function deleteAllMatchOdds(MstCode, UserId, code, remark) {
                                $.ajax({
                                    url: site_url + 'useraction/deleteAllbettingMatch',
                                    data: {
                                        MstCode: MstCode,
                                        UserId: UserId,
                                        code: code,
                                        remark: remark
                                    },
                                    type: 'get',
                                    dataType: 'json',
                                    success: function(output) {
                                        if (output.error == '0') {
                                            var arrayMstCode = MstCode.split(',');
                                            $.each(arrayMstCode, function(keyNew, valueNew) {
                                                var mstID = valueNew;
                                                jQuery("#user_row_" + mstID).remove(); //Deleted Successfully ...											 
                                            });
                                            new PNotify({
                                                title: 'Success',
                                                text: output.message,
                                                type: 'success',
                                                styling: 'bootstrap3',
                                                delay: 3000
                                            });
                                            $('#fancyposition').modal('hide');
                                        } else {

                                            new PNotify({
                                                title: 'Error',
                                                text: output.message,
                                                type: 'error',
                                                styling: 'bootstrap3',
                                                delay: 3000
                                            });
                                        }
                                    }
                                });

                            }

                            function filterBets(MatchId, MarketId) {
                                var searchId = $('#searchId').val();
                                $.ajax({
                                    url: site_url + 'Application/GatBetData',
                                    data: {
                                        marketId: MarketId,
                                        matchId: MatchId,
                                        searchId: searchId
                                    },
                                    type: 'get',
                                    dataType: 'html',
                                    success: function(output) {
                                        //console.log("viewMAtchUnMAtch"+output);
                                        //alert("reset")
                                        //console.log(output);
                                        $("#MatchUnMatchBetaData").show();
                                        $("#MatchUnMatchBetaData").html(output);
                                    }
                                });
                            }

                            function filterReset(MatchId, MarketId) {
                                var searchId = '';
                                $.ajax({
                                    url: site_url + 'Application/GatBetData',
                                    data: {
                                        marketId: MarketId,
                                        matchId: MatchId,
                                        searchId: searchId
                                    },
                                    type: 'get',
                                    dataType: 'html',
                                    success: function(output) {
                                        //console.log(output);
                                        //alert("reset")
                                        $("#MatchUnMatchBetaData").show();
                                        $("#MatchUnMatchBetaData").html(output);

                                    }
                                });
                            }
                        </script>
                    </div>
                <?php } ?>
            </section>
        </div>

    </div>
</main>
<!-- /page content -->
<div id="fancyposition" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="popup_form">
                <div class="title_popup">
                    <span> Fancy Position</span>
                    <button type="button" class="close" data-dismiss="modal">
                        <div class="close_new"><i class="fa fa-times-circle"></i> </div>
                    </button>
                </div>
                <div class="content_popup">
                    <div class="popup_form_row">
                        <div class="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="matchposition" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="popup_form">
                <div class="title_popup">
                    <span> Match Position</span>
                    <button type="button" class="close" data-dismiss="modal">
                        <div class="close_new"><i class="fa fa-times-circle"></i> </div>
                    </button>
                </div>
                <div class="content_popup">
                    <div class="popup_form_row">
                        <div class="modal-body">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th style="width:30%;">Account</th>
                                        <?php
                                        if (!empty($runners)) {
                                            foreach ($runners as $runner) { ?>
                                                <th class="text-center">
                                                    <span id="ContentPlaceHolder1_team01"><?php echo $runner['runner_name']; ?></span>
                                                </th>

                                        <?php }
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody id="all-profit-loss-data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.panel-heading span.clickable', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.balance-box').find('.balance-panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');

        } else {
            $this.parents('.balance-box').find('.balance-panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');

        }
    })
</script>



<!--commanpopup-->
<div id="commonpopup" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="popup_form">
                <div class="title_popup">
                    <span>Title Popup</span>
                    <button type="button" class="close" data-dismiss="modal">
                        <div class="close_new"><i class="fa fa-times-circle"></i></div>
                    </button>
                </div>
                <div class="content_popup">
                    <div class="popup_form_row">
                        <div class="modal-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="addUser" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header mod-header"><button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Chip Setting</h4>
            </div>
            <div class="modal-body">
                <div id="addUserMsg"></div>
                <form id="stockez_add" method="post" class="form-inline">
                    <input type="hidden" name="user_id" class="form-control" required value="<?php echo get_user_id(); ?>" />
                    <div class="modal-body" id="chip-moddal-body">
                        <?php
                        if (!empty($chips)) {
                            $i = 0;
                            foreach ($chips as $chip) {
                                $i++;
                        ?>
                                <div class="fullrow">
                                    <input type="hidden" name="user_chip_id[]" class="form-control" required value="<?php echo $chip['user_chip_id']; ?>" />
                                    <div class="col-md-6 col-sm-6col-xs-6">
                                        <div class="form-group"><label for="email">Chips Name <?php echo $i; ?>:</label><input type="text" name="chip_name[]" class="form-control" required value="<?php echo $chip['chip_name']; ?>"></div>
                                    </div>
                                    <div class=" col-md-6 col-sm-6col-xs-6">
                                        <div class="form-group"><label for="pwd">Chip Value <?php echo $i; ?>:</label><input type="number" name="chip_value[]" class="form-control" required value="<?php echo $chip['chip_value']; ?>"></div>
                                    </div>
                                </div>
                        <?php }
                        }
                        ?>

                    </div>
                    <div class="modal-footer">
                        <div class="text-center" id="button_change">
                            <div class="text-center" id="button_change">
                                <button type="button" class="btn btn-success" id="updateUserChip" onclick="add_new_chip()" style="margin-bottom:10px;">Add New Chip </button>
                                <button type="button" style="margin-bottom:10px;" class="btn btn-success" id="updateUserChip" onclick="submit_update_chip()"> Update Chip Setting </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>

<script>
    var a = 0;
    var b = 0;
    var betSlip;
    var isMarketSelected;
    var active_event_id;
    var superiors = <?php echo $superiors; ?>;

    function MarketSelection(MarketId, matchId, eventType) {
        /*********************** */
        window.location.assign("<?php echo base_url(); ?>dashboard/eventDetail/" + matchId);
        /*********************** */
        // return false;



        // isMarketSelected = true;
        // $('#betting_type').val('Match');
        // $('#event_type').val(eventType);

        // $("#UpCommingData").hide();
        // $("#UpCommingData").html('');
        // var formData = {
        //     MarketId: MarketId,
        //     matchId: matchId
        // };


        // // $.blockUI();
        // $.ajax({
        //     url: "<?php echo base_url(); ?>admin/Events/backlays",
        //     data: formData,
        //     type: 'POST',
        //     dataType: 'json',
        //     async: false,
        //     success: function success(output) {
        //         if (output != '') {
        //             //  active_event_id = MarketId;
        //             $('#MarketId').val(MarketId);
        //             $('#matchId').val(matchId);

        //             $(".matchBox").show();
        //             $("#UpCommingData").hide();
        //             $("#MatchOddInfo").show();
        //             $('#bettingView').show();
        //             $(".betSlipBox").show();
        //             $(".other-items").hide();
        //             // $("#MatchOddInfo").html(output.exchangeHtml);
        //             $('.fancybox').show();
        //             // $('.fancybox').html(output.fancyHtml);

        //             generateMarketStructure(output)

        //         } else {
        //             closeBetBox(matchId, MarketId);
        //         }
        //         // $.unblockUI();

        //     }
        // });
        // fetchBttingList();

    }

    function generateMarketStructure(data) {
        var exchangeHtml = '';



        if (data.events) {
            $.each(data.events, function(index, event) {

                if (event.market_types) {
                    $.each(event.market_types, function(index, market_type) {

                        if (market_type.is_block) {
                            return;
                        }

                        var view_info = market_type.user_info;

                        if (view_info) {
                            if (market_type.inplay == 1) {
                                var min_stake = view_info.min_stake;
                                var max_stake = view_info.max_stake;

                            } else {
                                var max_stake = view_info.pre_inplay_stake;
                            }

                        }


                        exchangeHtml += '<div class="fullrow matchBoxMain  matchBox_' + event.event_id + ' matchBoxs_' + event.event_id + ' style="display:block;">';

                        exchangeHtml += '<div class="modal-dialog-staff">';
                        exchangeHtml += '<div class="match_score_box">';
                        exchangeHtml += '<div class="modal-header mod-header">';
                        exchangeHtml += '<div class="block_box" style="display:flow-root;">';
                        exchangeHtml += '<span id="tital_change">';


                        if (event.is_favourite) {
                            exchangeHtml += '<span id="fav' + event.event_id + '"><i class="fa fa-star" aria-hidden="true" onclick="favouriteSport(' + event.event_id + ')" ></i></span>';
                        } else {
                            exchangeHtml += '<span id="fav' + event.event_id + '"><i class="fa fa-star-o" aria-hidden="true" onclick="favouriteSport(' + event.event_id + ')" ></i></span>'
                        }

                        exchangeHtml += event.event_name + '<input type="hidden" value="' + event.event_name + '" id="sportName_4310"></span>';

                        exchangeHtml += '<div class="block_box_btn">';
                        exchangeHtml += '<button class="btn btn-primary btn-xs" onclick="getCurrentBets(' + event.event_id + ')">Bets</button>';
                        exchangeHtml += '<button class="btn btn-primary btn-xs" onclick="closeBetBox(' + event.event_id + ')">X</button>';
                        exchangeHtml += '</div>';
                        exchangeHtml += '</div>';
                        exchangeHtml += '</div>';
                        exchangeHtml += '<div class="score_area"><span class="matchScore" id="matchScore_4310"> </span> </div>';

                        exchangeHtml += '</div>';
                        exchangeHtml += '<div class="matchClosedBox_214310" style="display:none">';
                        exchangeHtml += '<div class="fullrow fullrownew">';
                        exchangeHtml += '<div class="pre-text">' + market_type.market_name + '<br>';

                        exchangeHtml += '</div>';
                        exchangeHtml += '<div class="matchTime">' + event.open_date + '</div></div>';
                        exchangeHtml += '<div>';
                        exchangeHtml += '<div class="closedBox">';
                        exchangeHtml += '<h1>Closed</h1>';
                        exchangeHtml += ' </div>';
                        exchangeHtml += '</div>';
                        exchangeHtml += '</div>';
                        exchangeHtml += '<div class="sportrow-4 matchOpenBox_' + market_type.market_id.replace('.', '') + '">';
                        exchangeHtml += '<div class="match-odds-sec">';
                        exchangeHtml += '<div class="item match-status">';
                        exchangeHtml += market_type.market_name + '</div>';
                        exchangeHtml += '<div class="item match-status-odds">';

                        if (market_type.inplay == 1) {
                            exchangeHtml += '<span class="inplay_txt"> In-play </span>';
                        } else {
                            exchangeHtml += '<span class="going_inplay"> Going In-play </span>';
                        }

                        exchangeHtml += '</div>';
                        exchangeHtml += '</div>';
                        exchangeHtml += '<div class="fullrow MatchIndentB" style="position:relative;">';

                        exchangeHtml += '<table class="table table-striped  bulk_actions matchTable214310" id="matchTable4310">';
                        exchangeHtml += '<tbody>';
                        exchangeHtml += '<tr class="headings mobile_heading">';
                        exchangeHtml += '<th class="fix_heading color_red">';

                        if (view_info) {
                            if (market_type.inplay == 1) {
                                exchangeHtml += 'Min stake:' + min_stake + ' Max stake:' + max_stake + ' </th>';

                            } else {
                                exchangeHtml += 'Max stake:' + max_stake + ' </th>';
                            }
                        }

                        exchangeHtml += '<th> </th>';
                        exchangeHtml += '<th> </th>';
                        exchangeHtml += '<th class="back_heading_color">Back</th>';
                        exchangeHtml += '<th class="lay_heading_color">Lay</th>';
                        exchangeHtml += '<th> </th>';
                        exchangeHtml += '<th> </th>';
                        exchangeHtml += '</tr>'
                        exchangeHtml += '<tr id="user_row0" class="back_lay_color runner-row-1">';
                        exchangeHtml += '<td>';
                        exchangeHtml += '<p class="runner_text" id="runnderName1">' + market_type.runner_1_runner_name + '</p>';
                        exchangeHtml += '<p class="blue-odds" id="Val1-' + event.event_id + '">0</p>';

                        var exposure = market_type.runners[0].exposure;
                        if (exposure < 0) {
                            exchangeHtml += '<span class="runner_amount" style="color:red;" id="' + market_type.runners[0].selection_id + '_maxprofit_loss_runner_' + market_type.market_id.replace('.', '') + '">' + Math.abs(exposure) + '</span>';
                        } else {
                            exchangeHtml += '<span class="runner_amount" style="color:green" id="' + market_type.runners[0].selection_id + '_maxprofit_loss_runner_' + market_type.market_id.replace('.', '') + '">' + Math.abs(exposure) + '</span>';
                        }


                        exchangeHtml += '<input type="hidden" class="position_' + market_type.market_id.replace('.', '') + '" id="selection_0" data-id="' + market_type.runners[0].selection_id + '" value="' + exposure + '">';
                        exchangeHtml += '</td>';

                        //availableToBack


                        exchangeHtml += '<td class="1_0availableToBack2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`' + 1 + '`,' + '`' + market_type.runner_1_runner_name + '`,`availableToBack3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '`, `' + market_type.runners[0].selection_id + '`,`B`,`this`)">';

                        exchangeHtml += '<span class="priceRate" id="availableToBack3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type.runners[0].back_3_price;

                        exchangeHtml += '</span>';

                        exchangeHtml += '<span id="availableToBack3_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type.runners[0].back_3_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';


                        exchangeHtml += '<td class="1_0availableToBack2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`' + 1 + '`,`' +
                            market_type.runner_1_runner_name + '`,`availableToBack2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '`,`' +
                            market_type.runners[0].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToBack2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';



                        exchangeHtml += market_type.runners[0].back_2_price;


                        exchangeHtml += '</span>';


                        exchangeHtml += '<span id="availableToBack2_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';


                        exchangeHtml += market_type.runners[0].back_2_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';


                        exchangeHtml += '<td class="1_0availableToBack2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`1`,`' +
                            market_type.runner_1_runner_name + '`,`availableToBack1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '`,`' + market_type.runners[0].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToBack1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type.runners[0].back_1_price;
                        exchangeHtml += '</span>';

                        exchangeHtml += '<span id="availableToBack1_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type.runners[0].back_1_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';


                        // availableToLay


                        exchangeHtml += '<td class="1_0availableToLay2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`0`,`' + market_type.runner_1_runner_name + '`,`availableToLay1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '`,`' + market_type.runners[0].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToLay1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';


                        exchangeHtml += market_type.runners[0].lay_1_price;
                        exchangeHtml += '</span>';
                        exchangeHtml += '<span id="availableToLay1_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type.runners[0].lay_1_size;

                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';

                        exchangeHtml += '<td class="1_0availableToLay2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`0`,`' + market_type.runner_1_runner_name + '`,`availableToLay2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '`,`' + market_type.runners[0].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToLay2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type['runners'][0]['lay_2_price'];

                        exchangeHtml += '</span>';

                        exchangeHtml += '<span class="priceRate" id="availableToLay2_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';


                        exchangeHtml += market_type.runners[0].lay_2_size;

                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';

                        exchangeHtml += '<td class="1_0availableToLay2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`0`,`' + market_type.runner_1_runner_name + '`,`availableToLay3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '`,`' + market_type.runners[0].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToLay3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';

                        exchangeHtml += market_type.runners[0].lay_3_price;

                        exchangeHtml += '</span>';
                        exchangeHtml += '<span id="availableToLay3_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[0].selection_id + '">';


                        exchangeHtml += market_type.runners[0].lay_3_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';
                        exchangeHtml += '</tr>';



                        // TD FOR RUNNER VALUE ONE
                        exchangeHtml += '<tr id="user_row1" class="back_lay_color runner-row-2">';
                        exchangeHtml += '<td>';
                        exchangeHtml += '<p class="runner_text" id="runnderName1">' + market_type.runner_2_runner_name + '</p>';
                        exchangeHtml += '<p class="blue-odds" id="Val1-' + event.event_id + '">0</p>';

                        var exposure = market_type.runners[1].exposure;

                        if (exposure < 0) {
                            exchangeHtml += '<span class="runner_amount" style="color:red;" id="' + market_type.runners[1].selection_id + '_maxprofit_loss_runner_' + market_type.market_id.replace('.', '') + '">' + Math.abs(exposure) + '</span>';
                        } else {
                            exchangeHtml += '<span class="runner_amount" style="color:green" id="' + market_type.runners[1].selection_id + '_maxprofit_loss_runner_' + market_type.market_id.replace('.', '') + '">' + Math.abs(exposure) + '</span>';
                        }



                        exchangeHtml += '<input type="hidden" class="position_' + market_type.market_id.replace('.', '') + '" id="selection_0" data-id="' + market_type.runners[1].selection_id + '" value="' + exposure + '">';
                        exchangeHtml += '</td>';

                        //availableToBack


                        exchangeHtml += '<td class="1_0availableToBack2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`1`, `' + market_type.runner_2_runner_name + '`,`availableToBack3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '`,`' + market_type.runners[1].selection_id + '`,`B`,`this`)">';

                        exchangeHtml += '<span class="priceRate" id="availableToBack3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';

                        exchangeHtml += market_type.runners[1].back_3_price;
                        exchangeHtml += '</span>';


                        exchangeHtml += '<span id="availableToBack3_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';


                        exchangeHtml += market_type.runners[1].back_3_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';

                        exchangeHtml += '<td class="1_0availableToBack2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`1`,`' + market_type.runner_2_runner_name + '`,`availableToBack2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '`,`' + market_type.runners[1].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToBack2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';


                        exchangeHtml += market_type.runners[1].back_2_price;
                        exchangeHtml += '</span>';


                        exchangeHtml += '<span id="availableToBack2_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';


                        exchangeHtml += market_type.runners[1].back_2_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';

                        exchangeHtml += '<td class="1_0availableToBack2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`1`, `' + market_type.runner_2_runner_name + '`,`availableToBack1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '`,`' + market_type.runners[1].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToBack1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';



                        exchangeHtml += market_type.runners[1].back_1_price;
                        exchangeHtml += '</span>';


                        exchangeHtml += '<span id="availableToBack1_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';


                        exchangeHtml += market_type.runners[1].back_1_size;
                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';

                        //availableToLay


                        exchangeHtml += '<td class="1_0availableToLay2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`0`, `' + market_type.runner_2_runner_name + '`,`availableToLay1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '`,`' + market_type.runners[1].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToLay1_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';

                        exchangeHtml += market_type.runners[1].lay_1_price;
                        exchangeHtml += '</span>';
                        exchangeHtml += '<span id="availableToLay1_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';

                        exchangeHtml += market_type.runners[1].lay_1_size;

                        exchangeHtml += '</span>';

                        exchangeHtml += '</td>';

                        exchangeHtml += '<td class="1_0availableToLay2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`0`,`' + market_type.runner_2_runner_name + '`,`availableToLay2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '`,`' + market_type.runners[1].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToLay2_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';


                        exchangeHtml += market_type.runners[1].lay_2_price;

                        exchangeHtml += '</span>';
                        exchangeHtml += '<span id="availableToLay2_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';

                        exchangeHtml += market_type.runners[1].lay_2_size;

                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';

                        exchangeHtml += '<td class="1_0availableToLay2_price_214310" onclick="getOddValue(`' + event.event_id + '`,`' + market_type.market_id + '`,`0`, `' + market_type.runner_2_runner_name + '`,`availableToLay3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '`,`' + market_type.runners[1].selection_id + '`,`B`,`this`);">';


                        exchangeHtml += '<span class="priceRate" id="availableToLay3_price_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';

                        exchangeHtml += market_type.runners[1].lay_3_price;
                        exchangeHtml += '</span>';


                        exchangeHtml += '<span id="availableToLay3_size_' + market_type.market_id.replace('.', '') + '_' + market_type.runners[1].selection_id + '">';

                        exchangeHtml += market_type.runners[1].lay_3_size;

                        exchangeHtml += '</span>';
                        exchangeHtml += '</td>';


                        exchangeHtml += '</tr>';
                        //TD FOR RUNNER VALUE ONE
                        exchangeHtml += '</tbody>';
                        exchangeHtml += '</table>';
                        exchangeHtml += '</div></div></div></div>';

                    })
                }
            });
        }
        $("#MatchOddInfo").html(exchangeHtml);


        var fancyHtml = '';


        if (data.fancy_data) {
            fancyHtml += '<div style="" class="fancy-table" id="fbox30026040"><div class="fancy-heads"><div class="event-sports">Fancy&nbsp;&nbsp; </div><div class="fancy_buttons"><div class="fancy-backs head-no"><strong>NO</strong></div></div><div class="fancy_buttons"><div class="fancy-lays head-yes"><strong>YES</strong></div></div></div>';

            fancyHtml += '<div class="fancyAPI">';
            $.each(data.fancy_data, function(index, fancy) {

                fancyHtml += '<div class="block_box f_m_' + fancy.match_id + ' fancy_' + fancy.selection_id + ' f_m_31236" data-id="31236">';

                fancyHtml += '<ul class="sport-high fancyListDiv">';
                fancyHtml += '<li>';
                fancyHtml += '<div class="ses-fan-box">';
                fancyHtml += '<table class="table table-striped  bulk_actions">';
                fancyHtml += '<tbody>';
                fancyHtml += '<tr class="session_content">';
                fancyHtml += '<td><span class="fancyhead' + fancy.selection_id + '" id="fancy_name' + fancy.selection_id + '">' + fancy.runner_name + '</span><b class="fancyLia' + fancy.selection_id + '"></b><p class="position_btn"></td>';


                fancyHtml += '<td></td>';
                fancyHtml += '<td></td>';

                fancyHtml += '<td class="fancy_lay" id="fancy_lay_' + fancy.selection_id + '" onclick="betfancy(`' + fancy.match_id + '`,`' + fancy.selection_id + '`,`' + 0 + '`);">';

                fancyHtml += '<button class="lay-cell cell-btn fancy_lay_price_' + fancy.selection_id + '" id="LayNO_' + fancy.selection_id + '">' + parseFloat(fancy.lay_price1) + '</button>';

                fancyHtml += '<button id="NoValume_' + fancy.selection_id + '" class="disab-btn fancy_lay_size_' + fancy.selection_id + '">' + fancy.lay_size1 + '</button></td>';

                fancyHtml += '<td class="fancy_back" onclick="betfancy(`' + fancy.match_id + '`,`' + fancy.selection_id + '`,`' + 1 + '`);">';

                fancyHtml += '<button class="back-cell cell-btn fancy_back_price_' + fancy.selection_id + '" id="BackYes_' + fancy.selection_id + '">' + parseFloat(fancy.back_price1) + '</button>';

                fancyHtml += '<button id="YesValume_' + fancy.selection_id + '" class="disab-btn fancy_back_size_' + fancy.selection_id + '">' + fancy.back_size1 + '</button>';
                fancyHtml += '</td>';

                fancyHtml += '<td>';
                fancyHtml += '</td>';
                fancyHtml += '<td>';
                fancyHtml += '</td>';
                fancyHtml += '</tr>';
                fancyHtml += '</tbody>';
                fancyHtml += '</table>';
                fancyHtml += '</div>';
                fancyHtml += '</li>';
                fancyHtml += '</ul></div>';
            });
            fancyHtml += '</div>';


            $('.fancybox').html(fancyHtml);
        }
    }

    $(function() {
        setTimeout(function() {
            fetchBttingList()

        }, 1000);

        // fetchBttingList();



        // fetchMatchOddsPositionList();

    })

    // function fetchProfitLossList() {

    //     var formData = {
    //         matchId: "<?php echo $event_id; ?>"
    //     }
    //     $.ajax({
    //         url: "<?php echo base_url(); ?>admin/Events/userWiseLossProfit",
    //         data: formData,
    //         type: 'POST',
    //         dataType: 'json',
    //         async: false,
    //         success: function(output) {
    //             $('#all-profit-loss-data').html(output.htmlData);
    //         }
    //     });
    // }


    function fetchBttingList() {

        var formData = {

            matchId: "<?php echo $event_id; ?>"
        }
        $.ajax({
            url: "<?php echo base_url(); ?>admin/Events/bettingList",
            data: formData,
            type: 'POST',
            dataType: 'json',
            success: function(output) {

                <?php
                if (get_user_type() != 'Operator') { ?>
                    $('.mWallet').html(output.balance);
                    $('.liability').html(output.exposure);
                <?php   }

                ?>

                $('#all-betting-data').html(output.bettingHtml);
                // $('#fancy-betting-data').html(output.bettingHtml);


                // $("#all-betting-data .all-bet-slip").hide();
                // $("#all-betting-data .match-bet-slip").show();


                // $("#fancy-betting-data .all-bet-slip").hide();
                // $("#fancy-betting-data .fancy-bet-slip").show();


                var allLength = $('.all-bet-slip').length;

                $('#cnt_row').text('(' + allLength + ')');

                var matchLength = $('.match-bet-slip').length;
                $('#cnt_row1').text('(' + matchLength + ')');

                var fancyLength = $('.fancy-bet-slip').length;


                $('#cnt_row3').text('(' + fancyLength + ')');
                $("#pills-tab").find(".active").find("a").click();

            }
        });
    }


    function getOddValue(matchId, marketId, back_layStatus, placeName, elementId, selectionId, MarketTypes = '', target) {
        $("#ShowBetPrice.odds-input").attr("style", "color:#000 !important")
        var priceVal = $('#' + elementId).text();

        $('#betting_type').val('Match');
        <?php
        $user_type = $_SESSION['my_userdata']['user_type'];

        if ($user_type != 'User') { ?>
            return false;
        <?php }
        ?>
        $("#stakeValue").blur();
        if (back_layStatus == 0) {
            $("#placeBetSilp").css("background-color", "#a7d8fd");
        } else {
            $("#placeBetSilp").css("background-color", "#f9c9d4");
        }

        if (betSlip) {
            clearTimeout(betSlip);
            betSlip = null;
        }
        betSlip = setTimeout(function() {
            ClearAllSelection()
        }, 15000);

        var priceVal = parseFloat(priceVal);

        var bookmaker_id = $("#bookmaker_id").val();

        if (bookmaker_id == marketId) {


            priceVal = ((priceVal / 100) + 1).toFixed(2);

        }

        var MId = marketId.toString().replace('.', '');
        if (active_event_id) {
            matchId = active_event_id;
            marketId = active_event_id;
        }
        MatchMarketTypes = MarketTypes;

        // if (priceVal != '' && matchId != '' && back_layStatus != '' && placeName != '') {
        if ($(window).width() < 780) {
            $('.betSlipBox .mod-header').insertBefore('#placeBetSilp');
            $(".betSlipBox .mod-header").show();
            $(".betBox").insertAfter('.matchOpenBox_' + MId + '_' + selectionId);
            // if (gameType != 'market') {
            //    $("#betslip").insertAfter('.teenpatti-row');
            // } else {
            $(".betBox").insertAfter('.matchOpenBox_' + MId + '_' + selectionId);
            // $(".betBox").insertAfter('#MatchOddInfo');

            // }
        } else {
            $(".betSlipBox .mod-header").show();
            $(".betSlipBox").show();
        }

        $(".placebet").show();
        $(".placefancy").hide();
        $(".betSlipBox").show();
        $(".matchBox").show();
        $("#ShowRunnderName").text(placeName);
        $("#ShowBetPrice").val(priceVal);
        $("#TempShowBetPrice").val(priceVal);

        $("#chkValPrice").val(priceVal);
        $("#selectionId").val(selectionId);
        $("#matchId").val(matchId);
        $("#MarketId").val(marketId);
        $("#isback").val(back_layStatus);
        $("#placeName").val(placeName);
        $("#isfancy").val(0);
        $("#ShowBetPrice").prop('disabled', false);
        if (back_layStatus == 1) {
            $("#pandlosstitle").text('Profit');
            $(".BetFor").text('Back (Bet For)');
        } else {
            $(".BetFor").text('Lay (Bet For)');
            $("#ppandlosstitleandlosstitle").text('Liability');
        }

        if ($(window).width() < 780) {
            $('.betSlipBox .mod-header').insertBefore('#placeBetSilp');
            $(".betSlipBox .mod-header").show();
            $(".betBox").show();
            // $(".betBox").insertAfter('.fancy_' + fancyid);
        } else {
            $(".betBox").show();
            $(".betSlipBox .mod-header").show();
        }
        ClearAllSelection(0);
    }

    function StaKeAmount(stakeVal) {
        var stakeValue = parseFloat(stakeVal.value);
        var stakeVal = parseFloat($("#stakeValue").val());
        var t_stake = parseFloat(stakeValue + stakeVal);
        $("#stakeValue").val(t_stake);
        calc();
    }

    $('#stakeValue').keyup(function() {
        calc();
    })



    function calc() {
        var isfancy = $("#isfancy").val();
        var priceVal = parseFloat($("#ShowBetPrice").val());
        var t_stake = parseFloat($("#stakeValue").val());
        var isback = $("#isback").val();




        if (isfancy == 0) {
            // if (gameType == 'market') {
            //    if (MatchMarketTypes == 'M') {
            var pl = Math.round((priceVal * t_stake) / 100);

            //    } else {
            var pl = Math.round((priceVal * t_stake) - t_stake);
            //    }
            // } else {
            // var pl = Math.round((priceVal * t_stake) / 100);
            // }
            pl = parseFloat(pl.toFixed(2));
            if (isback == 1) {
                $("#profitData").text(pl);
                $("#LossData").text(t_stake);
            } else {
                $("#LossData").text(pl);
                $("#profitData").text(t_stake);
            }
            SetPosition(priceVal);
        } else {

            var inputno = parseInt($('#LayNO_' + isfancy).text());
            var inputyes = parseInt($('#BackYes_' + isfancy).text());
            var YesValume = parseFloat($("#YesValume_" + isfancy).text());
            var NoValume = parseFloat($("#NoValume_" + isfancy).text());
            var pl = parseFloat(t_stake);
            if (inputno == inputyes) {
                if (isback == 1) {
                    $("#profitData").text((YesValume * pl / 100).toFixed(2));
                    $("#LossData").text(pl.toFixed(2));
                } else {
                    $("#LossData").text((NoValume * pl / 100).toFixed(2));
                    $("#profitData").text(pl.toFixed(2));
                }
            } else {
                $("#profitData").text(pl.toFixed(2));
                $("#LossData").text(pl.toFixed(2));
            }
        }
    }


    function SetPosition(priceVal) {
        var MarketId = $("#MarketId").val();
        var MId = MarketId.replace('.', '');
        var selectionId = $("#selectionId").val();
        var isback = $("#isback").val();
        var stake = parseFloat($("#stakeValue").val());






        //  var MatchMarketTypes = 'M';
        $(".position_" + MId).each(function(i) {
            var selecid = $(this).attr('data-id');
            var winloss = parseFloat($(this).val());
            var curr = 0;



            if (selectionId == selecid) {
                if (isback == 1) {
                    if (MatchMarketTypes == 'M') {
                        curr = winloss + ((priceVal * stake) / 100);


                    } else {
                        curr = winloss + ((priceVal * stake) - stake);


                    }
                } else {
                    if (MatchMarketTypes == 'M') {
                        curr = winloss + (-1 * parseFloat((priceVal * stake) / 100));


                    } else {

                        curr = winloss + (-1 * parseFloat((priceVal * stake) - stake));


                    }
                }
            } else {
                if (isback == 1) {
                    curr = winloss + (-1 * (stake));
                } else {
                    curr = winloss + stake;
                }
            }
            var currV = Math.round(curr);

            $("#" + selecid + "_maxprofit_loss_runner_" + MId).attr('data-val', currV)

            $("#" + selecid + "_maxprofit_loss_runner_" + MId).text(Math.abs(currV)).css('color', getValColor(currV));
        });
    }

    function ClearAllSelection(hide = 1) {
        $("#stakeValue").val(0);
        var MarketId = $("#MarketId").val();

        var MId = MarketId.replace('.', '');
        $(".position_" + MId).each(function(i) {
            var selecid = $(this).attr('data-id');

            var winloss = parseFloat($(this).val());
            $("#" + selecid + "_maxprofit_loss_runner_" + MId).text(Math.abs(winloss)).css('color', getValColor(winloss));
        });
        $("#profitData").text(0);
        $("#LossData").text(0);
        if (hide == 1) {
            $(".betBox").hide();
        } else {
            $(".betBox").show();
        }
    }

    function PlaceBet() {
        clearTimeout(betSlip);

        var stake = parseFloat($("#stakeValue").val());
        var priceVal = parseFloat($("#ShowBetPrice").val());
        var MarketId = $("#MarketId").val();
        var matchId = $("#matchId").val();
        var betting_type = $("#betting_type").val();
        var event_type = $("#event_type").val();


        if (!$.isNumeric(priceVal) || priceVal < 1) {
            new PNotify({
                title: 'Error',
                text: 'Invalid stake/odds.',
                type: 'error',
                styling: 'bootstrap3',
                delay: 1000
            });
            $("#stakeValue").val(0);
            $("#profitData").text('');
            $("#LossData").text('');
        } else if (matchId != '') {
            $(".loader").show();

            $(".CommanBtn").attr("disabled", true);

            var MarketType = $("#MarketType").val();
            var stakeValue = parseInt($("#stakeValue").val());
            var P_and_l = (priceVal * stake) - stake;
            var profit = parseFloat($('#profitData').text());
            var loss = parseFloat($('#LossData').text());
            var TempShowBetPrice = parseFloat($('#TempShowBetPrice').val());


            var exposure1 = 0;
            var exposure2 = 0;

            if (betting_type == 'Match') {

            }

            if (betting_type == 'Match') {
                $(".position_" + MarketId.replace('.', '')).each(function(i) {
                    var selecid = $(this).attr('data-id');

                    var exposureCount = $("#" + selecid + "_maxprofit_loss_runner_" + MarketId.replace('.', '')).attr('data-val');
                    // var currV = Math.round(curr);

                    if (i == 0) {
                        exposure1 = exposureCount;
                    } else if (i == 1) {
                        exposure2 = exposureCount;

                    }

                });

            } else {
                exposure1 = profit;
                exposure2 = loss * -1;

            }


            var formData = {
                selectionId: $("#selectionId").val(),
                matchId: $("#matchId").val(),
                isback: $("#isback").val(),
                placeName: $("#placeName").val(),
                // MatchName: $("#MatchName").val(),
                stake: stake,
                priceVal: priceVal,
                p_l: P_and_l,
                MarketId: MarketId.toString(),
                MarketType: MarketType,
                betting_type: betting_type,
                profit: profit,
                loss: loss,
                exposure1: exposure1,
                exposure2: exposure2,
                event_type: event_type
            };
            setTimeout(function() {


                $.ajax({
                    method: 'POST',
                    url: '<?php echo base_url(); ?>admin/Events/savebet',
                    data: formData,
                    dataType: 'json',
                    async: false,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    beforeSend: function() {

                        // $(".loader").show();
                    },
                    success: function(data) {
                        $(".loader").hide();
                        var selectionId = $("#selectionId").val();

                        $(".CommanBtn").attr("disabled", false);
                        if (!data.success) {
                            ClearAllSelection(1);

                            new PNotify({
                                title: 'Error',
                                text: data.message,
                                type: 'error',
                                styling: 'bootstrap3',
                                delay: 1000
                            });
                        } else {
                            if (betting_type == 'Match') {
                                $(".position_" + MarketId.replace('.', '')).each(function(i) {
                                    var selecid = $(this).attr('data-id');

                                    var exposureCount = $("#" + selecid + "_maxprofit_loss_runner_" + MarketId.replace('.', '')).attr('data-val');

                                    $(this).val(exposureCount);


                                });
                            }
                            ClearAllSelection(1);

                            var betting_details = {
                                'bet_details': {},
                                'users': ['140', "138"]
                            }
                            socket.emit('betting_placed', {
                                betting_details: betting_details
                            });
                            //  getFancyData();
                            new PNotify({
                                title: 'Success',
                                text: data.message,
                                type: 'success',
                                styling: 'bootstrap3',
                                delay: 1000
                            });


                            getFancysExposure();
                            fetchBttingList();

                        }
                    },
                    error: function(jqXHR) {
                        ClearAllSelection(1);

                    }
                });
            }, 0);
        } else {
            ClearAllSelection(1);

            new PNotify({
                title: ' Error',
                text: 'Some Thing Went worng',
                type: 'error',
                styling: 'bootstrap3',
                delay: 1000
            });
            $("#stakeValue").val(0);
            $("#profitData").text('');
            $("#LossData").text('');
        }
    }




    function betfancy(matchid, fancyid, isback) {
        $("#ShowBetPrice.odds-input").attr("style", "color:#000 !important")
        <?php
        $user_type = $_SESSION['my_userdata']['user_type'];

        if ($user_type != 'User') { ?>
            return false;
        <?php }
        ?>
        var userType1 = 4;

        if (userType1 == 4) {
            if (isback == 1) {
                $("#placeBetSilp").css("background-color", "#a7d8fd");
            } else {
                $("#placeBetSilp").css("background-color", "#f9c9d4");
            }

            var inputno = parseInt($('#LayNO_' + fancyid).text());


            var inputyes = parseInt($('#BackYes_' + fancyid).text());
            var headname = $(".fancyhead" + fancyid).text();
            $('#selectionId').val(fancyid);
            $('#betting_type').val('Fancy');

            $("#stakeValue").focus();
            $('#stakeValue').val(0);
            $("#profitData").text(0);
            $("#LossData").text(0);
            $('#matchId').val(matchid);
            $('#isback').val(isback);
            $('#placeName').val(headname);
            $("#isfancy").val(fancyid);
            $("#ShowBetPrice").prop('disabled', true);


            if (isback == 0) {
                $(".BetFor").text('Lay (Bet for)');
                $("#pandlosstitle").text('Liability');
                $("#ShowBetPrice").val(inputno);

                var check_no_value = setInterval(function() {
                    var real_inputno = parseInt($('#LayNO_' + fancyid).text());

                    if (inputno != real_inputno) {
                        clearInterval(check_no_value);

                        ClearAllSelection(1);
                    }
                }, 1000);

            } else {

                var check_yes_value = setInterval(function() {

                    var real_inputyes = parseInt($('#BackYes_' + fancyid).text());


                    if (inputyes != real_inputyes) {
                        clearInterval(check_yes_value);

                        ClearAllSelection(1);

                    }

                }, 1000);
                $(".BetFor").text('Back (Bet for)');
                $("#pandlosstitle").text('Profit');
                $("#ShowBetPrice").val(inputyes);
            }
            $(".placebet").hide();
            $(".placefancy").show();
            $("#ShowRunnderName").text(headname);
            if ($(window).width() < 780) {
                $('.betSlipBox .mod-header').insertBefore('#placeBetSilp');
                $(".betSlipBox .mod-header").show();
                $(".betBox").show();
                $(".betBox").insertAfter('.fancy_' + fancyid);
            } else {
                $(".betBox").show();
                $(".betSlipBox .mod-header").show();
            }
        }
    }


    function PlaceFancy() {
        var amount = parseFloat($("#stakeValue").val());
        var OddValue = $('#isback').val();
        var betOddValue = $("#ShowBetPrice").val();
        var fancyid = $("#isfancy").val();
        var YesValume = parseFloat($("#YesValume_" + fancyid).text());
        var NoValume = parseFloat($("#NoValume_" + fancyid).text());
        if (!$.isNumeric(amount) || amount < 1 || !$.isNumeric(betOddValue) || betOddValue < 1) {
            new PNotify({
                title: 'Error',
                text: 'Invalid stake/odd',
                type: 'error',
                styling: 'bootstrap3',
                delay: 1000
            });
        } else if (!$.isNumeric(NoValume) || NoValume < 1 || !$.isNumeric(YesValume) || YesValume < 1) {
            new PNotify({
                title: 'Error',
                text: 'Invalid session Volume',
                type: 'error',
                styling: 'bootstrap3',
                delay: 1000
            });
        } else {
            $(".CommanBtn").attr("disabled", true);
            $(".loader").show();
            var sessionData = {
                betValue: amount,
                betOddValue: betOddValue,
                FancyID: $("#isfancy").val(),
                matchId: $("#matchId").val(),
                OddValue: $('#isback').val(),
                HeadName: $('#placeName').val()
            };
            setTimeout(function() {
                $.ajax({
                    url: 'fancybet',
                    type: "POST",
                    data: setFormData(sessionData),
                    dataType: 'json',
                    async: false,
                    success: function(data) {
                        $(".CommanBtn").attr("disabled", false);
                        $(".loader").hide();
                        ClearAllSelection(1);
                        getBets(0);
                        if (data.error == 0) {
                            //$("#UserLiability").text(data.cipsData[0].Liability);
                            $(".liability").text(data.cipsData[0].Liability);
                            //$("#Wallet").text(data.cipsData[0].Balance);
                            $(".mWallet").text(data.cipsData[0].Balance);
                            new PNotify({
                                title: 'Success',
                                text: 'Place Bet Successfully...',
                                type: 'success',
                                styling: 'bootstrap3',
                                delay: 1000
                            });
                        } else {
                            new PNotify({
                                title: 'Error',
                                text: data.message,
                                type: 'error',
                                styling: 'bootstrap3',
                                delay: 1000
                            });
                        }
                    }
                });
            }, 0);
        }
    }


    // function showEditStakeModel() {
    //     $('#addUser').modal('show');
    // }

    // function submit_update_chip() {

    //     var datastring = $("#stockez_add").serializeJSON();

    //     $.ajax({
    //         type: "post",
    //         url: '<?php echo base_url(); ?>admin/Chip/update_user_chip',
    //         data: datastring,
    //         cache: false,
    //         dataType: "json",
    //         success: function success(output) {

    //             if (output.success) {
    //                 $("#divLoading").show();
    //                 $("#divLoading").html("<span class='succmsg'>" + output.message + "</span>");
    //                 $("#divLoading").fadeOut(3000);
    //                 new PNotify({
    //                     title: 'Success',
    //                     text: output.message,
    //                     type: 'success',
    //                     styling: 'bootstrap3',
    //                     delay: 1000
    //                 });
    //                 location.reload();
    //             } else {
    //                 $("#divLoading").show();
    //                 $("#divLoading").html("<span class='errmsg'>" + output.message + "</span>");
    //                 $("#divLoading").fadeOut(3000);
    //                 new PNotify({
    //                     title: 'Error',
    //                     text: output.message,
    //                     type: 'error',
    //                     styling: 'bootstrap3',
    //                     delay: 1000
    //                 });
    //             }
    //         }
    //     });
    // }

    function ClearStack(hide = 1) {
        $("#stakeValue").val(0);
        var MarketId = $("#MarketId").val();

        var MId = MarketId.replace('.', '');
        $(".position_" + MId).each(function(i) {
            var selecid = $(this).attr('data-id');
            var winloss = parseFloat($(this).val());
            $("#" + selecid + "_maxprofit_loss_runner_" + MId).text(Math.abs(winloss)).css('color', getValColor(winloss));
        });
        $("#profitData").text(0);
        $("#LossData").text(0);
    }
</script>

<script>
    $(document).ready(function() {
        let userName = "<?php echo get_user_name(); ?>";
        let room = "<?php echo $event_id; ?>";
        let ID = "";
        //send event that user has joined room
        socket.emit("join_room", {
            username: userName,
            roomName: room
        });



        <?php


        if (isset($_GET['match_id']) && isset($_GET['market_id'])) { ?>
            MarketSelection(<?php echo $_GET['market_id']; ?>, <?php echo $_GET['match_id']; ?>, "<?php echo isset($_GET['event_type']) ? $_GET['event_type'] : null; ?>");
        <?php } ?>



        socket.on('market_update', function(data) {
            //events   
            var MarketId = $('#MarketId').val();
            var matchId = "<?php echo $event_id; ?>";
            // if (MarketId) {
            // var market = data.marketodds[matchId]

            if (data.marketodds.length > 0) {

                var market = data.marketodds.find(o => o.event_id == matchId);

                if (market) {
                    if (market.market_types.length > 0) {
                        $.each(market.market_types, function(index, market_type) {
                            $.each(market_type.runners, function(index, runner) {
                                if (runner.status == 'OPEN' || runner.status == 'ACTIVE') {

                                    // $('.overlay_matchBoxs_' + market_type.market_id.replace('.', '')).fadeOut();

                                    $('#availableToBack3_size_' + market_type.market_id.replace('.', '') + '_' + runner.selection_id).parent().parent().removeClass('overlay');
                                } else {


                                    // $('.overlay_matchBoxs_' + market_type.market_id.replace('.', '')).fadeIn();

                                    $('#availableToBack3_size_' + market_type.market_id.replace('.', '') + '_' + runner.selection_id).parent().parent().addClass('overlay');

                                    $('.status_matchBoxs_' + market_type.market_id.replace('.', '')).text(market_type.status);
                                }

                                //  if (j == 0) {

                                ///*************Available To Bck */
                                // $('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).parent()[0].closest( "h6" ).remove();

                                $(`#availableToLay1_price_${runner.market_id.replace('.', '')}_${runner.selection_id}`).parent().find('h6').remove();
                                if (runner.status == 'SUSPENDED') {
                                    $('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).parent().append("<h6>SUSPENDED</h6>");

                                    if (parseFloat($('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_3_price)) {
                                        $('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);

                                    } else {
                                        $('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);
                                    }


                                    if (parseFloat($('#availableToBack2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_2_price)) {
                                        $('#availableToBack2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);

                                    } else {
                                        $('#availableToBack2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);
                                    }

                                    if (parseFloat($('#availableToBack1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_1_price)) {
                                        $('#availableToBack1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);

                                    } else {
                                        $('#availableToBack1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);
                                    }


                                    if (parseFloat($('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_1_price)) {
                                        $('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);

                                    } else {
                                        $('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);
                                    }

                                    if (parseFloat($('#availableToLay2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_2_price)) {
                                        $('#availableToLay2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);

                                    } else {
                                        $('#availableToLay2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);
                                    }

                                    if (parseFloat($('#availableToLay3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_3_price)) {
                                        $('#availableToLay3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);

                                    } else {
                                        $('#availableToLay3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(0);
                                    }

                                } else {
                                    if (parseFloat($('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_3_price)) {
                                        $('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.back_3_price));

                                    } else {
                                        $('#availableToBack3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.back_3_price));
                                    }


                                    if (parseFloat($('#availableToBack2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_2_price)) {
                                        $('#availableToBack2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.back_2_price));

                                    } else {
                                        $('#availableToBack2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.back_2_price));
                                    }

                                    if (parseFloat($('#availableToBack1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_1_price)) {
                                        $('#availableToBack1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.back_1_price));

                                    } else {
                                        $('#availableToBack1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.back_1_price));
                                    }


                                    if (parseFloat($('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_1_price)) {
                                        $('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.lay_1_price));

                                    } else {
                                        $('#availableToLay1_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.lay_1_price));
                                    }

                                    if (parseFloat($('#availableToLay2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_2_price)) {
                                        $('#availableToLay2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.lay_2_price));

                                    } else {
                                        $('#availableToLay2_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.lay_2_price));
                                    }

                                    if (parseFloat($('#availableToLay3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_3_price)) {
                                        $('#availableToLay3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.lay_3_price));

                                    } else {
                                        $('#availableToLay3_price_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(parseFloat(runner.lay_3_price));
                                    }

                                }


                                /************************Size */

                                if (parseFloat($('#availableToBack3_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_3_size)) {
                                    $('#availableToBack3_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.back_3_size).parent().addClass('yellow');

                                } else {
                                    $('#availableToBack3_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.back_3_size).parent().removeClass('yellow');
                                }


                                if (parseFloat($('#availableToBack2_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_2_size)) {
                                    $('#availableToBack2_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.back_2_size).parent().addClass('yellow');

                                } else {
                                    $('#availableToBack2_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.back_2_size).parent().removeClass('yellow');
                                }

                                if (parseFloat($('#availableToBack1_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.back_1_size)) {
                                    $('#availableToBack1_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.back_1_size).parent().addClass('yellow');

                                } else {
                                    $('#availableToBack1_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.back_1_size).parent().removeClass('yellow');
                                }


                                if (parseFloat($('#availableToLay1_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_1_size)) {
                                    $('#availableToLay1_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.lay_1_size).parent().addClass('yellow');

                                } else {
                                    $('#availableToLay1_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.lay_1_size).parent().removeClass('yellow');
                                }

                                if (parseFloat($('#availableToLay2_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_2_size)) {
                                    $('#availableToLay2_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.lay_2_size).parent().addClass('yellow');

                                } else {
                                    $('#availableToLay2_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.lay_2_size).parent().removeClass('yellow');
                                }

                                if (parseFloat($('#availableToLay3_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text()) !== parseFloat(runner.lay_3_size)) {
                                    $('#availableToLay3_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.lay_3_size).parent().addClass('yellow');

                                } else {
                                    $('#availableToLay3_size_' + runner.market_id.replace('.', '') + '_' + runner.selection_id).text(runner.lay_3_size).parent().removeClass('yellow');
                                }


                            });
                        });
                    }
                }

            }

        });

        socket.on('fancy_update', function(data) {

            console.log("Here");
            var MarketId = $('#MarketId').val();
            var matchId = "<?php echo $event_id; ?>";
            <?php

            if ($fancy_user_info->is_fancy_active == 'No') { ?>
                return false;
            <?php } ?>

            if (matchId) {

                if (data.fantacy.length > 0) {
                    var fancys = data.fantacy.find(o => o.event_id == matchId);
                    if (fancys) {

                        fancys = fancys.fancy_data;


                        if (fancys.length) {
                            for (var j = 0; j < fancys.length; j++) {
                                if (fancys[j].cron_disable == 'Yes') {
                                    // ClearAllSelection(1);


                                    $('.fancy_lay_price_' + fancys[j].selection_id).parent().parent().fadeOut();
                                } else {
                                    if (fancys[j]) {
                                        var block_market_fancys = fancys[j].block_market;
                                        var block_all_market_fancys = fancys[j].block_all_market;
                                        // var block_market_fancys = [];
                                        // var block_all_market_fancys = [];

                                        var find_fancy_all_block = block_all_market_fancys.filter(element => {

                                            return superiors.includes(element.user_id.toString())
                                        });

                                        if (find_fancy_all_block.length > 0) {
                                            // ClearAllSelection(1);
                                            $('.fancy_lay_price_' + fancys[j].selection_id).parent().parent().fadeOut();



                                        } else {

                                            var find_fancy_block = block_market_fancys.filter(element => {

                                                return superiors.includes(element.user_id.toString())
                                            });

                                            if (find_fancy_block.length > 0) {
                                                // ClearAllSelection(1);
                                                $('.fancy_lay_price_' + fancys[j].selection_id).parent().parent().fadeOut();



                                            } else {
                                                $('.fancy_lay_price_' + fancys[j].selection_id).parent().parent().fadeIn();
                                                var fancyHtml = '';

                                                if (!$('.fancy_' + fancys[j].selection_id).length) {

                                                    fancyHtml += '<div class="block_box f_m_' + fancys[j].match_id + ' fancy_' + fancys[j].selection_id + ' f_m_31236 fullrow margin_bottom fancybox" id="fancyLM_31057636">';

                                                    fancyHtml += '<div class="fancy-rows list-item fancy_220239 f_m_31057636 f_m_undefined" data-id="220239">';
                                                    fancyHtml += '<div class="event-sports event-sports-name"><input type="hidden" value="LM" class="fancyType220239"><input type="hidden" value="1.190470637" class="fancyMID220239">';
                                                    fancyHtml += '<span  onclick="getPosition(' + fancys[j].selection_id + ')"  class="event-name fancyhead' + fancys[j].selection_id + '" id="fancy_name' + fancys[j].selection_id + '">' + fancys[j].runner_name + '</span>';

                                                    fancyHtml += '<div class="match_odds-top-left min-max-mobile dropdown">';

                                                    fancyHtml += '<span class="dropdown-toggle" data-toggle="dropdown"> <img src="<?php echo base_url(); ?>assets/images/matchodds-info-icon.png" class="fancy-info-btn"></span>';
                                                    fancyHtml += '<ul class="dropdown-menu">';
                                                    fancyHtml += '<li> Min:undefined </li>';
                                                    fancyHtml += '<li>Max:undefined</li>';
                                                    fancyHtml += '</ul>';
                                                    fancyHtml += '</div>';



                                                    fancyHtml += '<span class="fancy-exp dot fancy_exposure_' + fancys[j].selection_id + ' ">0</span>';
                                                    fancyHtml += '<button class="btn btn-xs btn-info" onclick="getPosition(' + fancys[j].selection_id + ')">Bets</button><span class="fancy_exposure" id="fancy_lib220239"></span>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '<div class="fancy_div">';
                                                    fancyHtml += '<div class="fancy_buttone">';
                                                    fancyHtml += '<div class="fancy-lays bet-button lay mark-lay" id="fancy_lay_' + fancys[j].selection_id + '" onclick="betfancy(`' + fancys[j].match_id + '`,`' + fancys[j].selection_id + '`,`' + 0 + '`);">';
                                                    fancyHtml += '<strong id="LayNO_' + fancys[j].selection_id + '">' + parseFloat(fancys[j].lay_price1) + '</strong>';
                                                    fancyHtml += '<div class="size">';
                                                    fancyHtml += '<span id="NoValume_' + fancys[j].selection_id + '" class="disab-btn fancy_lay_size_' + fancys[j].selection_id + '">' + fancys[j].lay_size1 + '</span>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '<div class="fancy-backs bet-button back mark-back"   onclick="betfancy(`' + fancys[j].match_id + '`,`' + fancys[j].selection_id + '`,`' + 1 + '`);">';
                                                    fancyHtml += '<strong id="BackYes_' + fancys[j].selection_id + '">' + parseFloat(fancys[j].back_price1) + '</strong>';
                                                    fancyHtml += '<div class="size">';
                                                    fancyHtml += '<span id="YesValume_' + fancys[j].selection_id + '" class="disab-btn fancy_back_size_' + fancys[j].selection_id + '">' + fancys[j].back_size1 + '</span>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '<div class="show_msg_box_220239"></div>';
                                                    fancyHtml += '</div>';
                                                    fancyHtml += '<p class="fancy_message f_message220239"></p>';
                                                    fancyHtml += '</div>';

                                                    fancyHtml += '</div>';



                                                    ////////



                                                    // fancyHtml += '<div class="fullrow margin_bottom fancybox" block_box f_m_' + fancys[j].match_id + ' fancy_' + fancys[j].selection_id + ' f_m_31236" data-id="31236">';

                                                    // fancyHtml += '<ul class="sport-high fancyListDiv">';
                                                    // fancyHtml += '<li>';
                                                    // fancyHtml += '<div class="ses-fan-box">';
                                                    // fancyHtml += '<table class="table table-striped  bulk_actions">';
                                                    // fancyHtml += '<tbody>';
                                                    // fancyHtml += '<tr class="session_content">';
                                                    // fancyHtml += '<td><span class="fancyhead' + fancys[j].selection_id + '" id="fancy_name' + fancys[j].selection_id + '">' + fancys[j].runner_name + '</span><b class="fancyLia' + fancys[j].selection_id + '"></b><p class="position_btn"></td>';


                                                    // fancyHtml += '<td></td>';
                                                    // fancyHtml += '<td></td>';

                                                    // fancyHtml += '<td class="fancy_lay" id="fancy_lay_' + fancys[j].selection_id + '" onclick="betfancy(`' + fancys[j].match_id + '`,`' + fancys[j].selection_id + '`,`' + 0 + '`);">';

                                                    // fancyHtml += '<button class="lay-cell cell-btn fancy_lay_price_' + fancys[j].selection_id + '" id="LayNO_' + fancys[j].selection_id + '">' + parseFloat(fancys[j].lay_price1) + '</button>';

                                                    // fancyHtml += '<button id="NoValume_' + fancys[j].selection_id + '" class="disab-btn fancy_lay_size_' + fancys[j].selection_id + '">' + fancys[j].lay_size1 + '</button></td>';

                                                    // fancyHtml += '<td class="fancy_back" onclick="betfancy(`' + fancys[j].match_id + '`,`' + fancys[j].selection_id + '`,`' + 1 + '`);">';

                                                    // fancyHtml += '<button class="back-cell cell-btn fancy_back_price_' + fancys[j].selection_id + '" id="BackYes_' + fancys[j].selection_id + '">' + parseFloat(fancys[j].back_price1) + '</button>';

                                                    // fancyHtml += '<button id="YesValume_' + fancys[j].selection_id + '" class="disab-btn fancy_back_size_' + fancys[j].selection_id + '">' + fancys[j].back_size1 + '</button>';
                                                    // fancyHtml += '</td>';

                                                    // fancyHtml += '<td>';
                                                    // fancyHtml += '</td>';
                                                    // fancyHtml += '<td>';
                                                    // fancyHtml += '</td>';
                                                    // fancyHtml += '</tr>';
                                                    // fancyHtml += '</tbody>';
                                                    // fancyHtml += '</table>';
                                                    // fancyHtml += '</div>';
                                                    // fancyHtml += '</li>';
                                                    // fancyHtml += '</ul></div>';


                                                    // console.log('fancyHtml', fancyHtml);
                                                    $('.fancyAPI').append(fancyHtml);
                                                }

                                                // if (fancys[j].back_price1 == 'Ball') {
                                                //     $('.fancy_lay_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');
                                                //     $('.fancy_back_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');
                                                //     $('.fancy_lay_price_' + fancys[j].selection_id).text(fancys[j].lay_price1);
                                                //     $('.fancy_back_price_' + fancys[j].selection_id).text(fancys[j].back_price1);
                                                //     $('.fancy_lay_size_' + fancys[j].selection_id).text(fancys[j].lay_size1);
                                                //     $('.fancy_back_size_' + fancys[j].selection_id).text(fancys[j].back_size1);
                                                // }
                                                $(`#fancy_lay_${fancys[j].selection_id}`).parent().find('h6').remove();
                                                if (fancys[j].game_status == 'Ball Running') {

                                                    $(`#fancy_lay_${fancys[j].selection_id}`).parent().append("<h6>Ball Running</h6>");

                                                    // $('.fancy_lay_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');
                                                    // $('.fancy_back_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');

                                                    $('.fancy_lay_price_' + fancys[j].selection_id).text("-");
                                                    $('.fancy_back_price_' + fancys[j].selection_id).text('-');
                                                    $('.fancy_lay_size_' + fancys[j].selection_id).text('Ball Running');
                                                    $('.fancy_back_size_' + fancys[j].selection_id).text('Ball Running');
                                                } else if (fancys[j].game_status == 'SUSPENDED') {
                                                    $(`#fancy_lay_${fancys[j].selection_id}`).parent().append("<h6>SUSPENDED</h6>");
                                                    // $('.fancy_lay_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');
                                                    // $('.fancy_back_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');

                                                    $('.fancy_lay_price_' + fancys[j].selection_id).text("-");
                                                    $('.fancy_back_price_' + fancys[j].selection_id).text('-');
                                                    $('.fancy_lay_size_' + fancys[j].selection_id).text('SUSPENDED');
                                                    $('.fancy_back_size_' + fancys[j].selection_id).text('SUSPENDED');
                                                } else if (fancys[j].back_price1 == 0) {
                                                    $(`#fancy_lay_${fancys[j].selection_id}`).parent().append("<h6>SUSPENDED</h6>");

                                                    $('.fancy_lay_price_' + fancys[j].selection_id).text('-');
                                                    $('.fancy_back_price_' + fancys[j].selection_id).text('-');
                                                    $('.fancy_lay_size_' + fancys[j].selection_id).text('SUSPENDED');
                                                    $('.fancy_back_size_' + fancys[j].selection_id).text('SUSPENDED');
                                                } else {
                                                    $('.fancy_lay_price_' + fancys[j].selection_id).text(parseFloat(fancys[j].lay_price1));
                                                    $('.fancy_back_price_' + fancys[j].selection_id).text(parseFloat(fancys[j].back_price1));
                                                    $('.fancy_lay_size_' + fancys[j].selection_id).text(fancys[j].lay_size1);
                                                    $('.fancy_back_size_' + fancys[j].selection_id).text(fancys[j].back_size1);
                                                }
                                            }
                                        }




                                    } else {
                                        $('.fancy_lay_price_' + fancys[j].selection_id).parent().parent().fadeIn();
                                        var fancyHtml = '';

                                        if (!$('.fancy_' + fancys[j].selection_id).length) {
                                            fancyHtml += '<div class="block_box f_m_' + fancys[j].match_id + ' fancy_' + fancys[j].selection_id + ' f_m_31236" data-id="31236">';

                                            fancyHtml += '<ul class="sport-high fancyListDiv">';
                                            fancyHtml += '<li>';
                                            fancyHtml += '<div class="ses-fan-box">';
                                            fancyHtml += '<table class="table table-striped  bulk_actions">';
                                            fancyHtml += '<tbody>';
                                            fancyHtml += '<tr class="session_content">';
                                            fancyHtml += '<td><span class="fancyhead' + fancys[j].selection_id + '" id="fancy_name' + fancys[j].selection_id + '">' + fancys[j].runner_name + '</span><b class="fancyLia' + fancys[j].selection_id + '"></b><p class="position_btn"></td>';


                                            fancyHtml += '<td></td>';
                                            fancyHtml += '<td></td>';

                                            fancyHtml += '<td class="fancy_lay" id="fancy_lay_' + fancys[j].selection_id + '" onclick="betfancy(`' + fancys[j].match_id + '`,`' + fancys[j].selection_id + '`,`' + 0 + '`);">';

                                            fancyHtml += '<button class="lay-cell cell-btn fancy_lay_price_' + fancys[j].selection_id + '" id="LayNO_' + fancys[j].selection_id + '">' + parseFloat(fancys[j].lay_price1) + '</button>';

                                            fancyHtml += '<button id="NoValume_' + fancys[j].selection_id + '" class="disab-btn fancy_lay_size_' + fancys[j].selection_id + '">' + fancys[j].lay_size1 + '</button></td>';

                                            fancyHtml += '<td class="fancy_back" onclick="betfancy(`' + fancys[j].match_id + '`,`' + fancys[j].selection_id + '`,`' + 1 + '`);">';

                                            fancyHtml += '<button class="back-cell cell-btn fancy_back_price_' + fancys[j].selection_id + '" id="BackYes_' + fancys[j].selection_id + '">' + parseFloat(fancys[j].back_price1) + '</button>';

                                            fancyHtml += '<button id="YesValume_' + fancys[j].selection_id + '" class="disab-btn fancy_back_size_' + fancys[j].selection_id + '">' + fancys[j].back_size1 + '</button>';
                                            fancyHtml += '</td>';

                                            fancyHtml += '<td>';
                                            fancyHtml += '</td>';
                                            fancyHtml += '<td>';
                                            fancyHtml += '</td>';
                                            fancyHtml += '</tr>';
                                            fancyHtml += '</tbody>';
                                            fancyHtml += '</table>';
                                            fancyHtml += '</div>';
                                            fancyHtml += '</li>';
                                            fancyHtml += '</ul></div>';

                                            $('.fancyAPI').append(fancyHtml);
                                        }
                                        $(`#fancy_lay_${fancys[j].selection_id}`).parent().find('h6').remove();
                                        if (fancys[j].game_status == 'Ball Running') {
                                            $(`#fancy_lay_${fancys[j].selection_id}`).parent().append("<h6>Ball Running</h6>");
                                            // $('.fancy_lay_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');
                                            // $('.fancy_back_price_' + fancys[j].selection_id).parent().attr('disabled', 'disabled');

                                            $('.fancy_lay_price_' + fancys[j].selection_id).text("-");
                                            $('.fancy_back_price_' + fancys[j].selection_id).text('-');
                                            $('.fancy_lay_size_' + fancys[j].selection_id).text('Ball Running');
                                            $('.fancy_back_size_' + fancys[j].selection_id).text('Ball Running');
                                        } else {
                                            $('.fancy_lay_price_' + fancys[j].selection_id).text(parseFloat(fancys[j].lay_price1));
                                            $('.fancy_back_price_' + fancys[j].selection_id).text(parseFloat(fancys[j].back_price1));
                                            $('.fancy_lay_size_' + fancys[j].selection_id).text(fancys[j].lay_size1);
                                            $('.fancy_back_size_' + fancys[j].selection_id).text(fancys[j].back_size1);
                                        }
                                    }




                                }
                            }
                        }
                    }
                }
            }
        });


        socket.on('betting_placed', function(data) {
            fetchBttingList();
            getFancysExposure();

            // fetchMatchOddsPositionList();

        });

        socket.on('betting_settle', function(data) {
            fetchBttingList();
            getFancysExposure();
            // fetchMatchOddsPositionList();
        });
    });

    function getValColor(val) {
        if (val == '' || val == null || val == 0) return '#000000';
        else if (val > 0) return '#007c0e';
        else return '#ff0000';
    }


    // function getPosition(fancyid) {
    //     $.ajax({
    //         url: '<?php echo base_url(); ?>admin/Events/getPosition',
    //         data: {
    //             // userId1: userId1,
    //             fancyid: fancyid,
    //             typeid: 2,
    //             event_id: <?php echo $event_id; ?>,
    //             yesval: $("#BackYes_" + fancyid).text(),
    //             noval: $("#LayNO_" + fancyid).text(),
    //             // usertype: userType1,
    //             // 'compute': Cookies.get('_compute')
    //         },
    //         type: "POST",
    //         success: function success(output) {
    //             $("#fancy_book_body_" + fancyid).html(output);
    //         }
    //     });
    // }

    function getPosition(fancyid) {
        $.ajax({
            url: '<?php echo base_url(); ?>admin/Events/getPosition',
            data: {
                // userId1: userId1,
                fancyid: fancyid,
                typeid: 2,
                yesval: $("#BackYes_" + fancyid).text(),
                noval: $("#LayNO_" + fancyid).text(),
                event_id: <?php echo $event_id; ?>
                // usertype: userType1,
                // 'compute': Cookies.get('_compute')
            },
            type: "POST",
            success: function success(output) {
                $("#fancyposition .modal-body").html(output);
                $('#fancyposition').modal('toggle');
            }
        });
    }


    // function add_new_chip() {
    //     var html = '';
    //     html += '<div class="fullrow">'
    //     html += '<input type="hidden" name="user_chip_id[]" class="form-control" required />';
    //     html += '<div class="col-md-6 col-sm-6col-xs-6">';
    //     html += '<div class="form-group"><label for="email">Chips Name :</label><input type="text" name="chip_name[]" class="form-control" required value=""></div>';
    //     html += '</div>';
    //     html += '<div class=" col-md-6 col-sm-6col-xs-6">';
    //     html += '<div class="form-group"><label for="pwd">Chip Value :</label><input type="number" name="chip_value[]" class="form-control" required value=""></div>';
    //     html += '</div>';
    //     html += '</div>';

    //     $('#chip-moddal-body').append(html);
    // }


    $(function() {
        socket.on('block_markets', function(data) {

            if (data) {
                var superior_id = data.data.userId;
                var IsPlay = data.data.IsPlay;
                var Type = data.data.Type;
                var fancyId = data.data.fancyId;
                var marketId = data.data.marketId;
                var matchId = data.data.matchId;
                var sportId = data.data.sportId;
                var userId = data.data.userId;
                var usertype = data.data.usertype;



                var checkSuperiorUser = superiors.includes(superior_id.toString())
                if (checkSuperiorUser) {
                    if (IsPlay == 0) {
                        if (Type == 'Event') {

                            if (matchId == '<?php echo $event_id; ?>') {
                                window.location.href = '<?php echo base_url(); ?>dashboard';
                            }

                        } else if (Type == 'Sport') {
                            if (sportId == '<?php echo $event_type; ?>') {
                                window.location.href = '<?php echo base_url(); ?>dashboard';
                            }
                        } else if (Type == "Market") {
                            var rmMarketId = marketId.toString().replace('.', '');
                            $('.matchOpenBox_' + rmMarketId).parent().fadeOut();
                        } else if (Type == "AllFancy") {
                            $('.fancyAPI').html('');
                        } else if (Type == "Fancy") {
                            $('#fancy_lay_' + fancyId).parent().remove();
                        }

                    }

                } else {}
            }
        });


        socket.on('score_update', function(data) {


            // var match_id = '<?php echo $event_id; ?>';







            // if (data.scores.event_id === match_id) {
            //     var match_score = data.scores.doc[0];

            //     if (match_score) {
            //         var currentInningsNumber = match_score.data.score.currentInningsNumber;
            //         var innings = match_score.data.score.innings;


            //         if (innings) {
            //             var inning = innings.find(o => o.inningsNumber == currentInningsNumber);
            //             var batsemenDatas = inning.batsmen.filter(o => o.active == true);
            //             var bowler = inning.bowlers.find(o => o.isActiveBowler == true);

            //             if (bowler) {
            //                 $('#score_bowler_name').text(bowler.bowlerName);

            //                 $('#score_bowler_o').text(bowler.overs);
            //                 $('#score_bowler_m').text(bowler.maidens);
            //                 $('#score_bowler_r').text(bowler.runs);
            //                 $('#score_bowler_w').text(bowler.wickets);
            //                 $('#score_bowler_eco').text('');
            //             }
            //             if (batsemenDatas) {
            //                 $.each(batsemenDatas, function(index, batsemen) {

            //                     if (index == 0) {
            //                         $('#score_batsman_a_name').text(batsemen.batsmanName);

            //                         $('#score_batsman_a_r').text(batsemen.runs);
            //                         $('#score_batsman_a_b').text(batsemen.balls);
            //                         $('#score_batsman_a_4s').text(batsemen.fours);
            //                         $('#score_batsman_a_6s').text(batsemen.sixes);
            //                         $('#score_batsman_a_sr').text('');
            //                     } else {
            //                         $('#score_batsman_b_name').text(batsemen.batsmanName);
            //                         $('#score_batsman_b_r').text(batsemen.runs);
            //                         $('#score_batsman_b_b').text(batsemen.balls);
            //                         $('#score_batsman_b_4s').text(batsemen.fours);
            //                         $('#score_batsman_b_6s').text(batsemen.sixes);
            //                         $('#score_batsman_b_sr').text('');
            //                     }
            //                 });
            //             }

            //             $('#score_window').show();
            //             $('#score_msg').text(match_score.data.score.matchCommentary);


            //         }
            //     }
            // }
        });

        socket.on('line_guru_score', function(data) {
            if (data.score.event_id == '<?php echo $event_id; ?>') {



                // if (data.score.message != "Not Found!") {
                //     $('#scoreboard-box').show();

                // }
                // $('#scoreboard-box').show();


                var home = JSON.parse(data.score.result.home);


                console.log('home', home);

                var batsman_a_detail = home.b1s.split(',');
                var batsman_b_detail = home.b2s.split(',');


                $('#score_player_1').html(home.p1 + ' ' + batsman_a_detail[0] + '(' + batsman_a_detail[1] + ')');
                $('#score_player_2').html(home.p2 + ' ' + batsman_b_detail[0] + '(' + batsman_b_detail[1] + ')');

                $('#score_player_3').html(home.bw);

                $('#team_1_name').html(home.t1.f);
                $('#team_2_name').html(home.t2.f);

                if (home.i == "i1") {
                    $('.currunt_sc').html(home.i1.sc + '-' + home.i1.wk);
                    $('.currunt_over').html('(' + home.i1.ov + ')');

                    console.log('Heree');
                    $('#team_1_status').addClass('active');
                    $('#team_2_status').removeClass('active');



                } else if (home.i == "i2") {
                    $('.currunt_sc').html(home.i2.sc + '-' + home.i2.wk);
                    $('.currunt_over').html('(' + home.i2.ov + ')');

                    $('#team_2_status').addClass('active');
                    $('#team_1_status').removeClass('active');

                }




                $('#score_batsman_a_r').html(batsman_a_detail[0]);
                $('#score_batsman_a_b').html(batsman_a_detail[1]);
                $('#score_batsman_a_4s').html(batsman_a_detail[2]);
                $('#score_batsman_a_6s').html(batsman_a_detail[3]);

                $('#score_batsman_b_r').html(batsman_b_detail[0]);
                $('#score_batsman_b_b').html(batsman_b_detail[1]);
                $('#score_batsman_b_4s').html(batsman_b_detail[2]);
                $('#score_batsman_b_6s').html(batsman_b_detail[3]);
                var msg = home.cs.msg;
                var msg1 = home.cs.msg;


                if (msg == 'BR') {
                    msg = 'Ball Running';
                } else if (msg == 'B') {
                    msg = 'Ball Running';
                } else if (msg == 'W') {
                    msg = 'Wicket';
                } else if (msg == 'OC') {
                    msg = 'Over Complete';
                } else {
                    msg = msg1 + '';
                }


                $('#ball-status').html(msg);
                // console.clear();

                var team_a = '';
                var team_b = '';

                team_a += home.t1.n + ' ' + home.i1.sc + '-' + home.i1.wk + " (" + home.i1.ov + ")";
                team_b += home.t2.n + ' ' + home.i2.sc + '-' + home.i2.wk + " (" + home.i2.ov + ")";

                $('#team_a').html(team_a);
                $('#team_b').html(team_b);

                $('.commantry').html(home.cs.msg);
                var pb = home.pb.split(',');


                var balls_html = '<li><p>Over </p></li>';
                if (pb.length > 0) {
                    for (let i = pb.length - 6; i < pb.length; i++) {


                        // text += cars[i] + "<br>";
                        if (i > 0) {
                            balls_html += '<li class="' + pb[i].toLowerCase() + '-color six-balls"><span>' + pb[i] + '</span></li>';

                        }
                    }
                    // text += cars[i] + "<br>";
                }



                $('#score-over').html(balls_html);
            }



        });
    })

    function tvChange(tv) {
        var tvUrl = 'http://marketsarket.in/premium/ltv' + tv + '.html';
        $('#tvPlayer').attr('src', tvUrl);

    }




    function showPosition() {
        $('#bettingView').hide();
        $('#fancy-positionView').hide();
        // $('.fancy-positondata').removeClass('active');

        $('#positionView').show();
        // $('.betdata').removeClass('active');

        $('.positondata').addClass('active');

    }


    function showFancyPosition() {
        $('#bettingView').hide();
        $('#positionView').hide();


        $('#fancy-positionView').show();
        // $('.betdata').removeClass('active');
        // $('.positondata').removeClass('active');

        $('.fancy-positondata').addClass('active');

    }

    function fetchMatchOddsPositionList(event_id = null, market_id = null, user_id = null) {

        if (!user_id) {
            user_id = '<?php echo get_user_id(); ?>';

        }

        // user_id = '<?php echo get_user_id(); ?>';
        var formData = {
            user_id: user_id,
            matchId: event_id,
            market_id: market_id,
        }
        $.ajax({
            url: "<?php echo base_url(); ?>admin/Events/fetchMatchOddsPositionList",
            data: formData,
            type: 'POST',
            dataType: 'json',
            async: false,
            success: function(output) {
                $('#matchposition').modal('show');
                $('#all-profit-loss-data').html(output.htmlData);
            }
        });
    }


    setInterval(function() {
        getFancysExposure();

    }, 10000);


    function getFancysExposure() {

        // if (!user_id) {
        //     user_id = $('#profit_loss_user_id').val();
        // }

        user_id = '<?php echo get_user_id(); ?>';
        var formData = {
            event_id: '<?php echo $event_id; ?>',
        }
        $.ajax({
            url: "<?php echo base_url(); ?>admin/Events/getFancysExposure",
            data: formData,
            type: 'POST',
            dataType: 'json',
            async: false,
            success: function(output) {
                console.log('output', output);

                if (output) {
                    $.each(output, function(index, fancy) {

                        $('.fancy_exposure_' + index).text(Math.abs(fancy));
                        $('.fancy_exposure_' + index).attr('data-value', fancy);

                    })

                }
            }
        });
    }

    function showTv() {
        $('#collapseTwo').toggle();
    }
</script>