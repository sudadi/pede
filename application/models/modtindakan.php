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

    public function showdata ($bln, $thn) {
        $this->db->from('ttindakan');
        $this->db->where('month(tgl)', $bln);
        $this->db->where('year(tgl)', $thn);
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
}

?>
