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

echo form_open($filaction, 'class="form-horizontal form-label-left"');?>
<div class="form-group">
    <label class="control-label col-md-1" for="filteridxk">Tahun</label>
    <div class="col-sm-2">
        <?php 
        $selisih = date('Y') - 2017;
        $option[''] = '-Tahun-';
        for ($i = 0; $i <= $selisih; $i++){
            $thn1 = 2017 + $i;
            $option[$thn1] = $thn1;
        }
        echo form_dropdown('filteridxk', $option, $filtahun, 'class="form-control col-sm-12 col-xs-12" id="tahun1" onchange="this.form.submit()" required');?>
    </div>
</div>
<?=form_close();
echo form_open($action, 'class="form-horizontal form-label-left" data-parsley-validate');?>
<div class="form-group">
    <label class="control-label col-md-1 col-xs-12" for="daterange">Kuantitas</label>
    <div class="col-sm-3 col-xs-12">
        <?php 
        $option = '';
        $option[''] = '-Periode-';
        foreach ($idxk1 as $row) {
            $option[$row['idxk1']] = $row['dari'].' s/d '.$row['sampai'];
        }
        echo form_dropdown('idxk1', $option, '', 'class="form-control col-sm-12 col-xs-12" id="tahun1" required');?>
    </div>
    <label class="control-label col-md-1 col-xs-12" for="idxk1">Kualitas</label>
    <div class="col-sm-3 col-xs-12">
        <?php 
        $option = '';
        $option[''] = '-Periode-';
        foreach ($idxk2 as $row) {
            $option[$row['idxk2']] = $row['dari'].' - '.$row['sampai'];
        }
        echo form_dropdown('idxk2', $option, '', 'class="form-control col-sm-12 col-xs-12" id="tahun1" required');?>
    </div>
    <label class="control-label col-md-1 col-xs-12" for="tahun2">Perilaku</label>
    <div class="col-sm-3 col-xs-12">
        <?php 
        $option = '';
        $option[''] = '-Periode-';
        foreach ($idxk3 as $row) {
            $option[$row['idxk3']] = $row['dari'].' - '.$row['sampai'];
        }
        echo form_dropdown('idxk3', $option, '', 'class="form-control col-sm-12 col-xs-12" id="tahun1" required');?>
    </div>
    </div>
<div class="form-group">
    <label class="control-label col-md-1" for="ket">Keterangan</label>
    <div class="col-sm-8">
        <input type="text" class="form-control" required="required" />
    </div>
</div>
<br />
<div class="form-group">
    <div class="col-md-12 col-sm-offset-4">
        <div class="col-sm-2">
        <?php 
        echo form_hidden('mulai');
        echo form_hidden('selesai');
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
    <table id="dtables" class="table table-striped table-bordered bulk_action">
        <thead>
            <tr class="bg-primary">
                <th class="column-title text-center" rowspan="2">#</th>
                <th class="column-title text-center" rowspan="2">Tgl</th>
                <th class="column-title text-center" rowspan="2">Pegawai</th>
                <th class="column-title text-center" colspan="3">Periode</th>
                <th class="column-title text-center" rowspan="2">Rp/Indek</th>
                <th class="column-title text-center" rowspan="2">Tot. IKI</th>
                <th class="column-title text-center" rowspan="2">Jml</th>
                <th class="column-title text-center" rowspan="2">Opsi</th>
            </tr>
            <tr class="bg-blue">
                <th class="column-title text-center">Kuantitas</th>
                <th class="column-title text-center">Kualitas</th>
                <th class="column-title text-center">Perilaku</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i = 0;
        if ($result){
            foreach ($result as $row){
                $i++; ?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$row['tgl'];?></td>
                <td><?=$row['ket'];?></td>
                <td><?=$row['idxk1'];?></td>
                <td><?=$row['idxk2'];?></td>
                <td><?=$row['idxk3'];?></td>
                <td><?=$row['rppoin'];?></td>
                <td><?=$row['resiki'];?></td>
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
