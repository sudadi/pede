<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- top navigation -->
    <div class="top_nav">
      <div class="nav_menu">
        <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?=base_url('assets/images/user.png');?>" alt="">
                        <?php if ($this->session->userdata('usrmsk')==TRUE) {
                            echo $this->session->userdata('realname');
                        } else { echo "User Menu"; } ?>
                        <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <?php if ($this->session->userdata('usrmsk')== 'TRUE'){ ?>
                      <li><a href="<?=base_url('editpass') ;?>">Ubah Password</a></li>                    
                        <li><a href="javascript:;">Bantuan</a></li>
                        <li><a href="<?=base_url('main/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        <?php } else { ?>
                        <li><a href="<?=base_url('main/login');?>"><i class="fa fa-sign-in pull-right"></i> Log In</a></li>
                        <?php }?>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">0</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>Mr. X</span>
                          <span class="time">0 mins ago</span>
                        </span>
                        <span class="message">
                          Test
                        </span>
                      </a>
                    </li>
                    
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>

        </nav>
      </div>
    </div>
<!-- /top navigation -->
