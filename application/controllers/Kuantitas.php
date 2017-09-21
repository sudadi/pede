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
    }
    
    public function index() {
        $data['page'] = 'kuantitasview';
        $data['judul'] = 'Impor Data Kinerja';
        $data['content']['action'] = site_url('kuantitas/upload');
        $this->load->view('mainview', $data);
    }
    
    public function upload()
    {
        // validasi judul
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
 
        if ($this->form_validation->run() == FALSE) {
            // jika validasi judul gagal
            $this->index();
        } else {
            // config upload
            $config['upload_path'] = './temp_upload/';
            $config['allowed_types'] = 'xls';
            $config['max_size'] = '10000';
            $this->load->library('upload', $config);
 
            if ( ! $this->upload->do_upload('gambar')) {
                // jika validasi file gagal, kirim parameter error ke index
                $error = array('error' => $this->upload->display_errors());
                $this->index($error);
            } else {
              // jika berhasil upload ambil data dan masukkan ke database
              $upload_data = $this->upload->data();
 
              // load library Excell_Reader
              $this->load->library('Excel_reader');
 
              //tentukan file
              $this->excel_reader->setOutputEncoding('230787');
              $file = $upload_data['full_path'];
              $this->excel_reader->read($file);
              error_reporting(E_ALL ^ E_NOTICE);
 
              // array data
              $data = $this->excel_reader->sheets[0];
              $dataexcel = Array();
              for ($i = 1; $i <= $data['numRows']; $i++) {
                   if ($data['cells'][$i][1] == '')
                       break;
                   $dataexcel[$i - 1]['nama'] = $data['cells'][$i][1];
                   $dataexcel[$i - 1]['tempat_lahir'] = $data['cells'][$i][2];
                   $dataexcel[$i - 1]['tanggal_lahir'] = $data['cells'][$i][3];
              }
              
              //load model
              $this->load->model('Data_model');
              $this->Data_model->loaddata($dataexcel);
 
              //delete file
              $file = $upload_data['file_name'];
              $path = './temp_upload/' . $file;
              unlink($path);
            }
        //redirect ke halaman awal
        redirect(site_url('out'));
        }
    }

}