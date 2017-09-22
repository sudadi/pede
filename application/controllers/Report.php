<?php defined('BASEPATH') or exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Report extends CI_Controller{

    function __construct() {
        parent:: __construct();
                
    }
    
    public function index() {
        $data['banner'] = false;
        $data['page'] = 'reportview';
        $data['judul'] = 'Laporan';
        $data['content']['action'] = site_url('');
        $this->load->view('mainview', $data);
    }
}