<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

/* 
 * The MIT License
 *
 * Copyright 2017 DotKom <sudadi.kom@yahoo.com>.
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
?>

<div class="clearfix"></div>
<div class="row">
    <div class="login_wrapper">
            <?php echo form_open('main/login', 'class="form-vertical" data-parsley-validate methode="POST"');?>
            <h1 class="text-center">Login Form</h1>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-user"> Pengguna</i>
                    </span>
                    <input name="userid" type="text" class="form-control" placeholder="User ID" required="" autofocus/>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-key"> Password</i>
                    </span>
                    <input name="password" type="password" class="form-control" placeholder="Password" required="" />
                </div>
              <div><button type="submit" class="btn btn-primary submit">Log in</button></div>
              <?php echo form_close();?>
              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                    <a href="#" class="site_title text-center"><img src="<?php echo base_url('assets/images/bioskecil1.png');?>"></a>
                    <p class="text-center">SIRS-RSO © 2017 All Rights Reserved.</p>
                </div>
              </div>
            <?php echo form_close(); ?>
        </div>
    </div> 
</div>

