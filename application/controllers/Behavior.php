<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * The MIT License
 *
 * Copyright 2017 DotKom <sudadi.kom@yahoo.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */ 

class Behavior extends CI_Controller{

            
    function __construct() {
        parent:: __construct();
        $this->load->model('modbehavior');
        $this->load->model('modref');
    }
    
    public function index($bln=null, $thn=null) {
        $data['banner'] = false;
        $data['page'] = 'behaviorview';
        $data['judul'] = 'Behavior - Penilaian Perilaku Pegawai';
        $data['content']['action'] = site_url('behavior/save');
        $data['content']['filaction'] = site_url('behavior');
        //$data['content']['idbhv'] = 1;
        if ($this->input->post()){
            $bln = $this->input->post('bulan');
            $thn = $this->input->post('tahun');
        }
        $data['content']['bln'] = $bln;
        $data['content']['thn'] = $thn;
        $data['content']['result'] = $this->modbehavior->getbhv(null, $bln, $thn);        
        $this->load->view('mainview', $data);
    }
    
    public function save() {
        if ($this->input->post()) {
            $idpeg = $this->input->post('idpeg');
            $thn = $this->input->post('tahun');
            $bln = $this->input->post('bulan');
            $capaian = $this->input->post('nilai');
            $idbhv = $this->input->post('idbhv');
            $start = date("$thn/$bln/01");
            $stop = date("$thn/$bln/t");
            $this->db->insert('trkpbehavior', array('dari'=>$start, 'sampai'=>$stop, 'idbhv'=>$idbhv, 
                'capaian'=>$capaian, 'idpeg'=>$idpeg));
            if ($this->db->affected_rows()>0){
                $this->session->set_flashdata('success', 'Data sudah tersimpan');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat di simpan');
            }
            redirect(base_url("behavior/index/$bln/$thn"));
            
        }
    }
    
    public function hapus($idrkpbhv, $bln, $thn) {
        if ($idrkpbhv && $bln && $thn) {
            $this->db->where("idrkpbhv='$idrkpbhv'");
            $this->db->delete("trkpbehavior");
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data sudah dihapus');
            } else {
                $this->session->set_flashdata('error', 'Hapus data GAGAL');
            }
            redirect("behavior/index/$bln/$thn");
        } else {
            redirect('main');
        }
        
    }
}

