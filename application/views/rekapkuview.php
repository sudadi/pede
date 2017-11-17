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
        <label class="control-label col-sm-3 col-xs-12" for="daterange">Rentang Data Tindakan</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="input-prepend input-group">
              <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
              <input type="text" style="width: 200px;" name="daterange1" id="rentang" class="form-control" value="<?=$dari.' - '.$sampai;?>" required="required" />
            </div>
        </div>
        <input type="hidden" name="mulai" id="mulai" value="<?=$dari;?>">
        <input type="hidden" name="selesai" id="selesai" value="<?=$sampai;?>">
    </div><br/>
    <div class="form-group">
        <div class="col-md-12 col-sm-offset-4">
           <?php echo form_button(array('type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Rekap &nbsp;<i class="fa fa-clone"></i>'));?>
           <a href="<?=current_url();?>" class="btn btn-warning">Batal &nbsp;<i class="fa fa-undo"></i></a>
        </div>
    </div>
<?=form_close();?>
<hr />
<?=form_open($filaction, 'class="form-horizontal form-label-left"');?>
<div class="form-group">
    <label class="control-label col-sm-1 col-xs-12" for="ragefilter">Filter </label>
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="input-prepend input-group">
          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
          <input type="text" style="width: 250px;" name="rangefilter" id="rangefilter" class="form-control" value="<?=$dari.' - '.$sampai;?>" required="required" />
        </div>
    </div>&nbsp;    
    <?php echo form_hidden('filstart', $dari);
        echo form_hidden('filstop', $sampai);         
        echo form_button(array('type'=>'submit', 'class'=>'btn btn-default', 'content'=>'Tampil &nbsp;<i class="fa fa-eye"></i>'));?>
</div>
<?=form_close();?>
<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">#</th>
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
        $i = 0;
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
