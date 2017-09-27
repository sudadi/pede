<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modfornas extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getfornas($bln, $thn) {
        $this->db->join('refpegawai', 'tresfornas.idpeg=refpegawai.idpeg');
        $this->db->where('bln', $bln);
        $this->db->where('thn', $thn);
        return $this->db->get('tresfornas')->result_array();
    }

    function savedokrm() {
        
    }
}
?>