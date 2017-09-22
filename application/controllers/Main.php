<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();

    }

    function index()
    {
        $data['banner'] = TRUE;
        $data['page'] = 'infopage';
        $data['judul'] = 'Informasi';
        $data['content']= '';
        $this->load->view('mainview', $data);
        
    }
}
