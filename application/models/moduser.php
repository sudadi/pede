<?php defined('BASEPATH') OR exit('No direct script access allowed');

 class Moduser extends CI_Model {
     function __construct() {
         parent:: __construct();
    }

    function login($userid, $password){
        $this->db->from('user');
        $this->db->where('userid', $userid);
        $this->db->where('password', sha1($password));
        $this->db->where('status', 1);
        $qry = $this->db->get();
        if ($qry->num_rows() == 1) return $qry->row(); 
    }
    
    function akses ($iduser){
        $this->db->select('idmenu, menu, link');
        $this->db->join('refmenu', 'refmenu.idmenu=refakses.idmenu', 'INNER');
        $this->db->where('iduser', $iduser);
        $this->db->where('active', 1);
        $qry = $this->db->get('refakses');
        if ($qry->num_rows() > 0) return $qry->result_array();
    }
}




