<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modpegawai extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function getdokter() {
        $this->db->where('dokter', 1);
        $qry = $this->db->get('refpegawai');
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
}
?>