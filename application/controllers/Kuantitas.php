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
        $data['banner'] = false;
        $data['page'] = 'kuantitasview';
        $data['judul'] = 'Impor Data Kinerja';
        $data['content']['action'] = site_url('kuantitas/upload');
        $this->load->view('mainview', $data);
    }
    
    public function upload()
    {
       
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
              $this->excel_reader->setOutputEncoding('230787');
              $file = $upload_data['full_path'];
              $this->excel_reader->read($file);
              error_reporting(E_ALL ^ E_NOTICE);
              print_r($file);
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
                   $dataexcel[$i - 2]['dokter'] = $data['cells'][$i][9];
              }
              
              //load model
              $this->load->model('imporxls');
              $this->imporxls->loaddata($dataexcel);
 
              //delete file
              $file = $upload_data['file_name'];
              $path = './temp_upload/' . $file;
              unlink($path);
            }
        redirect(site_url('kuantitas'));
        
    }

}