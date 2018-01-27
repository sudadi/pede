<?php defined('BASEPATH') or exit ('No direct script access allowed');

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

class Refsatker extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('modref');
    }
    
    public function index($edit=null) {
        $data['banner'] = false;
        $data['page'] = 'satkerview';
        $data['judul'] = 'Referensi - Data Satuan Kerja';
        if ($edit) {
            
        }
        $data['content']['action'] = site_url('refsatker/save');
        //$data['content']['filaction'] = site_url('');
        $data['content']['result'] = $this->modref->getrefsatker();        
        $this->load->view('mainview', $data);
    }
    
    public function save() {
        if ($this->input->post()) {
            $nmsatker = $this->input->post('nmsatker');
            $edit = $this->input->post('edit');
            if ($edit) {
                
            } else {
                $this->db->insert('refsatker', array('nmsatker'=>$nmsatker));
            }
            if ($this->db->affected_rows()>0) {
                $this->session->set_flashdata('success', 'Data sudah tersimpan');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat di simpan');
            }
        }
        redirect('refsatker');
    }
    
    public function hapus($id) {
        if ($id) {
            $this->db->delete('refsatker', 'idsat='.$id);
            if ($this->db->affected_rows()>0) {
                $this->session->set_flashdata('success', 'Data sudah dihapus');
            } else {
                $this->session->set_flashdata('error', 'Data tidak dapat dihapus');
            }
        }
        redirect('refsatker');
    }
    
}