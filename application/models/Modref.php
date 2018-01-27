<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modref extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
    function getdokter() {
        $this->db->where('dokter', 1);
        $qry = $this->db->get('refpegawai');
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
    
    function getmenu($sub) {
        $this->db->where('active', '1');
        $this->db->where('sub', $sub);
        $this->db->order_by('urutan', 'asc');
        return $this->db->get('refmenu')->result_arraY();
    }
    
    function getrefbhv() {
        return $this->db->get('refbehavior')->result_array();
    }
    
    function getgrplayan() {
        return $this->db->get('refgrplayan')->result_array();
    }
    
    function getlayan() {
        $this->db->join('refgrplayan', 'reflayanan.idgrp=refgrplayan.idgrp');
        return $this->db->get('reflayanan')->result_array();
    }
    
    function getkualitas() {
        return $this->db->get('refkualitas')->result_array();
    }

function getkualitas($id=null) {
if ($id) $this->DB->where('idsat', $idsat);
        return $this->db->get('refsatker')->result_array();
    }

}
?>