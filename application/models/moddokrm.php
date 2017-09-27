<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Moddokrm extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getdokrm($bln, $thn) {
        $this->db->join('refpegawai', 'tresultb1.idpeg=refpegawai.idpeg');
        $this->db->where('bln', $bln);
        $this->db->where('thn', $thn);
        return $this->db->get('tresultb1')->result_array();
    }

    function savedokrm() {
        
    }
}
?>