<?php
if (!empty($bettings)) {
    $i = 1;
    foreach ($bettings as $betting) {


       
          ?>
        <?php
        if ($betting['is_back']) {
        ?>
            <tr id="user_row_<?php echo $betting['betting_id']; ?>" class="mark-back  content_user_table all-bet-slip <?php echo strtolower($betting['betting_type']); ?>-bet-slip" >
                <td class="matchbetcolor mark-back"><?php echo $i++; ?></td>
                <?php
                $user_type = $_SESSION['my_userdata']['user_type'];
                if ($user_type != 'User') { ?>
                    <td class="matchbetcolor mark-back"><?php echo $betting['client_name']; ?>(<?php echo $betting['client_user_name']; ?>)</td>

                <?php }
                ?>
                <td class="runner-name mark-back"><?php
                                                    if ($betting['betting_type'] === 'Match') {
                                                        echo $betting['market_name'] . ' / ';
                                                    }
                                                    ?> <?php echo $betting['place_name']; ?></td>

                <td class="mark-back"><?php echo $betting['price_val']; ?></td>
                <td class="mark-back"><?php echo $betting['loss']; ?></td>
                <td class="mark-back"><?php echo $betting['profit']; ?></td>

                <td class="mark-back">
                <?php
                    if($betting['betting_type'] == 'Fancy')
                    { ?>
Yes
                   <?php  }

                   else
                   { ?>
Lagai
                <?php }
                ?>
                </td>
                <!--td class=""></td-->
                <td class="mark-back"><?php echo date('Y-m-d H:i:s', strtotime($betting['created_at'])); ?></td>
                <td class="mark-back"><?php echo $betting['betting_id']; ?></td>

                <td class="mark-back"><?php echo $betting['ip_address']; ?></td>


            </tr>
        <?php } else {
        ?>
            <tr id="user_row_<?php echo $betting['betting_id']; ?>" class="mark-lay  content_user_table  all-bet-slip <?php echo strtolower($betting['betting_type']); ?>-bet-slip">
                <td class="matchbetcolor mark-lay"><?php echo $i++; ?></td>
                <?php
                $user_type = $_SESSION['my_userdata']['user_type'];
                if ($user_type != 'User') { ?>
                    <td class="matchbetcolor mark-lay"><?php echo $betting['client_name']; ?>(<?php echo $betting['client_user_name']; ?>)</td>

                <?php }
                ?>
                <td class="runner-name mark-lay"><?php
                                                    if ($betting['betting_type'] === 'Match') {
                                                        echo $betting['market_name'] . ' / ';
                                                    }
                                                    ?> <?php echo $betting['place_name']; ?></td>
                <td class="mark-lay"><?php echo $betting['price_val']; ?></td>
                <td class="mark-lay"><?php echo $betting['loss']; ?></td>
                <td class="mark-lay"><?php echo $betting['profit']; ?></td>
                <td class="mark-lay">
                <?php
                    if($betting['betting_type'] == 'Fancy')
                    { ?>
Not
                   <?php  }

                   else
                   { ?>
Khai
                <?php }
                ?>
                </td>
                <!--td class=""></td-->
                <td class="mark-lay"><?php echo date('Y-m-d H:i:s', strtotime($betting['created_at'])); ?></td>
                <td class="mark-lay"><?php echo $betting['betting_id']; ?></td>

                <td class="mark-lay"><?php echo $betting['ip_address']; ?></td>
            </tr>

        <?php
        }
        ?>

<?php }
}
?>