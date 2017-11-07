<?php defined('BASEPATH') or exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modtindakan extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }

    public function showdata ($start, $stop) {
        $this->db->from('ttindakan');
        $this->db->where('tgl >=', nice_date($start, 'Y/m/d'));
        $this->db->where('tgl <=', nice_date($stop, 'Y/m/d'));
        //$this->db->where("tgl >= '".$start."' and tgl <='".$stop."'");
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
    
    public function showrekap ($start, $stop) {
        $this->db->from('trkptindakan');
        $this->db->where('dari', $start);
        $this->db->where('sampai', $stop);
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
}

?>
