<?php

/* 
 * The MIT License
 *
 * Copyright 2018 DotKom <sudadi.kom@yahoo.com>.
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

class Refpegawai extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('modref');
    }
    
    public function index() {
        $data['banner'] = false;
        $data['page'] = 'pegawaiview';
        $data['judul'] = 'Data Referensi Pegawai';
        $data['content']['action'] = site_url('refpegawai/save');
        //$data['content']['filaction'] = site_url('');
        $data['content']['result'] = $this->modref->getpegawai();        
        $this->load->view('mainview', $data);
    }
    
    public function save() {
        if ($this->input->post()) {
            $nmpeg = $this->input->post('nmpeg');
            $nip = $this->input->post('nip'); 
            $jk = $this->input->post('jk');
            $tmplahir = $this->input->post('tmplahir');
            $tgllahir = $this->input->post('tgllahir');
            $alamat = $this->input->post('alamat');
            $idjab = $this->input->post('jab');
            $idsat = $this->input->post('satker');
            $dokter = $this->input->post('dokter');
            $this->db->insert('refpegawai', array('nama'=>$nmpeg, 'nip'=>$nip, 'jk'=>$jk, 'alamat'=>$alamat, 'tempatlhr'=>$tmplahir,
                'tgllhr'=>$tgllahir, 'idjabatan'=>$idjab, 'idsat'=>$idsat, 'dokter'=>$dokter));
            if ($this->db->affected_rows()>0){
                $this->session->set_flashdata('success', 'Data sudah tersimpan');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat di simpan');
            }
        }
        redirect('refpegawai');
    }
    
    public function hapus($id) {
        if ($id) {
            $this->db->delete('refpegawai', 'idpeg='.$id);
            if ($this->db->affected_rows()>0) {
                $this->session->set_flashdata('success', 'Data sudah dihapus');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat dihapus');
            }
        }
        redirect('refpegawai');
    }
    
}