<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ledger_model extends My_Model
{

    /**
     * initializes the class inheriting the methods of the class My_Model
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function get_ledger($dataValues)
    {
        $return = array();

        if (!empty($dataValues)) {
            $this->db->select('*');
            $this->db->from('ledger');
            $this->db->where('user_id', $dataValues['user_id']);
            $this->db->where('is_delete', 'No');

            if (!empty($dataValues['fltrselct'])) {
                $type = $dataValues['fltrselct'];
                if ($type == '1') {
                    $type = 'Free Chip';
                    $this->db->where('role', 'Self');
                } else if ($type == '2') {
                    $type = 'Settlement';
                } else if ($type == '3') {
                    $type = 'Betting';
                } else if ($type == '4') {
                    $type = 'Betting';
                }
                $this->db->where('type', $type);
            }


            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('created_at >=', $dataValues['fromDate']);
                $this->db->where('created_at <=', $dataValues['toDate']);
            }



            if (!empty($dataValues['search']) || !empty($dataValues['search'])) {
                $search = $dataValues['search'];
                $this->db->group_start();
                $this->db->or_like('created_at', $search);
                $this->db->or_like('transaction_type', $search);
                $this->db->or_like('type', $search);
                $this->db->or_like('balance', $search);
                $this->db->or_like('remarks', $search);

                $this->db->group_end();
            }


            $return = $this->db->get()->result_array();
             return $return;
        }
    }

    public function get_event_entry_by_event_id($event_id)
    {
        $this->db->select('*');
        $this->db->from('event_exchange_entrys');
        $this->db->where('event_id', $event_id);
        $return = $this->db->get()->row();
        return $return;
    }


    public function check_event_entry_exists($evend_id)
    {
        $this->db->select('*');
        $this->db->from('event_exchange_entrys');
        $this->db->where('event_id', $evend_id);
        $return = $this->db->get()->row();
        return $return;
    }

    public function addLedger($dataValues)
    {
        $ledger_id = NULL;
        if (count($dataValues) > 0) {
            if (array_key_exists('ledger_id', $dataValues) && !empty($dataValues['ledger_id'])) {
                $dataValues["updated_at"] = date("Y-m-d H:i:s");
                $this->db->where('ledger_id', $dataValues['ledger_id']);
                $this->db->update('ledger', $dataValues);
                $this->db->where('is_delete', 'No');

                $ledger_id = $dataValues['ledger_id'];
            } else {
                $dataValues["created_at"] = date("Y-m-d H:i:s");
                $this->db->insert('ledger', $dataValues);
                $this->db->where('is_delete', 'No');

                $ledger_id = $this->db->insert_id();
            }
        }

        // p($this->db->last_query());
        return $ledger_id;
    }

    public function deleteChip($chip_id)
    {
        if (!empty($chip_id)) {
            $this->db->where('chip_id', $chip_id);

            $this->db->delete('chips');
        }
    }



    public function count_total_balance($user_id)
    {


        $query = $this->db->query("select s.*,s.credit - s.debit AS Balance,@RunningBalance:= @RunningBalance + s.credit - s.debit RunningBalance FROM (SELECT MIN(ledger_id) ledger_id,t.user_id,SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) AS Debit, SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) AS Credit FROM  ledger t where  t.user_id = '" . $user_id . "' ORDER BY ledger_id ) s, (SELECT @RunningBalance:=0) rb ORDER BY s.ledger_id");
        $result = $query->row();

        return $result->RunningBalance;
    }

    public function count_free_chip($user_id)
    {
        $this->db->select('SUM(amount) as deposit');
        $this->db->from('ledger');

        $this->db->where('user_id', $user_id);
        $this->db->where('type', 'Free chip');
        $this->db->where('transaction_type', 'Credit');
        $this->db->where('is_delete', 'No');

        $credit = $this->db->get()->row();

        $this->db->select('SUM(amount) as withdrawl');
        $this->db->from('ledger');
        $this->db->where('user_id', $user_id);
        $this->db->where('type', 'Free chip');
        $this->db->where('transaction_type', 'Debit');
        $this->db->where('is_delete', 'No');

        $debit = $this->db->get()->row();
        // p($this-  p($de>db->last_query());
        return $credit->deposit - $debit->withdrawl;
    }

    public function disable_existing_bet($dataValues)
    {
        // $dataValues["updated_at"] = date("Y-m-d H:i:s");
        // $this->db->where($dataValues);
        // $this->db->update('ledger', array('is_delete' => 'Yes', 'updated_at' => date("Y-m-d H:i:s")));
        $this->db->where($dataValues);
        $this->db->delete('ledger');


        // $ledger_id = $dataValues['ledger_id'];
        // p($this->db->last_query());
        return true;
    }

    public function delete_ledget_by_betting_id($betting_id)
    {
        if (!empty($betting_id)) {
            $this->db->where('betting_id', $betting_id);
            $this->db->delete('ledger');
        }
    }

    public function get_total_winnings($user_id)
    {
        if (!empty($user_id)) {


            $this->db->select('SUM(amount) winning_amount');
            $this->db->from('ledger');
            $this->db->where('user_id', $user_id);
            $this->db->where('type', 'Betting');
            $this->db->where('transaction_type', 'Credit');
            $this->db->where('is_delete', 'No');

            return $this->db->get()->row();
        }
    }


    public function get_total_plus_settlement($dataValues)
    {
        if (!empty($dataValues)) {
            $this->db->select('SUM(amount) settlement_amount');
            $this->db->from('ledger');
            $this->db->where($dataValues);
            $this->db->where('type', 'Settlement');
            $this->db->where('transaction_type', 'Debit');
            $this->db->where('is_delete', 'No');

            return $this->db->get()->row();
        }
    }

    public function get_total_minus_settlement($dataValues)
    {
        if (!empty($dataValues)) {
            $this->db->select('SUM(amount) settlement_amount');
            $this->db->from('ledger');
            $this->db->where($dataValues);
            $this->db->where('type', 'Settlement');
            $this->db->where('transaction_type', 'Credit');
            $this->db->where('is_delete', 'No');

            return $this->db->get()->row();
        }
    }

    public function count_total_credit_limit($user_id)
    {


        $query = $this->db->query("select s.*,s.credit - s.debit AS Balance,@RunningBalance:= @RunningBalance + s.credit - s.debit RunningBalance FROM (SELECT MIN(ledger_id) ledger_id,t.user_id,SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) AS Debit, SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) AS Credit FROM  ledger t where  t.user_id = '" . $user_id . "' and t.type = 'Free Chip' ORDER BY ledger_id ) s, (SELECT @RunningBalance:=0) rb ORDER BY s.ledger_id");
        $result = $query->row();


        return $result->RunningBalance;
    }


    public function count_total_winnings($user_id)
    {
        $query = $this->db->query("select s.*,s.credit - s.debit AS Balance,@RunningBalance:= @RunningBalance + s.credit - s.debit RunningBalance FROM (SELECT MIN(ledger_id) ledger_id,t.user_id,SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) AS Debit, SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) AS Credit FROM  ledger t where  t.user_id = '" . $user_id . "' and t.type = 'Betting' ORDER BY ledger_id ) s, (SELECT @RunningBalance:=0) rb ORDER BY s.ledger_id");
        $result = $query->row();


        return $result->RunningBalance;
    }

    public function count_opening_balance_by_date($dataValues = array())
    {

        if (isset($dataValues['user_id']) && isset($dataValues['tdate'])) {
            $query = $this->db->query("select s.*,s.credit - s.debit AS Balance,@RunningBalance:= @RunningBalance + s.credit - s.debit RunningBalance FROM (SELECT MIN(ledger_id) ledger_id,t.user_id,SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) AS Debit, SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) AS Credit FROM  ledger t where  t.user_id = '" . $dataValues['user_id'] . "' and t.created_at < '" . $dataValues['tdate'] . "' ORDER BY ledger_id ) s, (SELECT @RunningBalance:=0) rb ORDER BY s.ledger_id");
            $result = $query->row();

            return $result->RunningBalance;
        } else {
            return 0;
        }
    }


    public function count_total_settling($user_id)
    {
        $query = $this->db->query("select s.*,s.credit - s.debit AS Balance,@RunningBalance:= @RunningBalance + s.credit - s.debit RunningBalance FROM (SELECT MIN(ledger_id) ledger_id,t.user_id,SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) AS Debit, SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) AS Credit FROM  ledger t where  t.user_id = '" . $user_id . "' and t.type = 'Settlement' ORDER BY ledger_id ) s, (SELECT @RunningBalance:=0) rb ORDER BY s.ledger_id");
        $result = $query->row();




        return $result->RunningBalance;
    }

    public function get_total_settlement($user_id, $x, $user_type = null)
    {

        // p($user_id);

        if ($user_type == 'User') {
            $this->db->select("b.user_id as user_id, 
            (SUM(CASE WHEN b.bet_result = 'Plus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END)) -   
            SUM(CASE WHEN b.bet_result = 'Minus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) as winnings");
            $this->db->from('masters_betting_settings as mb');
            $this->db->join('betting as b', 'mb.betting_id= b.betting_id', 'left');
            $this->db->join('registered_users as ru', 'ru.user_id= b.user_id', 'left');
            $this->db->where('mb.user_id', $user_id);
            $this->db->where('b.status', 'Settled');
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();
        } else {
            $this->db->select("b.user_id as user_id, 
            (SUM(CASE WHEN b.bet_result = 'Minus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END)) -   
            SUM(CASE WHEN b.bet_result = 'Plus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) as winnings");
            $this->db->from('masters_betting_settings as mb');
            $this->db->join('betting as b', 'mb.betting_id= b.betting_id', 'left');
            $this->db->join('registered_users as ru', 'ru.user_id= b.user_id', 'left');
            $this->db->where('mb.user_id', $user_id);
            $this->db->where('b.status', 'Settled');
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();
        }

        if ($x == 'Y') {
            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) - 
                         SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Settlement');
            $this->db->where('l.is_delete', 'No');
            $this->db->where('l.role', 'Parent');
            $this->db->group_by('l.user_id');
            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();

            $this->db->select("ut.user_id,(sum(ut.winnings)) as winnings from ($table1 UNION ALL $table2 )  as ut ");
            $data = $this->db->get()->row();
        } else {
            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) - 
                         SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Settlement');
            $this->db->where('l.is_delete', 'No');
            $this->db->where('l.role', 'Parent');
            $this->db->group_by('l.user_id');
            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();


            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) - 
            SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            $this->db->where('l.is_commission', 'Yes');
            $this->db->where('l.is_delete', 'No');
            $this->db->group_by('l.user_id');
            $table3 = $this->db->get_compiled_select();
            $this->db->reset_query();

            $this->db->select("ut.user_id,(sum(ut.winnings)) as winnings from ($table1 UNION ALL $table2 UNION ALL $table3 )  as ut ");
            $data = $this->db->get()->row();
        }



        if ($user_id == '7276') {
            // continue;
            // p($this->db->last_query());

        }

        // p($this->db->last_query());


        if (!empty($data)) {
            return round($data->winnings, 0);
        } else {
            return '0';
        }
    }


    public function get_total_settlement_new($user_id, $x, $user_type = null)
    {

        if ($user_type == 'User') {
           $this->db->select("b.user_id as user_id, 
            (SUM(CASE WHEN b.bet_result = 'Plus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END)) -   
            SUM(CASE WHEN b.bet_result = 'Minus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) as winnings");
            $this->db->from('masters_betting_settings as mb');
            $this->db->join('betting as b', 'mb.betting_id= b.betting_id', 'left');
            $this->db->join('registered_users as ru', 'ru.user_id= b.user_id', 'left');
            $this->db->where('mb.user_id', $user_id);
            $this->db->where('b.status', 'Settled');
            // $table1 = $this->db->get_compiled_select();
            $this->db->where('b.status', 'Settled');
            $query1 =  $this->db->get()->row();

             
             
        } else {
            $this->db->select("b.user_id as user_id, 
            (SUM(CASE WHEN b.bet_result = 'Minus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END)) -   
            SUM(CASE WHEN b.bet_result = 'Plus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) as winnings");
            $this->db->from('masters_betting_settings as mb');
            $this->db->join('betting as b', 'mb.betting_id= b.betting_id', 'left');
            $this->db->join('registered_users as ru', 'ru.user_id= b.user_id', 'left');
            $this->db->where('mb.user_id', $user_id);
            $this->db->where('b.status', 'Settled');
            // $table1 = $this->db->get_compiled_select();
            // $this->db->reset_query();

            $query1 =  $this->db->get()->row();
            
        }

        if ($x == 'Y') {
            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) - 
                         SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Settlement');
            $this->db->where('l.is_delete', 'No');
            $this->db->where('l.role', 'Parent');
            $this->db->group_by('l.user_id');
            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();

            // $this->db->select("ut.user_id,(sum(ut.winnings)) as winnings from ($table1 UNION ALL $table2 )  as ut ");
            $data = $this->db->get()->row();
        } else {
            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) - 
                         SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Settlement');
            $this->db->where('l.is_delete', 'No');
            $this->db->where('l.role', 'Parent');
            $this->db->group_by('l.user_id');
            $query2 =  $this->db->get()->row();

            

            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) - 
            SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            $this->db->where('l.is_commission', 'Yes');
            $this->db->where('l.is_delete', 'No');
            $this->db->group_by('l.user_id');
            $query3 =  $this->db->get()->row();
             
            $data = array();
    
        }
       
        // p($query1->winnings);
        $total = $query1->winnings;
        $total += $query3->winnings;


        if($total > 0)
        {   
            
            if($query2->winnings > 0)
            {
                $total  -= abs($query2->winnings);
            }
            else
            {
                $total  -= abs($query2->winnings);

            }
          
            
        }
        else
        {

         
            if($query2->winnings > 0)
            {
                $total  += abs($query2->winnings);
            }
            else
            {
                $total  += abs($query2->winnings);

            }
            // if($user_id == 7450)
            // {

            //     p($total,0);
            //     p($query1->winnings);
            // }

            if ($user_id == '7468') {

                // p($total);
                // continue;
                // p($this->db->last_query());
    
            }
          
           
        }

        // p($query1->winnings);
        // if($query1->winnings > 0)
        // {
        //     $total = $query1->winnings + $query2->winnings - $query3->winnings;

        // }
        // else
        // {

           
        // $total = abs($query1->winnings) - abs($query2->winnings) + abs($query3->winnings);
        // $total = $total * -1;
        // }


        if ($user_id == '7468') {

            // p($total);
            // continue;
            // p($this->db->last_query());

        }
        // p($user_id);
        


        if ($user_id == '7276') {
            // continue;
            // p($this->db->last_query());

        }

        // p($this->db->last_query());

        return round($total, 0);
        
    }


    public function get_commission_amt_by_event_id($dataValues)
    {
        if (!empty($dataValues)) {
            $this->db->select('SUM(amount) total_commission');
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id=l.betting_id', 'inner');


            $this->db->where('l.user_id', $dataValues['user_id']);
            $this->db->where('l.is_commission', 'Yes');

            $this->db->where('b.match_id', $dataValues['match_id']);

            $this->db->where('type', 'Betting');

            $this->db->where('transaction_type', 'Credit');
            $result = $this->db->get()->row();


             return $result;
        }
    }

    public function deleteSettlementEntry($ref_id)
    {
        if (!empty($ref_id)) {
            $this->db->where('settlemment_ref_id', $ref_id);

            $this->db->delete('ledger');
        }
    }

    public function getSettlementEntry($ref_id)
    {
        if (!empty($ref_id)) {
            $this->db->select('*');
            $this->db->from('ledger as l');
            $this->db->where('settlemment_ref_id', $ref_id);
            $result = $this->db->get()->result_array();
        }

        return $result;
    }


    public function get_user_bookmaker_commission_amt_by_event_id($dataValues)
    {
        if (!empty($dataValues)) {
            $this->db->select('SUM(amount) total_commission');
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id=l.betting_id', 'inner');


            $this->db->where('l.user_id', $dataValues['user_id']);
            $this->db->where('l.is_commission', 'Yes');

            $this->db->where('b.match_id', $dataValues['match_id']);
            $this->db->where('b.market_name','Bookmaker');
            $this->db->where('b.betting_type','Match');



            $this->db->where('type', 'Betting');

            $this->db->where('transaction_type', 'Credit');
            $result = $this->db->get()->row();

            return $result;
        }
    }

    public function get_user_fancy_commission_amt_by_event_id($dataValues)
    {
        if (!empty($dataValues)) {
            $this->db->select('SUM(amount) total_commission');
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id=l.betting_id', 'inner');


            $this->db->where('l.user_id', $dataValues['user_id']);
            $this->db->where('l.is_commission', 'Yes');

            $this->db->where('b.match_id', $dataValues['match_id']);
             $this->db->where('b.betting_type','Fancy');



            $this->db->where('type', 'Betting');

            $this->db->where('transaction_type', 'Credit');
            $result = $this->db->get()->row();

            return $result;
        }
    }

    public function get_user_match_odds_commission_amt_by_event_id($dataValues)
    {
        if (!empty($dataValues)) {
            $this->db->select('SUM(amount) total_commission');
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id=l.betting_id', 'inner');


            $this->db->where('l.user_id', $dataValues['user_id']);
            $this->db->where('l.is_commission', 'Yes');

            $this->db->where('b.match_id', $dataValues['match_id']);
            $this->db->where('b.market_name','Match Odds');
            $this->db->where('b.betting_type','Match');



            $this->db->where('type', 'Betting');

            $this->db->where('transaction_type', 'Credit');
            $result = $this->db->get()->row();

            return $result;
        }
    }


    public function get_client_ledger_new($dataValues)
    {
        $user_id = $dataValues['user_id'];
        $filter = $dataValues['fltrselct'];

        if ($filter == 1) {


             $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name ,'' as market_name");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();
            $this->db->where('l.type', 'Free Chip');
            $this->db->or_where('l.type', 'Settlement');
            $this->db->group_end();


            $this->db->where('l.is_delete', 'No');
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();



            $this->db->select(" l.user_id,b.event_name as remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Plus' THEN b.profit  ELSE b.loss * -1 END)) amount,l.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name ,b.market_name as market_name");
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id= l.betting_id', 'left');

            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            // $this->db->where('b.betting_type', 'Fancy');
            $this->db->where('b.status', 'Settled');


            $this->db->where('l.is_delete', 'No');
            $this->db->group_by('b.match_id');
            // $this->db->group_by('b.selection_id');


            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();



            $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name ,'' as market_name");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();
            $this->db->where('l.type', 'Betting');
            $this->db->where('is_commission', 'Yes');
            $this->db->group_end();


            $this->db->where('l.is_delete', 'No');
            $table3 = $this->db->get_compiled_select();
 
            $this->db->reset_query();


            // $this->db->select("l1.user_id,remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Plus' THEN b.profit  ELSE b.loss * -1 END)) amount,l1.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name ,b.market_name as market_name");
            // $this->db->from('ledger as l1');
            // $this->db->join('betting as b', 'b.betting_id = l1.betting_id', 'left');

            // $this->db->where('l1.user_id', $user_id);
            // $this->db->where('l1.type', 'Betting');
            // $this->db->where('b.betting_type', 'Match');
            // $this->db->where('b.status', 'Settled');

            // $this->db->where('l1.is_delete', 'No');
            // $this->db->group_by('b.match_id');
            // $this->db->group_by('b.market_id');


            // $table3 = $this->db->get_compiled_select();
            // $this->db->reset_query();


            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name ,market_name from ($table1 UNION ALL $table2 UNION ALL $table3  )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();


             return $data;
        } else if ($filter == 2) {

            $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name,'' as market_name");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();

            $this->db->where('l.type', 'Free Chip');
            // $this->db->or_where('l.type', 'Settlement');
            $this->db->group_end();
            $this->db->where('l.is_delete', 'No');
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();






            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name ,market_name from ($table1 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
        else if ($filter == 4) {

         


            $this->db->select(" l.user_id,b.event_name as remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Plus' THEN b.profit  ELSE b.loss * -1 END)) amount,l.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name,b.market_name as market_name");
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id= l.betting_id', 'left');

            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            // $this->db->where('b.betting_type', 'Fancy');
            $this->db->where('b.status', 'Settled');


            $this->db->where('l.is_delete', 'No');
            $this->db->group_by('b.match_id');
            // $this->db->group_by('b.selection_id');


            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();



             


            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name,market_name from ($table2 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
        else if ($filter == 6) {

           



            $this->db->select(" l.user_id,b.event_name as remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Plus' THEN b.profit  ELSE b.loss * -1 END)) amount,l.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name,b.market_name as market_name");
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id= l.betting_id', 'left');

            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            // $this->db->where('b.betting_type', 'Fancy');
            $this->db->where('b.status', 'Settled');


            $this->db->where('l.is_delete', 'No');
            $this->db->group_by('b.match_id');
            // $this->db->group_by('b.selection_id');


            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();



            // $this->db->select("l1.user_id,remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Plus' THEN b.profit  ELSE b.loss * -1 END)) amount,l1.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name,b.market_name as market_name");
            // $this->db->from('ledger as l1');
            // $this->db->join('betting as b', 'b.betting_id = l1.betting_id', 'left');

            // $this->db->where('l1.user_id', $user_id);
            // $this->db->where('l1.type', 'Betting');
            // $this->db->where('b.betting_type', 'Match');
            // $this->db->where('b.status', 'Settled');

            // $this->db->where('l1.is_delete', 'No');
            // $this->db->group_by('b.match_id');
            // $this->db->group_by('b.market_id');
            

            // $table3 = $this->db->get_compiled_select();
            //  $this->db->reset_query();


            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name,market_name from ($table2)  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
        else if($filter == 7)
        {
                
            $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name,'' as market_name");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();

            // $this->db->where('l.type', 'Free Chip');
            $this->db->or_where('l.type', 'Settlement');
            $this->db->group_end();
            $this->db->where('l.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('created_at >=', $dataValues['fromDate']);
                $this->db->where('created_at <=', $dataValues['toDate']);
            }
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();






            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name ,market_name from ($table1 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
    }



    public function get_admin_ledger_new($dataValues)
    {
        $user_id = $dataValues['user_id'];
        $filter = $dataValues['fltrselct'];


 
         if ($filter == 1) {
            $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name ,'' as market_name");
            $this->db->from('ledger as l');
            // $this->db->join('betting as b', 'b.betting_id = l1.betting_id', 'left');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();
            $this->db->where('l.type', 'Free Chip');
            $this->db->or_where('l.type', 'Settlement');
            $this->db->group_end();


            $this->db->where('l.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('l.created_at >=', $dataValues['fromDate']);
                $this->db->where('l.created_at <=', $dataValues['toDate']);
            }
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();



            // $this->db->select(" l.user_id,remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Minus' THEN mbs.profit ELSE mbs.loss  * -1 END )) amount,l.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name ,b.market_name as market_name");
            // $this->db->from('ledger as l');
            // $this->db->join('betting as b', 'b.betting_id= l.betting_id', 'left');
            // $this->db->join('masters_betting_settings as mbs', 'mbs.betting_id= b.betting_id', 'left');


            // $this->db->where('mbs.user_id', $user_id);
            // $this->db->where('l.type', 'Betting');
            // $this->db->where('b.betting_type', 'Fancy');
            // $this->db->where('b.status', 'Settled');


            // $this->db->where('l.is_delete', 'No');
            // if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
            //     $this->db->where('l.created_at >=', $dataValues['fromDate']);
            //     $this->db->where('l.created_at <=', $dataValues['toDate']);
            // }
            // $this->db->group_by('b.match_id');
            // $this->db->group_by('b.selection_id');


            // $table2 = $this->db->get_compiled_select();
            // $this->db->reset_query();



            $this->db->select("l1.user_id,b.event_name as remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Minus' THEN mbs.profit ELSE mbs.loss  * -1 END)) amount,l1.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name ,b.market_name as market_name");
            $this->db->from('ledger as l1');
            $this->db->join('betting as b', 'b.betting_id = l1.betting_id', 'left');
            $this->db->join('masters_betting_settings as mbs', 'mbs.betting_id= b.betting_id', 'left');


            $this->db->where('mbs.user_id', $user_id);
            // $this->db->where('l1.user_id', $user_id);
            $this->db->where('l1.type', 'Betting');
            // $this->db->where('b.betting_type', 'Match');
            $this->db->where('b.status', 'Settled');

            $this->db->where('l1.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('b.created_at >=', $dataValues['fromDate']);
                $this->db->where('b.created_at <=', $dataValues['toDate']);
            }
            $this->db->group_by('b.match_id');
            // $this->db->group_by('b.market_id');


            $table3 = $this->db->get_compiled_select();
            $this->db->reset_query();


            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name ,market_name from ($table1 UNION ALL  $table3 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        } else if ($filter == 2) {

            $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name,'' as market_name");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();

            $this->db->where('l.type', 'Free Chip');
            // $this->db->or_where('l.type', 'Settlement');
            $this->db->group_end();
            $this->db->where('l.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('l.created_at >=', $dataValues['fromDate']);
                $this->db->where('l.created_at <=', $dataValues['toDate']);
            }
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();






            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name ,market_name from ($table1 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
        else if ($filter == 4) {

         


            $this->db->select(" l.user_id,b.event_name as remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Minus' THEN mbs.profit  ELSE mbs.loss   * -1  END)) amount,l.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name,b.market_name as market_name");
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id= l.betting_id', 'left');
            $this->db->join('masters_betting_settings as mbs', 'mbs.betting_id= b.betting_id', 'left');


            $this->db->where('mbs.user_id', $user_id);
            // $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            // $this->db->where('b.betting_type', 'Fancy');
            $this->db->where('b.status', 'Settled');


            $this->db->where('l.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('b.created_at >=', $dataValues['fromDate']);
                $this->db->where('b.created_at <=', $dataValues['toDate']);
            }
            $this->db->group_by('b.match_id');
            // $this->db->group_by('b.selection_id');


            $table2 = $this->db->get_compiled_select();
            $this->db->reset_query();



             


            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name,market_name from ($table2 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
        else if ($filter == 6) {

           



            $this->db->select(" l.user_id,b.event_name as remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Minus' THEN mbs.profit ELSE mbs.loss  * -1 END)) amount,l.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name,b.market_name as market_name");
            $this->db->from('ledger as l');
            $this->db->join('betting as b', 'b.betting_id= l.betting_id', 'left');
            $this->db->join('masters_betting_settings as mbs', 'mbs.betting_id= b.betting_id', 'left');


            $this->db->where('mbs.user_id', $user_id);
            // $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Betting');
            // $this->db->where('b.betting_type', 'Fancy');
            $this->db->where('b.status', 'Settled');


            $this->db->where('l.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('b.created_at >=', $dataValues['fromDate']);
                $this->db->where('b.created_at <=', $dataValues['toDate']);
            }
            $this->db->group_by('b.match_id');
 

            $table2 = $this->db->get_compiled_select();

             $this->db->reset_query();



            // $this->db->select("l1.user_id,remarks,transaction_type,type,(SUM(CASE WHEN b.bet_result = 'Minus' THEN mbs.profit   ELSE mbs.loss  * -1 END)) amount,l1.created_at,b.betting_type,b.selection_id,b.market_id,b.match_id,b.event_name as event_name,b.market_name as market_name");
            // $this->db->from('ledger as l1');
            // $this->db->join('betting as b', 'b.betting_id = l1.betting_id', 'left');
            // $this->db->join('masters_betting_settings as mbs', 'mbs.betting_id= b.betting_id', 'left');


            // $this->db->where('mbs.user_id', $user_id);
            // // $this->db->where('l1.user_id', $user_id);
            // $this->db->where('l1.type', 'Betting');
            // $this->db->where('b.betting_type', 'Match');
            // $this->db->where('b.status', 'Settled');

            // $this->db->where('l1.is_delete', 'No');
            // if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
            //     $this->db->where('b.created_at >=', $dataValues['fromDate']);
            //     $this->db->where('b.created_at <=', $dataValues['toDate']);
            // }
            // $this->db->group_by('b.match_id');
            // $this->db->group_by('b.market_id');
            

            // $table3 = $this->db->get_compiled_select();
            //  $this->db->reset_query();


            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name,market_name from ($table2 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();


             return $data;
        }
        else if($filter == 7)
        {
                
            $this->db->select(" user_id,remarks,transaction_type,type,amount,l.created_at,'' as betting_type,'' as selection_id,'' as market_id,'' as match_id,'' as event_name,'' as market_name");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->group_start();

            // $this->db->where('l.type', 'Free Chip');
            $this->db->or_where('l.type', 'Settlement');
            $this->db->group_end();
            $this->db->where('l.is_delete', 'No');
            if (!empty($dataValues['fromDate']) || !empty($dataValues['toDate'])) {
                $this->db->where('created_at >=', $dataValues['fromDate']);
                $this->db->where('created_at <=', $dataValues['toDate']);
            }
            $table1 = $this->db->get_compiled_select();
            $this->db->reset_query();






            $this->db->select("user_id,remarks,transaction_type,type,amount,created_at,betting_type,selection_id,market_id,match_id,event_name ,market_name from ($table1 )  as ut order by ut.created_at asc", false);
            $data = $this->db->get()->result_array();

            return $data;
        }
    }



    public function get_total_settlement_for_master($user_id, $x, $user_type = null)
    {

        // p($user_id);
        // p($user_type);
        if ($user_type == 'User') {
            $this->db->select("b.user_id as user_id, 
            (SUM(CASE WHEN b.bet_result = 'Plus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END)) -   
            SUM(CASE WHEN b.bet_result = 'Minus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) as winnings");
            $this->db->from('masters_betting_settings as mb');
            $this->db->join('betting as b', 'mb.betting_id= b.betting_id', 'left');
            $this->db->join('registered_users as ru', 'ru.user_id= b.user_id', 'left');
            $this->db->where('mb.user_id', $user_id);
            $this->db->where('b.status', 'Settled');
            // $table1 = $this->db->get_compiled_select();
            // $this->db->reset_query();
            $total_winnings = $this->db->get()->row();
        } else {
            $this->db->select("b.user_id as user_id, 
            (SUM(CASE WHEN b.bet_result = 'Plus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END)) -   
            SUM(CASE WHEN b.bet_result = 'Minus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) as winnings");
            $this->db->from('masters_betting_settings as mb');
            $this->db->join('betting as b', 'mb.betting_id= b.betting_id', 'left');
            $this->db->join('registered_users as ru', 'ru.user_id= b.user_id', 'left');
            $this->db->where('mb.user_id', $user_id);
            $this->db->where('b.status', 'Settled');
            $total_winnings = $this->db->get()->row();
        }


        // p($x);
        if ($x == 'Y') {
            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0 END) - 
                         SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Settlement');
            $this->db->where('l.is_delete', 'No');
            $this->db->where('l.role', 'Parent');
            $this->db->group_by('l.user_id');
            // $table2 = $this->db->get_compiled_select();
            // $this->db->reset_query();
            $total_sattelment = $this->db->get()->row();


            // $this->db->select("ut.user_id,(sum(ut.winnings)) as winnings from ($table1 UNION ALL $table2 )  as ut ");
            // $data = $this->db->get()->row();
        } else {
            $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) - 
                         SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0  END )) winnings");
            $this->db->from('ledger as l');
            $this->db->where('l.user_id', $user_id);
            $this->db->where('l.type', 'Settlement');
            $this->db->where('l.is_delete', 'No');
            $this->db->where('l.role', 'Parent');
            $this->db->group_by('l.user_id');
            $total_sattelment = $this->db->get()->row();




            // $this->db->select("l.user_id,(SUM(CASE WHEN transaction_type = 'Credit' THEN amount ELSE 0 END) - 
            // SUM(CASE WHEN transaction_type = 'Debit' THEN amount ELSE 0  END )) winnings");
            // $this->db->from('ledger as l');
            // $this->db->where('l.user_id', $user_id);
            // $this->db->where('l.type', 'Betting');
            // $this->db->where('l.is_commission', 'Yes');
            // $this->db->where('l.is_delete', 'No');
            // $this->db->group_by('l.user_id');
            // $total_commission = $this->db->get()->row();

            // $this->db->select("ut.user_id,(sum(ut.winnings)) as winnings from ($table1 UNION ALL $table2 UNION ALL $table3 )  as ut ");
            // $data = $this->db->get()->row();
        }

        // p($this->db->last_query());


        $winnings = $total_winnings->winnings;


        // if (!empty($total_commission)) {
        //     $winnings += $total_commission->winnings;
        // }



        if ($user_id == 11058) {
            // p($winnings);
        }


        // if ($user_id == '8124') {


        // if($user_id == 10414)
        // {
        //     p($total_sattelment);
        // }

        if (!empty($total_sattelment)) {
            if ($winnings > 0) {
                $winnings -= abs($total_sattelment->winnings);
            } else {

                // p($total_sattelment);
                $winnings += abs($total_sattelment->winnings);
            }
        }



        // p("exit;");

        // p($total_winnings, 0);
        // p($total_sattelment, 0);
        // p($winnings);

        // p($this->db->last_query());
        // }

        // p($this->db->last_query());


        if (!empty($winnings)) {
            return round($winnings, 0);
        } else {
            return '0';
        }
    }

    public function get_total_settlement_for_user($user_id, $x, $user_type = null)
    {

        $query = $this->db->query("select *,(SUM(credits) - SUM(debits)) AS winnings
        FROM (
        SELECT `b`.`user_id` AS `user_id`,  
        (CASE WHEN b.bet_result = 'Plus' THEN (b.profit - b.profit * mb.partnership/100)  ELSE 0 END) AS credits,
        (CASE WHEN b.bet_result = 'Minus' THEN (b.loss - b.loss * mb.partnership/100) ELSE 0  END) AS debits,b.created_at
        FROM `masters_betting_settings` AS `mb`
        LEFT JOIN `betting` AS `b` ON `mb`.`betting_id`= `b`.`betting_id`
        LEFT JOIN `registered_users` AS `ru` ON `ru`.`user_id`= `b`.`user_id`
        WHERE `mb`.`user_id` = '".$user_id."'
        AND `b`.`status` = 'Settled'  UNION ALL 
        
        
        SELECT `l`.`user_id`, 
        (CASE WHEN transaction_type = 'Credit' THEN (amount)  ELSE 0 END) AS credits,
        (CASE WHEN transaction_type = 'Debit' THEN (amount) ELSE 0  END) AS debits,created_at
        FROM `ledger` AS `l`
        WHERE `l`.`user_id` = '".$user_id."'
        AND `l`.`type` = 'Settlement'
        AND `l`.`is_delete` = 'No'
        AND `l`.`role` = 'Parent'
        
        
         UNION ALL SELECT `l`.`user_id`, 
        (CASE WHEN transaction_type = 'Credit' THEN (amount)  ELSE 0 END) AS credits,
        (CASE WHEN transaction_type = 'Debit' THEN (amount) ELSE 0  END) AS debits,created_at
        FROM `ledger` AS `l`
        WHERE `l`.`user_id` = '".$user_id."'
        AND `l`.`type` = 'Betting'
        AND `l`.`is_commission` = 'Yes'
        AND `l`.`is_delete` = 'No'
          )  AS ut");
        $result = $query->row();
 
        return $result->winnings;

       
    }

}
