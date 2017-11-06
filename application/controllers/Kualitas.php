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
        $data['content']['idkw'] = 1;
        
        if (!$bln || !$thn) {
            $bln = date("m");
            $thn = date("Y");
        }
        $start = date("$thn/$bln/01");
        $stop = date("$thn/$bln/t");
        $data['content']['result'] = $this->modkualitas->getkw(1, $start, $stop);        
        $this->load->view('mainview', $data);
    }
    
    public function fornas($start=null, $stop=null) {
        $data['banner'] = false;
        $data['page'] = 'entryview';
        $data['judul'] = 'Kualitas - Kepatuhan FORNAS';
        if ($start == NULL || $stop == NULL) {
            $start = date("01/m/Y");
            $stop = date("t/m/Y");
        }
        $data['content']['jns'] = 2;
        $data['content']['action'] = site_url('entry/save');
        $data['content']['result'] = $this->modentry->getfornas($start, $stop);
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
            $tahun = $this->input->post('tahun');
            $bulan = $this->input->post('bulan');
            $nilai = $this->input->post('nilai');
            $jns = $this->input->post('jns');
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