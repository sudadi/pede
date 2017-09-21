<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    echo form_open_multipart($action);
    echo '<div class="form-group">';
    echo '<label></label>'; // show error upload
    echo form_upload('userfile');
    echo '</div>';

    echo form_submit('mysubmit', 'Upload', 'class="btn btn-primary"');
    echo form_close();
?>

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
            
        </tbody>
    </table>
</div>
            