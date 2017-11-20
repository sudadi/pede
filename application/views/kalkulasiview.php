<?php defined('BASEPATH') OR exit('No direct script access allowed');


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

echo form_open($action, 'class="form-horizontal form-label-left" data-parsley-validate');?>
<div class="form-group">
    <label class="control-label col-sm-2 col-xs-12" for="daterange">Rentang Tindakan</label>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="input-prepend input-group">
          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
          <input type="text" style="width: 200px;" name="daterange1" id="rentang" class="form-control" value="<?=$dari.' - '.$sampai;?>" required="required" />
        </div>
    </div>
    <label class="control-label col-sm-2 col-xs-12" for="tahun1">Kualitas</label>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <?php 
        $selisih = date('Y') - 2017;
        $option[''] = '-Tahun-';
        for ($i = 0; $i <= $selisih; $i++){
            $thn1 = 2017 + $i;
            $option[$thn1] = $thn1;
        }
        echo form_dropdown('tahun1', $option, $thn1, 'class="form-control col-sm-12 col-xs-12" id="tahun1" required');?>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <?php 
        $option = '';
        $option[''] = '-Bulan-';
        for ($i = 0; $i <= 11; ++$i) {
             $time = strtotime(sprintf('+%d months', $i-1));
             $option[date('m', $time)] = date('F', $time);
        }
        echo form_dropdown('bulan1', $option, date('m', time()), 'class="form-control col-sm-12 col-xs-12" required');?>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2 col-xs-12" for="tahun2">Perilaku</label>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <?php 
        $option = '';
        $selisih = date('Y') - 2017;
        $option[''] = '-Tahun-';
        for ($i = 0; $i <= $selisih; $i++){
            $thn2 = 2017 + $i;
            $option[$thn2] = $thn2;
        }
        echo form_dropdown('tahun2', $option, $thn2, 'class="form-control col-sm-12 col-xs-12" id="tahun2" required');?>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <?php 
        $option = '';
        $option[''] = '-Bulan-';
        for ($i = 0; $i <= 11; ++$i) {
             $time = strtotime(sprintf('+%d months', $i-1));
             $option[date('m', $time)] = date('F', $time);
        }
        echo form_dropdown('bulan2', $option, date('m', time()), 'class="form-control col-sm-12 col-xs-12" required');?>
    </div>
    <label class="control-label col-sm-2" for="ket">Keterangan</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" required="required" />
    </div>
</div>
<br />
<div class="form-group">
    <div class="col-md-12 col-sm-offset-4">
        <div class="col-sm-2">
        <?php 
        //echo form_hidden('idkw', $idkw);
        echo form_button(array('type'=>'submit', 'class'=>'btn btn-success btn-block', 'content'=>'Proses &nbsp;<i class="fa fa-retweet"></i>'));?>
        </div>
        <div class="col-sm-2">
            <a href="<?=current_url();?>" class="btn btn-warning btn-block">Batal &nbsp;<i class="fa fa-undo"></i></a>
        </div>
    </div>
</div>
<hr />
<?=form_close();?>
<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title" colspan="2">#</th>
                <th class="column-title">Dari</th>
                <th class="column-title">Sampai</th>
                <th class="column-title">Group Layanan</th>
                <th class="column-title">ID Dokter</th>
                <th class="column-title">Nilai</th>
                <th class="column-title">Capaian</th>
                <th class="column-title">Jml</th>
                <th class="column-title">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = $result = 0;
        if ($result){
            foreach ($result as $row){
                $i++; ?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$row['dari'];?></td>
                <td><?=$row['sampai'];?></td>
                <td><?=$row['grplayan'];?></td>
                <td><?=$row['idpeg'];?></td>
                <td><?=$row['point'];?></td>
                <td><?=$row['capaian'];?></td>
                <td><?=$row['jml'];?></td>
                <td class="text-center">
                    <a href="<?=base_url().'kuantitas/hapusrkp/'.$row['id'].'/'.date_format(date_create($dari), 'Y-m-d').'/'.date_format(date_create($sampai), 'Y-m-d');?>" 
                       class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data tersebut..?')">
                        <i class="fa fa-trash-o"></i> Hapus</a>
                </td>
            </tr>
        <?php   }
        } ?>
        </tbody>
    </table>
</div>
<!--
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab1" class="nav nav-tabs bar_tabs left" role="tablist">
        <li role="presentation" class="active"><a href="#tab_content1" id="home-tabb" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">1. Kuantitas</a></li>
        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tabb1" data-toggle="tab" aria-controls="profile" aria-expanded="false">2. Dok. RM</a></li>
        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tabb2" data-toggle="tab" aria-controls="profile" aria-expanded="false">3. Fornas</a></li>
        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tabb3" data-toggle="tab" aria-controls="profile" aria-expanded="false">4. Perilaku</a></li>
        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tabb4" data-toggle="tab" aria-controls="profile" aria-expanded="false">5. Hasil Akhir</a></li>    
    </ul>
    <div id="myTabContent2" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
          <p></p>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
            <p></p>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
          <p> </p>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
          <p> </p>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab">
          <p> </p>
        </div>
    </div>
</div>
-->