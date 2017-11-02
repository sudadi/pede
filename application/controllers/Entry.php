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

class Entry extends CI_Controller{
    
    private $thn, $bln;
            
    function __construct() {
        parent:: __construct();
        $this->load->model('modentry');
        $this->load->model('modref');
        $this->thn = date('Y');
        $this->bln = date('m');                
    }
    
    function index() {
        redirect('main');
    }
    
    public function dokrm() {
        $data['banner'] = false;
        $data['page'] = 'entryview';
        $data['judul'] = 'Kualitas - Kelengkapan Dokumen Rekam Medis';
        $data['content']['action'] = site_url('entry/save');
        $data['content']['jns'] = 1;
        $data['content']['result'] = $this->modentry->getdokrm($this->bln, $this->thn);        
        $this->load->view('mainview', $data);
    }
    
    public function fornas() {
        $data['banner'] = false;
        $data['page'] = 'entryview';
        $data['judul'] = 'Kualitas - Kepatuhan FORNAS';
        $data['content']['jns'] = 1;
        $data['content']['action'] = site_url('entry/save');
        $data['content']['result'] = $this->modentry->getfornas($this->bln, $this->thn);
        $this->load->view('mainview', $data);
    }
    
    public function perilaku() {
        $data['banner'] = false;
        $data['page'] = 'entryview';
        $data['judul'] = 'Penilaian Perilaku';
        $data['content']['action'] = site_url('entry/save');
        $data['content']['result'] = $this->modentry->getbehav($bln, $thn);
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