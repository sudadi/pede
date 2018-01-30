<?php

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
<fieldset>

<!-- Text input-->
<div class="form-group">
    <label class="col-md-2 control-label" for="nip">NIP</label>  
    <div class="col-md-3">
        <input id="nip" name="nip" type="text" placeholder="Masukkan NIP" class="form-control input-md" required="">
    </div>

    <label class="col-md-2 control-label" for="nmpeg">Nama Pegawai</label>  
    <div class="col-md-5">
        <input id="nmpeg" name="nmpeg" type="text" placeholder="Masukkan Nama Pegawai" class="form-control input-md" required="">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="jk">JK</label>
    <div class="col-md-3">
      <select id="jk" name="jk" class="form-control">
        <option value="">--Pilih--</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>

    <label class="col-md-2 control-label" for="alamat">Alamat</label>  
    <div class="col-md-5">
        <input id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" class="form-control input-md" required="">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="tmplahir">Tempat Lahir</label>  
    <div class="col-md-3">
        <input id="tmplahir" name="tmplahir" type="text" placeholder="Tempat Lahir" class="form-control input-md" required="">
    </div>

    <label class="col-md-2 control-label" for="tgllahir">Tanggal Lahir</label>  
    <div class="col-md-2">
        <input id="tgllahir" name="tgllahir" type="date" placeholder="Tgl Lahir" class="form-control input-md" required="">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="jab">Jabatan</label>
    <div class="col-md-3">
        <?php 
        $option='';
        $option['']='--Jabatan--';
        $jabatan = $this->modref->getjabatan();
        foreach ($jabatan as $key => $value) {
            $option[$value['idjabatan']] = $value['jabatan'];

        }
        echo form_dropdown('jab', $option, '', 'class="js-select2 form-control col-sm-12" required');
        ?>
    </div>

    <label class="col-md-2 control-label" for="satker">Satker</label>
    <div class="col-md-3">
        <?php 
        $option='';
        $option['']='--Satker--';
        $satker = $this->modref->getsatker();
        foreach ($satker as $key => $value) {
            $option[$value['idsat']] = $value['nmsatker'];

        }
        echo form_dropdown('satker', $option, '', 'class="js-select2 form-control col-sm-12" required');
        ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label" for="dokter">Dokter</label>
    <div class="col-md-2">
        <select id="dokter" name="dokter" class="form-control">
            <option value="0">Tidak</option>
            <option value="1">Ya</option>
        </select>
    </div>
</div>

<!-- Button -->
<div class="form-group">
    <label class="col-md-5 control-label" for="save"></label>
    <div class="col-md-1">
        <button id="save" name="save" class="btn btn-success">Simpan</button>
    </div>  
    <div class="col-md-2">
        <button id="batal" name="batal" class="btn btn-warning">Batal</button>
    </div>
</div>

</fieldset>
</form>
<br/><hr />
<div class="table-responsive">
    <table id="dtables" class="table table-striped table-bordered jambo_table bulk_action">
        <thead>
            <tr class="headings">
                <th class="column-title text-center">#</th>
                <th class="column-title text-center">NIP</th>
                <th class="column-title text-center">Nama</th>
                <th class="column-title text-center">JK</th>
                <th class="column-title text-center">Alamat</th>
                <th class="column-title text-center">Tempat Lahir</th>
                <th class="column-title text-center">Tgl Lahir</th>
                <th class="column-title text-center">Satker</th>
                <th class="column-title text-center">Jabatan</th>
                <th class="column-title text-center">Opsi</th>
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
                <td><?=$row['nip'];?></td>
                <td><?=$row['nama'];?></td>
                <td><?=$row['jk'];?></td>
                <td><?=$row['alamat'];?></td>
                <td><?=$row['tempatlhr'];?></td>
                <td><?=$row['tgllhr'];?></td>
                <td><?=$row['nmsatker'];?></td>
                <td><?=$row['jabatan'];?></td>
                <td class="text-center">
                    <a href="<?=base_url().'refpegawai/hapus/'.$row['idpeg'];?>" 
                       class="btn btn-xs btn-danger" onclick="return confirm('Yakin hapus data tersebut..?')">
                        <i class="fa fa-trash-o"></i> Hapus</a>
                </td>
            </tr>
        <?php   }
        } ?>
        </tbody>
    </table>
</div>