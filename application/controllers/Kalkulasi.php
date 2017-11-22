<?php defined('BASEPATH') or exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kalkulasi extends CI_Controller{

    function __construct() {
        parent:: __construct();
        $this->load->model("modref");
        $this->load->model("modkalkulasi");
                
    }
    
    public function index($thn=null) {
        $data['banner'] = false;
        $data['page'] = 'kalkulasiview';
        $data['judul'] = 'Kalkulasi - Proses Peritungan Kinerja';
        $dari = date("Y/m/01", strtotime("-1 month"));
        $sampai = date("Y/m/t", strtotime("-1 month"));
        $data['content']['dari'] = $dari;
        $data['content']['sampai'] = $sampai;
        if (!$thn){
            $thn = date("Y");
        }
        $data['content']['action'] = site_url('kalkulasi/proses');
        $data['content']['filtahun']=date('Y');
        $data['content']['result'] = $this->modkalkulasi->getdata($thn);
        $this->load->view('mainview', $data);
    }
    
    public function proses() {
        if ($this->input->post()) {
            $dari = $this->input->post('mulai');
            $sampai = $this->input->post('selesai');
            $row = $this->db->get_where('ttindakan', "tgl between '$dari' and '$sampai'")->result_array();
            if ($row){
                $this->db->query("CALL rekap_tindakan('$dari', '$sampai')");
                if ($this->db->affected_rows()>0) {
                    $this->session->set_flashdata('success', 'Rekap Data Berhasil');
                }else {
                    $this->session->set_flashdata('error', 'Rekap Data GAGAL');
                }
            }else {
                $this->session->set_flashdata('error', 'Data pada rentang tersebut tidak ditemukan');
            }
        }
        //print_r($row);
        //redirect('kuantitas/rekap');        
    }
}