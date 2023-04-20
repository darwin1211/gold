<table class="table table-bordered" id="example" style="width:100%;">
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($reports)) {
                            $i = 1;
                             foreach ($reports as $report) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo date('Y-m-d H:i:s', strtotime($report['created_at'])); ?></td>
                                    <td><?php 
                                    
                                    if($report['type'] == 'Betting')
                                    {
 ?> 

 <a href="<?php echo base_url(); ?>admin/Reports/profitLossDetail/<?php echo $report['match_id']; ?>/<?php echo $user_id; ?>"><?php echo $report['remarks']; ?></a>
    <?php                                }   
                                    else
                                    {
                                        echo $report['remarks'];
                                    }
                                    
                                     ?></td>
                                    <td><?php

                                         if ($report['transaction_type'] == 'Credit') {
                                            echo $report['amount'];
                                            $opening_balance += $report['amount'];
                                        } else {
                                            echo "0.00";
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($report['transaction_type'] == 'Debit') {
                                            echo $report['amount'];
                                            $opening_balance -= $report['amount'];

                                        } else {
                                            echo "0.00";
                                        }
                                        ?></td>
                                    <td><?php echo number_format($report['available_balance'],0); ?></td>

                                </tr>
                        <?php }
                        }
                        ?>
                    </tbody>
                </table>