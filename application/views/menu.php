<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<li><a href="<?=base_url();?>"><i class="fa fa-home"></i> Home </a> </li>
<?php
$main = $this->modref->getmenu(0);
foreach ($main as $row) {
    if ($row['link']) {
        echo '<li><a href="'.base_url().$row['link'].'"><i class="'.$row['icon'].'"></i> '.$row['menu'].'</a></li>';
    } else {
        echo '<li><a><i class="'.$row['icon'].'"></i> '.$row['menu'].'<span class="fa fa-chevron-down"></span></a>';
        echo '<ul class="nav child_menu">';
        $sub = $this->modref->getmenu($row['idmenu']);
        foreach ($sub as $value) {
            echo '<li><a href="'.base_url().$value['link'].'"><i class="'.$value['icon'].'"></i> '.$value['menu'].'</a></li>';
        }
        echo '</ul>';
        echo '</li>';
    }
}
?>

  