<?php defined('BASEPATH') OR exit('No direct script access allowed');


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Kuantitas extends CI_Controller {
    
    function __construct() {
        parent::__construct(); 
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('form_validation');
        $this->load->model('modtindakan');
    }
    
    function validateDate($date) {
        $d = DateTime::createFromFormat('Y/m/d', $date);
        if ($d && ($d->format('Y/m/d') === $date || $d->format('Y-m-d') === $date)) {
            return $d->format('Y/m/d');
        } else {
            return FALSE;
        }
    }
    
    public function index($dari=null, $sampai=null) {
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
    
    public function rekap($dari=null, $sampai=null) {
        $data['banner'] = false;
        $data['page'] = 'rekapkuview';
        $data['judul'] = 'Rekap Data Kinerja';
        $data['content']['action'] = site_url('kuantitas/saverekapku');        
        if ($this->input->post()) {
            $dari = $this->input->post('filstart');
            $sampai = $this->input->post('filstop');
        } else if (!$dari || !$sampai) {
            $dari = date("Y/m/01", strtotime("-1 month"));
            $sampai = date("Y/m/t", strtotime("-1 month"));
        }
        $data['content']['filaction'] = site_url('kuantitas/rekap'); 
        $data['content']['dari']  = $dari;
        $data['content']['sampai'] = $sampai;
        $data['content']['result'] = $this->modtindakan->showrekap($dari, $sampai);
        $this->load->view('mainview', $data);
    }
    
    public function saverekapku() {
        if ($this->input->post()) {
            $dari = $this->input->post('mulai');
            $sampai = $this->input->post('selesai');
            $row = $this->db->get_where('ttindakan', "tgl between '$dari' and '$sampai'")->result_array();
            if ($row){
                $this->db->query("CALL rekap_tindakan('$dari', '$sampai')");
                if ($this->db->affected_rows()>0) {
                    $this->session->set_flashdata('success', 'Rekap Data Berhasil');
                }else {
                    $this->session->set_flashdata('error', 'Rekap Data GAGAL');
                }
            }else {
                $this->session->set_flashdata('error', 'Data pada rentang tersebut tidak ditemukan');
            }
        }
        //print_r($row);
        redirect('kuantitas/rekap');
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
                $cektgl = $this->validateDate($data['cells'][$i][2]);
                if ($data['cells'][$i][1] == '')
                    break;
                if ($cektgl) {
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
                    $cektgl = FALSE;
                } else {
                    $cektgl = 'Error Line Number: '.$i;
                    break;
                }
            }
            
            if ($cektgl) {
                $this->session->set_flashdata('error', $cektgl);
            } else {
                //load model
                $this->load->model('imporxls');
                $this->imporxls->savetindakan($dataexcel);

                //delete file
                $file = $upload_data['file_name'];
                $path = './temp_upload/' . $file;
                unlink($path);
                $this->session->set_flashdata('success', 'Upload data BERHASIL.');
            }
        }
        redirect(site_url('kuantitas'));
        //echo $data['cells'][2][2];
        //echo $data['cells'][3][2];
        
    }
    
    public function hapuslyn($id, $dari, $sampai) {
        if ($id && $dari && $sampai) {
            $this->db->delete('ttindakan', array('id'=>$id, 'dari'=>$dari, 'sampai'=>$sampai));
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data di hapus');
            } else {
                $this->session->set_flashdata('error', 'Hapus data GAGAL');
            }
        } else {
            $this->session->set_flashdata('error', 'Parameter tidak lengkap');
        }
        redirect("kuantitas/index/$dari/$sampai");
    }
    
    public function hapusrkp($id, $dari, $sampai) {
        if ($id && $dari && $sampai) {
            $this->db->delete('trkptindakan', array('id'=>$id, 'dari'=>$dari, 'sampai'=>$sampai));
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data di hapus');
            } else {
                $this->session->set_flashdata('error', 'Hapus data GAGAL');
            }
        } else {
            $this->session->set_flashdata('error', 'Parameter tidak lengkap');
        }
        redirect("kuantitas/rekap/$dari/$sampai");
    }

}