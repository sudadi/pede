<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * The MIT License
 *
 * Copyright 2018 DotKom <sudadi.kom@yahoo.com>.
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

echo form_open_multipart($action, 'class="form-horizontal form-label-left" data-parsley-validate');?>
<div class="form-group">
    <label class="control-label col-sm-2 col-xs-12" for="nmgrp">Nama Group</label>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <input type="text" name="nmgroup" id="nmgroup" size="20" class="form-control" required="required"/>
        </div>
    <label class="control-label col-sm-2 col-xs-12" for="point">Poin/Bobot</label>
        <div class="col-sm-2 col-xs-12">
            <input type="number" name="point" id="point" size="20" class="form-control" required="required"/>
        </div>
</div><br/>
<div class="form-group">
    <div class="col-md-12 col-sm-offset-4">
       <?php echo form_button(array('type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Upload &nbsp;<i class="fa fa-save"></i>'));?>
       <a href="<?=current_url();?>" class="btn btn-warning">Batal &nbsp;<i class="fa fa-undo"></i></a>
    </div>
</div>
<?=form_close();?>

<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title text-center">#</th>
                <th class="column-title text-center">Nama Kelompok Layanan</th>
                <th class="column-title text-center">Poin/Bobot</th>
                <th class="column-title text-center">Opsi</th>
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