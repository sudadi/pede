<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
	<div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="<?php echo base_url('assets/images/bioskecil1.png');?>"></a>
	</div>

	<div class="clearfix"></div>

	<!-- menu profile quick info 
	<div class="profile clearfix">
	  <div class="profile_pic">
		<img src="images/user.png" alt="..." class="img-circle profile_img">
	  </div>
	  <div class="profile_info">
		<span>Welcome,</span>
		<h2><?php //echo $_SESSION['nama']; ?></h2>
	  </div>
	</div>
	 /menu profile quick info 

	<br />

	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	  <div class="menu_section">
		<ul class="nav side-menu">
		  <li><a href="<?=base_url();?>"><i class="fa fa-home"></i> Home </a> </li>
                  <?php if ($this->session->userdata('usrmsk')==TRUE){ 
                    if ($this->session->userdata('idunit') == '1' || in_array('1', $akses)){ ?>
                      <li><a href="<?=base_url('laykes');?>"><i class="fa fa-medkit"></i> Layanan Kesehatan</a></li>
                  <?php } 
                  if ($this->session->userdata('idunit') == '1' || in_array('2', $akses)){ ?>
                    <li><a href="<?=base_url('laylain');?>"><i class="fa fa-wheelchair"></i> Layanan Lainnya</a></li>
                  <?php } 
                  if ($this->session->userdata('idunit') == '1' || in_array('3', $akses)){ ?>  
                  <li><a href="<?=base_url('penerimaan');?>"><i class="fa fa-money"></i> Penerimaan BLU</a></li>
                  <?php } 
                  if ($this->session->userdata('idunit') == '1' || in_array('4', $akses)){ ?>
                  <li><a href="<?=base_url('pengeluaran');?>"><i class="fa fa-shopping-cart"></i> Pengeluaran BLU</a></li>
                  <?php } 
                  if ($this->session->userdata('idunit') == '1' || in_array('5', $akses)){ ?>
                  <li><a href="<?=base_url('saldo');?>"><i class="fa fa-suitcase"></i> Saldo BLU</a></li>
                  <?php } 
                  $arrakses=array('6','7','8','9','10','11','12');
                  $submenu=false;
                  foreach ($arrakses as $row){
                      if (in_array($row, $akses)) $submenu = true; 
                  }
                  if ($this->session->userdata('idunit') == '1' || $submenu == true){ ?>
                  <li><a href="<?=base_url('cekstatus');?>"><i class="fa fa-check-square"></i> Cek Status Update</a>
		  <li><a><i class="fa fa-cogs"></i> Setting <span class="fa fa-chevron-down"></span></a>
			  <ul class="nav child_menu">
                                <?php  
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
			  	<li><a href="<?=base_url('refkelas');?>">Ref. Kelas </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
			  	<li><a href="<?=base_url('refindi');?>">Ref. Indikator </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
			  	<li><a href="<?=base_url('refterima');?>">Ref. Akun Penerimaan </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
			  	<li><a href="<?=base_url('refkeluar');?>">Ref. Akun Pegeluaran </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
                                <li><a href="<?=base_url('refrek');?>">Ref. Jenis Rekening </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
                                <li><a href="<?=base_url('refunit');?>">Ref. Unit/Satker </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
                                <li><a href="<?=base_url('refunit');?>">Ref. Unit/Satker </a></li>
                                <?php } 
                                if ($this->session->userdata('idunit') == '1' || in_array('6', $akses)){ ?>
                                <li><a href="<?=base_url('refuser');?>">Data User </a></li>
                                <?php } ?>
			  </ul>
		  </li>
                  <?php } }?>
		</ul>
	  </div>

	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<div class="sidebar-footer hidden-small">
	  <a data-toggle="tooltip" data-placement="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="Lock">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?=base_url('main/logout');?>">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	  </a>
	</div>
	<!-- /menu footer buttons -->
  </div>
</div>
