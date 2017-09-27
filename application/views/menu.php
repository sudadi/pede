<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <li><a href="<?=base_url();?>"><i class="fa fa-home"></i> Home </a> </li>
    <li><a href="<?=base_url('kuantitas');?>"><i class="fa fa-file-text"></i> Kuantitas Pelayanan</a></li>
    <li><a><i class="fa fa-file-text"></i> Kualitas Pelayanan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?=base_url('dokrm');?>"><i class="fa fa-file-text"></i>Kelengkapan Dok.</a></li>
            <li><a href="<?=base_url('fornas');?>"><i class="fa fa-file-text"></i>Kepatuhan FORNAS</a></li>
        </ul>
    </li>
    <li><a href="<?=base_url('behavior');?>"><i class="fa fa-file-text"></i> Perilaku</a></li>
    <li><a href="<?=base_url('kalkulasi');?>"><i class="fa fa-file-text"></i> Kalkulasi</a></li>
    <li><a href="<?=base_url('report');?>"><i class="fa fa-file-text"></i> Laporan</a></li>
    <li><a><i class="fa fa-cogs"></i> Setting <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?=base_url('dokrm');?>"><i class="fa fa-user"></i>Kelola User</a></li>
            <li><a href="<?=base_url('fornas');?>"><i class="fa fa-users"></i>Ref. Data Pegawai</a></li>
            <li><a href="<?=base_url('dokrm');?>"><i class="fa fa-user"></i>Ref. Group Layanan</a></li>
            <li><a href="<?=base_url('dokrm');?>"><i class="fa fa-user"></i>Ref. Layanan</a></li>
            <li><a href="<?=base_url('dokrm');?>"><i class="fa fa-user"></i>Target per Pegawai</a></li>
        </ul>
    </li>