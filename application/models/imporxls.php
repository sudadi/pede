<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
 
class Imporxls extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    //ini untuk memasukkan kedalam tabel pegawai
    function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                //'id' => $i,
                'tgl' => $dataarray[$i]['tgl'],
                'norm' => $dataarray[$i]['norm'],
                'nmpasien' => $dataarray[$i]['nmpasien'],
                'crbayar' => $dataarray[$i]['crbayar'],
                'tipelayan' => $dataarray[$i]['tipelayan'],
                'layanan' => $dataarray[$i]['layanan'],
                'dokter' => $dataarray[$i]['dokter']
            );
            //$this->db->where('nama', $this->input->post('nama'));            
            $this->db->insert('tperform', $data);
        }
    }
}