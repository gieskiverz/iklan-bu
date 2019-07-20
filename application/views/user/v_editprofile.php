        <div class="page-head" style="background-image: url(<?= base_url('assets/'); ?>vendorHome/img/JM/tol3.jpg)"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Change Profile </h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->
 
        <!-- register-area -->
        <div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

                <div class="col-md-12">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2>Change Profile : </h2><br>
                            <?= $this->session->flashdata('pesan2'); ?>
                             
                            <form method="post" action="<?php echo base_url('user/prosesedit'); ?>" enctype="">
                                <?php                              
                                foreach ($itemuser->result() as $user) { 
                                ?>
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->name;?>" required placeholder="Nama Lengkap" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email;?>" required placeholder="your@example.com" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Nama Organisasi/Perusahaan</label>
                                        <input type="text" class="form-control" id="nm_organisasi" name="nm_organisasi" value="<?php echo $user->nm_organisasi;?>" required placeholder="Nama Organisasi">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">No Telepon</label>
                                        <input type="tel" class="form-control" id="no_telp" name="no_telp" required placeholder="" value="<?php echo $user->no_telp;?>">
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
                                        <button type="submit" class="btn btn-default">Change</button>
                                    </div>

                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user->id;?>">
                                    <input type="hidden" class="form-control" id="role_id" name="role_id" value="<?php echo $user->role_id;?>">
                                    <input type="hidden" class="form-control" id="user_aktif" name="user_aktif" value="<?php echo $user->user_aktif;?>">
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>