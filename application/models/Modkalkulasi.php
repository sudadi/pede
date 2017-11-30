<?php defined('BASEPATH') or exit('No direct script access allowed');

/* 
 * The MIT License
 *
 * Copyright 2017 DotKom <sudadi.kom@yahoo.com>.
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

class Modkalkulasi extends CI_Model {

    function __construct() {
        parent::__construct();
        
    }
    
    function getdata($thn) {
        $this->db->where("year(tgl)", $thn);
        $this->db->join("tidxk1", "tidxk1.idxk1=tresult.idxk1");
        $this->db->join("tidxk2", "tidxk2.idxk2=tresult.idxk2");
        $this->db->join("tidxk3", "tidxk3.idxk3=tresult.idxk3");
        return $this->db->get("tresult")->result_array();
    }
    
    function getidxk1($thn) {
        return $this->db->get_where("tidxk1", "year(sampai)='$thn'")->result_array();
    }
    
    function getidxk2($thn) {
        return $this->db->get_where("tidxk2", "year(sampai)='$thn'")->result_array();
    }
    
    function getidxk3($thn) {
        return $this->db->get_where("tidxk3", "year(sampai)='$thn'")->result_array();
    }
}
