<?php defined('BASEPATH') OR exit('No direct script access allowed');


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kuantitas extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->helper('date');
    }
    
    public function index($dari=null, $sampai=null) {
        $this->load->model('modtindakan');
        $data['banner'] = false;
        $data['page'] = 'kuantitasview';
        $data['judul'] = 'Impor Data Kinerja';
        $data['content']['action'] = site_url('kuantitas/upload'); 
        if ($this->input->post()) {
            $dari = $this->input->post('filstart');
            $sampai = $this->input->post('filstop');
        }
        if ($dari == NULL || $sampai == NULL) {
            $dari = date("Y/m/01", strtotime("-1 month"));
            $sampai = date("Y/m/t", strtotime("-1 month"));
        }
        $data['content']['filaction'] = site_url('kuantitas'); 
        $data['content']['dari']  = $dari;
        $data['content']['sampai'] = $sampai;
        $data['content']['result'] = $this->modtindakan->showdata($dari, $sampai);
        //echo $this->db->last_query();
        $this->load->view('mainview', $data);
    }
    
    public function rekap($start=null, $stop=null) {
        $this->load->model('modtindakan');
        $data['banner'] = false;
        $data['page'] = 'rekapkuview';
        $data['judul'] = 'Rekap Data Kinerja';
        $data['content']['action'] = site_url('kuantitas/saverekapku');        
        if ($this->input->post()) {
            $start = $this->input->post('filstart');
            $stop = $this->input->post('filstop');
        } else if ($start == NULL || $stop == NULL) {
            $start = date("Y/m/01", strtotime("-1 month"));
            $stop = date("Y/m/t", strtotime("-1 month"));
        }
        $data['content']['filaction'] = site_url('kuantitas/rekap'); 
        $data['content']['dari']  = $start;
        $data['content']['sampai'] = $stop;
        $data['content']['result'] = $this->modtindakan->showrekap($start, $stop);
        $this->load->view('mainview', $data);
    }
    
    public function upload() {       
        // config upload
        $config['upload_path'] = './temp_upload/';
        $config['allowed_types'] = 'xls';
        $config['max_size'] = '10000';
        $this->load->library('upload');
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('userfile')) {
            // jika validasi file gagal, kirim parameter error ke index
            $error = array('error' => $this->upload->display_errors());
            $this->index($error);
        } else {
            // jika berhasil upload ambil data dan masukkan ke database
            $upload_data = $this->upload->data();

            // load library Excell_Reader
            $this->load->library('Excel_reader');

            //tentukan file
            $this->excel_reader->setOutputEncoding('210678'); //230787
            $file = $upload_data['full_path'];
            $this->excel_reader->read($file);
            error_reporting(E_ALL ^ E_NOTICE);
            //print_r($file);
            // array data
            $data = $this->excel_reader->sheets[0];
            $dataexcel = Array();
            for ($i = 2; $i <= $data['numRows']; $i++) {
                if ($data['cells'][$i][1] == '')
                    break;
                $dataexcel[$i - 2]['tgl'] = $data['cells'][$i][2];
                $dataexcel[$i - 2]['norm'] = $data['cells'][$i][3];
                $dataexcel[$i - 2]['nmpasien'] = $data['cells'][$i][4];
                $dataexcel[$i - 2]['crbayar'] = $data['cells'][$i][5];
                $dataexcel[$i - 2]['tipelayan'] = $data['cells'][$i][6];
                $dataexcel[$i - 2]['layanan'] = $data['cells'][$i][7];
                $dataexcel[$i - 2]['idgrplayan'] = $data['cells'][$i][8];
                $dataexcel[$i - 2]['grplayan'] = $data['cells'][$i][9];
                $dataexcel[$i - 2]['iddokter'] = $this->input->post('idpeg');
                $dataexcel[$i - 2]['dokter'] = $data['cells'][$i][11];
            }

            //load model
            $this->load->model('imporxls');
            $this->imporxls->savetindakan($dataexcel);

            //delete file
            $file = $upload_data['file_name'];
            $path = './temp_upload/' . $file;
            unlink($path);
            $this->session->set_flashdata('success', 'Upload data BERHASIL.');
        }
        redirect(site_url('kuantitas'));
        //echo $data['cells'][2][2];
        //echo $data['cells'][3][2];
        
    }

}