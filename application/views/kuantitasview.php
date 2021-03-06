<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


echo form_open_multipart($action, 'class="form-horizontal form-label-left" data-parsley-validate');?>
<div class="form-group">
    <label class="control-label col-sm-2 col-xs-12" for="idpeg">Dokter</label>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <?php 
                $option='';
                $option['']='--Pilih Dokter--';
                $dokter = $this->modref->getdokter();
                foreach ($dokter as $key => $value) {
                    $option[$value['idpeg']] = $value['nama'];
                }
                echo form_dropdown('idpeg', $option, '', 'class="js-select2 form-control col-sm-12" required');
            ?>
        </div>
    <label class="control-label col-sm-2 col-xs-12" for="nilai">File Upload</label>
        <div class="col-sm-4 col-xs-12">
            <?php //$attribut = array('name'=>'filexls', 'type'=>'file', 'class'=>'form-control col-sm-12 col-xs-12', 'required'=>'required');
            //echo form_upload($attribut);?>
            <input type="file" name="userfile" size="20" class="form-control" required="required"/>
        </div>
</div><br/>
<div class="form-group">
    <div class="col-md-12 col-sm-offset-4">
       <?php echo form_button(array('type'=>'submit', 'class'=>'btn btn-success', 'content'=>'Upload &nbsp;<i class="fa fa-upload"></i>'));?>
       <a href="<?=current_url();?>" class="btn btn-warning">Batal &nbsp;<i class="fa fa-undo"></i></a>
    </div>
</div>
<?=form_close();?>
<br/><hr />
<?=form_open($filaction, 'class="form-horizontal form-label-left"');?>
<div class="form-group">
    <label class="control-label col-sm-1 col-xs-12" for="ragefilter">Filter </label>
    <div class="col-md-4 col-sm-4 col-lg-3 col-xs-12">
        <div class="input-prepend input-group">
          <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
          <input type="text"  name="rangefilter" id="rangefilter" class="form-control" value="<?=$dari.' - '.$sampai;?>" required="required" />
        </div>
    </div>&nbsp;    
    <?php echo form_hidden('filstart', $dari);
        echo form_hidden('filstop', $sampai);         
        echo form_button(array('type'=>'submit', 'class'=>'btn btn-default', 'content'=>'Tampil &nbsp;<i class="fa fa-eye"></i>'));?>
</div>
<?=form_close();?>
<br />
<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Tgl</th>
                <th class="column-title">Norm</th>
                <th class="column-title">Nama Pasien</th>
                <th class="column-title">Tipe Layanan</th>
                <th class="column-title">Kel. Layanan</th>
                <th class="column-title">Layanan</th>
                <th class="column-title">Dokter</th>
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
                <td><?=$row['tgl'];?></td>
                <td><?=$row['norm'];?></td>
                <td><?=$row['nmpasien'];?></td>
                <td><?=$row['tipelayan'];?></td>
                <td><?=$row['grplayan'];?></td>
                <td><?=$row['layanan'];?></td>
                <td><?=$row['dokter'];?></td>
                <td class="text-center">
                    <a href="<?=base_url().'kuantitas/hapuslyn/'.$row['id'].'/'.$dari.'/'.$sampai;?>" 
                       class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data tersebut..?')">
                        <i class="fa fa-trash-o"></i> Hapus</a>
                </td>
            </tr>
        <?php   }
        } ?>
        </tbody>
    </table>
</div>
            