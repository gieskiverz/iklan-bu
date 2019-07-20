        <div class="page-head" style="background-image: url(<?= base_url('assets/'); ?>vendorHome/img/JM/tol3.jpg)"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">New account / Sign in </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
 
        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

                <div class="col-md-12" style="border">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <h2>Login User : </h2> <br>
                            <?= $this->session->flashdata('pesan'); ?>

                            <form method="post"  action="<?php echo base_url('login/masukUser'); ?>">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="Email" value="<?php set_value('email') ?>"/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required placeholder="Password"/>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default"> Log in</button>
                                    <br>
                                    <a data-toggle="modal" data-target="#admin" href="#">Login Admin ?</a>
                                </div>
                            </form>
             
                        </div>
                        
                    </div>
                </div>
                
                <div id="admin" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="col-md-12">
                        <div class="box-for overflow">                         
                            <div class="col-md-12 col-xs-12 login-blocks">
                                <h2>Login Admin : </h2> <br>
                                <?= $this->session->flashdata('pesan3'); ?>

                                <form method="post"  action="<?php echo base_url('login/masukAdmin'); ?>">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required placeholder="Email" value="<?php set_value('email') ?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required placeholder="Password"/>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-default"> Log in</button>
                                    </div>
                                </form>               
                            </div>                          
                        </div>
                    </div>
                  </div>
                </div>

                <br><br>

                <div class="col-md-12">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2>New account : </h2><br>
                            <?= $this->session->flashdata('pesan2'); ?>
                             
                            <form method="post" action="<?php echo base_url('login/registrasi'); ?>" enctype="">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" required placeholder="Nama Lengkap" value="<?php set_value('name'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required placeholder="your@example.com" value="<?php set_value('email'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Organisasi/Perusahaan</label>
                                    <input type="text" class="form-control" id="nm_organisasi" name="nm_organisasi" required placeholder="Nama Organisasi" value="<?php set_value('nm_organisasi'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat" value="<?php set_value('alamat'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="name">No Telepon</label>
                                    <input type="tel" class="form-control" id="no_telp" name="no_telp" required placeholder="" value="<?php set_value('no_telp'); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password1" name="password1" required minlength="4" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="password">Ulangi Password</label>
                                    <input type="password" class="form-control" id="password2" name="password2" required minlength="4" placeholder="Ulangi Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- end-register-area -->