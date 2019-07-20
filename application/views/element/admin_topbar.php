    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
        
          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo date('l, d-m-Y');
          ?>
          <div class="topbar-divider d-none d-sm-block"></div>
          <?php
          date_default_timezone_set("Asia/Jakarta");
          echo date("H:i A");
          ?>
          <div class="topbar-divider d-none d-sm-block"></div>
          
            <!-- <div>
             
              <marquee direction="down" scrollamount="2" align="center" height="50" width=""><h1><b>Hy, Wellcome to <?= $title; ?></h1></b></marquee>
             
            </div> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">*</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">       
                  <div>
                    <div class="small text-gray-500"></div>
                    <span class="font-weight-bold"></span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Notification</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">*</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Inbox
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="font-weight-bold">
                    <div class="text-truncate"></div>
                    <div class="small text-gray-500"></div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Inbox</a>
              </div>
            </li>
            
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Topbar Search -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter"></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $admin['nm_lengkap']; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $admin['image']; ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item <?php if(isset($active_myProfile)){echo $active_myProfile ;}?>" href="<?php echo base_url('admin/myProfile');?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  My Profile
                </a>
                <a class="dropdown-item" href="<?php echo base_url('admin/gantiPassword');?>">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url('login/keluar'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End Of Topbar -->