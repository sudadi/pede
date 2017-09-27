<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Modbehav extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function getbehav($bln, $thn) {
        $this->db->join('refpegawai', 'tresbehav.idpeg=refpegawai.idpeg');
        $this->db->where('bln', $bln);
        $this->db->where('thn', $thn);
        return $this->db->get('tresbehav')->result_array();
    }

}
?>