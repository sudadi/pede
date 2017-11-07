<?php defined('BASEPATH') or exit ('No direct script access allowed');

/* 
 * The MIT License
 *
 * Copyright 2017 kampred_dot_kom <sudadi.kom@yahoo.com>.
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

class Kualitas extends CI_Controller{
    
    private $thn, $bln;
            
    function __construct() {
        parent:: __construct();
        $this->load->model('modkualitas');
        $this->load->model('modref');
    }
    
    function index() {
        redirect('main');
    }
    
    public function dokrm($bln=null, $thn=null) {
        $data['banner'] = false;
        $data['page'] = 'kualitasview';
        $data['judul'] = 'Kualitas - Kelengkapan Dokumen Rekam Medis';
        $data['content']['action'] = site_url('kualitas/save');
        $data['content']['filaction'] = site_url('kualitas/dokrm');
        $data['content']['idkw'] = 1;
        if ($this->input->post()){
            $bln = $this->input->post('bulan');
            $thn = $this->input->post('tahun');
        }
        $data['content']['bln'] = $bln;
        $data['content']['thn'] = $thn;
        $data['content']['result'] = $this->modkualitas->getkw(1, $bln, $thn);        
        $this->load->view('mainview', $data);
        //echo $this->db->last_query();
    }
    
    public function fornas($bln=null, $thn=null) {
        $data['banner'] = false;
        $data['page'] = 'kualitasview';
        $data['judul'] = 'Kualitas - Kepatuhan FORNAS';
        $data['content']['filaction'] = site_url('kualitas/fornas');
        $data['content']['idkw'] = 2;
        if ($this->input->post()){
            $bln = $this->input->post('bulan');
            $thn = $this->input->post('tahun');
        }
        if (!$bln || !$thn) {
            $bln = date("m");
            $thn = date("Y");
        }
        $start = date("$thn/$bln/01");
        $stop = date("$thn/$bln/t");
        $data['content']['bln'] = $bln;
        $data['content']['thn'] = $thn;
        $data['content']['action'] = site_url('kualitas/save');
        $data['content']['result'] = $this->modkualitas->getkw(2, $start, $stop);
        $this->load->view('mainview', $data);
    }
    
    public function behavior($start=null, $stop=null) {
        $data['banner'] = false;
        $data['page'] = 'entryview';
        $data['judul'] = 'Penilaian Perilaku';
        if ($start == NULL || $stop == NULL) {
            $start = date("01/m/Y");
            $stop = date("t/m/Y");
        }
        $data['content']['jns'] = 3;
        $data['content']['action'] = site_url('entry/save');
        $data['content']['result'] = $this->modentry->getbehav($start, $stop);
        $this->load->view('mainview', $data);
    }
    
    public function save() {
        if ($this->input->post()) {
            $idpeg = $this->input->post('idpeg');
            $thn = $this->input->post('tahun');
            $bln = $this->input->post('bulan');
            $capaian = $this->input->post('nilai');
            $idkw = $this->input->post('idkw');
            $start = date("$thn/$bln/01");
            $stop = date("$thn/$bln/t");
            $this->db->insert('trkpkualitas', array('dari'=>$start, 'sampai'=>$stop, 'idkw'=>$idkw, 
                'capaian'=>$capaian, 'idpeg'=>$idpeg));
            if ($this->db->affected_rows()>0){
                $this->session->set_flashdata('success', 'Data sudah tersimpan');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat di simpan');
            }                
            if($idkw == 1){
                redirect(base_url("kualitas/dokrm/$bln/$thn"));
            } else {
                redirect('kualitas/fornas');
            }
        }
    }
    
}