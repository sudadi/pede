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
        <label class="control-label col-sm-3 col-xs-12" for="daterange">Range Tindakan</label>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="input-prepend input-group">
              <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
              <input type="text" style="width: 200px;" name="daterange" class="form-control" value="<?=$mulai.' - '.$selesai;?>" required="required" />
            </div>
        </div>
        <input type="hidden" name="mulai" id="mulai" value="<?=$mulai;?>">
        <input type="hidden" name="selesai" id="selesai" value="<?=$selesai;?>">
    </div><br/>
    <div class="form-group">
        <div class="col-md-12 col-sm-offset-4">
           <?php echo form_button(array('type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Upload &nbsp;<i class="fa fa-upload"></i>'));?>
           <a href="<?=current_url();?>" class="btn btn-warning">Batal &nbsp;<i class="fa fa-undo"></i></a>
        </div>
    </div>
<?=form_close();?>
<hr />
<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Tgl</th>
                <th class="column-title">Norm</th>
                <th class="column-title">Nama Pasien</th>
                <th class="column-title">Cara Bayar</th>
                <th class="column-title">Tipe Layanan</th>
                <th class="column-title">Layanan</th>
                <th class="column-title">Dokter</th>
                <th class="column-title">Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i =$result= 0;
        if ($result){
            foreach ($result as $row){
                $i++; ?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$row['tgl'];?></td>
                <td><?=$row['norm'];?></td>
                <td><?=$row['nmpasien'];?></td>
                <td><?=$row['crbayar'];?></td>
                <td><?=$row['tipelayan'];?></td>
                <td><?=$row['layanan'];?></td>
                <td><?=$row['dokter'];?></td>
                <td></td>
            </tr>
        <?php   }
        } ?>
        </tbody>
    </table>
</div>
