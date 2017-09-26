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
        $option = array (''=>'-Tahun-', '2017'=>'2017', '2018'=>'2018', '2019'=>'2019', '2020'=>'2020');
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
    <label class="control-label col-sm-2 col-xs-12" for="indi">Indikator</label>
    <div class="col-md-5 col-sm-5 col-xs-12">
        <?php 
            /*$option='';
            $option['']='--Pilih Indikator--';
            $refindi = $this->mref->getrefindi();
            foreach ($refindi as $key => $value) {
                if ($this->session->userdata('idunit') != '1') {
                    if ($this->session->userdata('idunit') == $value['idunit']){
                        $option[$value['indikator']] = $value['uraian'];
                    }
                } else {
                    $option[$value['indikator']] = $value['uraian'];
                }
            }
            echo form_dropdown('indi', $option, '', 'class="js-select2 form-control col-sm-12" required');
        */?>
    </div>
<br />
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
        $i = 0;
        $result=null;
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