<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');
 
class Imporxls extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    //ini untuk memasukkan kedalam tabel pegawai
    function savetindakan($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $tgl = (string)$dataarray[$i]['tgl'];
            $data = array(
                //'id' => $i,                
                'tgl' => date_format(date_create($tgl),'Y/m/d'),
                'norm' => $dataarray[$i]['norm'],
                'nmpasien' => $dataarray[$i]['nmpasien'],
                'crbayar' => $dataarray[$i]['crbayar'],
                'tipelayan' => $dataarray[$i]['tipelayan'],
                'layanan' => $dataarray[$i]['layanan'],
                'idgrplayan' => $dataarray[$i]['idgrplayan'],
                'grplayan' => $dataarray[$i]['grplayan'],
                'iddokter' => $dataarray[$i]['iddokter'],
                'dokter' => $dataarray[$i]['dokter'],
                'updlog' => date('Y/m/d h:i:s')
            );
            //$this->db->where('nama', $this->input->post('nama')); 
            $sql = $this->db->insert_string('ttindakan', $data) . ' ON DUPLICATE KEY UPDATE updlog=NOW()';
            $this->db->query($sql);
            //$this->db->insert('ttindakan', $data);
        }
    }
}