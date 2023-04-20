<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Market_book_odds_model extends My_Model
{

    /**
     * initializes the class inheriting the methods of the class My_Model
     */
    public function __construct()
    {
        parent::__construct();
    }



    public function get_market_book_odds_by_market_id($market_id)
    {
        $this->db->select('*');
        $this->db->from('market_book_odds');
        $this->db->where('market_id', $market_id);
        $return = $this->db->get()->row();
        return $return;
    }

    public function expired_all_market_book_odds()
    {
        $date = date('Y-m-d H:i:s', strtotime('-1 hours', strtotime(date('Y-m-d H:i:s'))));

        $this->db->where('updated_at <=', $date);
        $this->db->update('market_book_odds', array(
            'status' => 'SUSPENDED',
            'inplay' => '0',
            'updated_at' => date('Y-m-d H:i:s')
        ));
        return true;
    }
}
