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

class Refkualitas extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('modref');
    }
    
    public function index() {
        $data['banner'] = false;
        $data['page'] = 'refkualitasview';
        $data['judul'] = 'Data Referensi Kualitas';
        $data['content']['action'] = site_url('refkualitas/save');
        //$data['content']['filaction'] = site_url('');
        $data['content']['result'] = $this->modref->getkualitas();        
        $this->load->view('mainview', $data);
    }
    
    public function save() {
        if ($this->input->post()) {
            $nmqly = $this->input->post('nmqly');
            $point = $this->input->post('point');
            $target = $this->input->post('target');     
            $this->db->insert('refkualitas', array('nmqly'=>$nmqly, 'point'=>$point, 'target'=>$target));
            if ($this->db->affected_rows()>0){
                $this->session->set_flashdata('success', 'Data sudah tersimpan');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat di simpan');
            }
        }
        redirect('refkualitas');
    }
    
    public function hapus($id) {
        if ($id) {
            $this->db->delete('refkualitas', 'idqly='.$id);
            if ($this->db->affected_rows()>0) {
                $this->session->set_flashdata('success', 'Data sudah dihapus');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat dihapus');
            }
        }
        redirect('refkualitas');
    }
    
}