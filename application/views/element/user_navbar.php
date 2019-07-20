    <nav class="navbar navbar-default ">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url('user');?>"><img src="<?= base_url('assets/'); ?>vendorHome/img/JM/bg123.jpg" width="230px"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class=" collapse navbar-collapse yamm" id="navigation">
                <div class="main-nav nav navbar-nav navbar-right"> 
                    <?php
                        if(isset($user['email'])){                  
                            if(isset($user['image'])){
                                echo"
                            Wellcome, $user[name] !
                            </a>
                                ";
                            }else{
                            }
                            echo"
                                <br><center><a href='login/keluar'>Logout <i class='fa fa-sign-out'></i></a>
                                ";
                        }else{
                        echo"  <a href='login' class='navbar-btn btn btn-primary'>Log In</a>
                        ";
                        }
                    ?>          
                </div>
 
                <ul class="main-nav nav navbar-nav navbar-right">
                    <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="active <?php if(isset($active_v_home)){echo $active_v_home ;}?>" href="<?php echo base_url('user');?>">Home</a>
                    </li>

                   <?php if($this->session->userdata('role_id') == 3) { ?>
                    <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="nav-link <?php if(isset($active_v_tampiliklan)){echo $active_v_tampiliklan ;}?>" href="<?php echo base_url('user/tampiliklan');?>">Iklan</a>
                    </li>
                    <?php } ?>
                    
                    <?php if($this->session->userdata('role_id') == 3) { ?>
                    <li class="wow fadeInDown" data-wow-delay="0.3s"><a class="nav-link <?php if(isset($active_v_pasangiklan)){echo $active_v_pasangiklan ;}?>" href="<?php echo base_url('user/pasangiklan');?>">Pasang</a>
                    </li>
                    <?php } ?>

                    <li class="dropdown ymm-sw" data-wow-delay="0.4s">
                        <a href="#" data-toggle="dropdown" data-hover="dropdown">About <b class="caret"></b></a>
                        <ul class="dropdown-menu navbar-nav">
                            <li>
                                <a href="#3">Iklan JTC</a>
                            </li>
                            <li>
                                <a href="#2">Cara Pasang</a>
                            </li>
                            <li>
                                <a href="#1">Peraturan</a>
                            </li>
                        </ul>
                    </li>
                    <?php if($this->session->userdata('role_id') == 3) { ?>
                    <li class="wow fadeInDown" data-wow-delay="0.3s">
                    <a class="nav-link <?php if(isset($active_v_editprofile)){echo $active_v_editprofile ;}?>" href="<?php echo site_url('user/editprofile').'/'.$user['id'];?>">Profile</a>
                    </li>
                    <?php } ?>
                    <li class="wow fadeInDown" data-wow-delay="0.5s"><a class="nav-link <?php if(isset($active_v_user)){echo $active_v_user ;}?>" href="<?php echo base_url('user/contact');?>">Contact</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- End of nav bar -->