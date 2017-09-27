<?php defined('BASEPATH') or exit('No dirrect script aceess allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


echo form_open($action, 'class="form-horizontal form-label-left" data-parsley-validate');
?>
<div class="form-group">
    <label class="control-label col-sm-2 col-xs-12" for="tahun">Tahun</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <?php 
        $selisih = date('Y') - 2017;
        $option[''] = '-Tahun-';
        for ($i = 0; $i <= $selisih; $i++){
            $thn = 2017 + $i;
            $option[$thn] = $thn;
        }
        echo form_dropdown('tahun', $option, '', 'class="form-control col-sm-12 col-xs-12" id="tahun" required');?>
    </div>
    <label class="control-label col-sm-2 col-sm-offset-2 col-xs-12" for="bulan">Bulan</label>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <?php 
        $option = '';
        $option[''] = '-Bulan-';
        for ($i = 0; $i <= 11; ++$i) {
             $time = strtotime(sprintf('+%d months', $i));
             $option[date('m', $time)] = date('F', $time);
        }
        echo form_dropdown('bulan', $option, NULL, 'class="form-control col-sm-12 col-xs-12" required');?>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2 col-xs-12" for="idpeg">Indikator</label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <?php 
            $option='';
            $option['']='--Pilih Dokter--';
            $dokter = $this->modpegawai->getdokter();
            foreach ($dokter as $key => $value) {
                $option[$value['idpeg']] = $value['nama'];
                
            }
            echo form_dropdown('idpwg', $option, '', 'class="js-select2 form-control col-sm-12" required');
        ?>
    </div>
    <label class="control-label col-sm-2 col-xs-12" for="nilai">Capaian </label>
    <div class="col-sm-3 col-xs-12">
        <?php $attribut = array('name'=>'nilai', 'type'=>'number', 'class'=>'form-control col-sm-12 col-xs-12', 'required'=>'required');
        echo form_input($attribut);?>
    </div>
</div>
<br>
<div class="form-group">
    <div class="col-md-12 col-sm-offset-4">
        <div class="col-sm-2">
        <?php echo form_button(array('type'=>'submit', 'class'=>'btn btn-success btn-block', 'content'=>'Simpan &nbsp;<i class="fa fa-save"></i>'));?>
        </div>
        <div class="col-sm-2">
            <a href="<?=base_url('dokrm');?>" class="btn btn-warning btn-block">Batal &nbsp;<i class="fa fa-undo"></i></a>
        </div>
    </div>
</div>
<br />
<hr />
<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title">#</th>
                <th class="column-title">Dokter</th>
                <th class="column-title">Bulan</th>
                <th class="column-title">Tahun</th>
                <th class="column-title">Capaian</th>
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
                <td><?=$row['nama'];?></td>
                <td><?=$row['bln'];?></td>
                <td><?=$row['thn'];?></td>
                <td><?=$row['capaian'];?></td>
                <td></td>
            </tr>
        <?php   }
        } ?>
        </tbody>
    </table>