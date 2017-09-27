<?php defined('BASEPATH') or exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dokrm extends CI_Controller{

    function __construct() {
        parent:: __construct();
        $this->load->model('moddokrm');
                
    }
    
    public function index() {
        $thn = date('Y');
        $bln = date('m');
        $this->load->model('modref');
        $data['banner'] = false;
        $data['page'] = 'dokrmview';
        $data['judul'] = 'Kualitas - Kelengkapan Dokumen Rekam Medis';
        $data['content']['action'] = site_url('dokrm/save');
        $data['content']['result'] = $this->moddokrm->getdokrm($bln, $thn);
        
        $this->load->view('mainview', $data);
    }
    
    public function save() {
        if ($this->input->post()) {
            $idpeg = $this->input->post('idpeg');
            $tahun = $this->input->post('tahun');
            $bulan = $this->input->post('bulan');
            $nilai = $this->input->post('nilai');
            $this->db->insert('tresdokrm', array('tgl'=>date('Y/m/d'), 'thn'=>$tahun, 'bln'=>$bulan, 
                'capaian'=>$nilai, 'idpeg'=>$idpeg));
            if ($this->db->affected_rows()>0){
                $this->session->set_flashdata('success', 'Data sudah tersimpan');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat di simpan');
            }                
            redirect(base_url('dokrm'));
        }
    }

}