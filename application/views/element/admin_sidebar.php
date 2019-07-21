    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center <?php if(isset($active_admin)){echo $active_admin ;}?>" href="<?php echo base_url('admin/index');?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fab fa-gitkraken"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $title; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link <?php if(isset($active_admin)){echo $active_admin ;}?>" href="<?php echo base_url('admin/index');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Administrator
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php if ( $_SESSION["role_id"] == 'Admin') { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-address-card"></i>
          <span>Data Admin</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if(isset($active_dataAdmin)){echo $active_dataAdmin ;}?>" href="<?php echo base_url('admin/dataMentor');?>">Data Admin</a>
            <a class="collapse-item <?php if(isset($active_tambahAdmin)){echo $active_tambahAdmin ;}?>" href="<?php echo base_url('admin/tambahMentor');?>">Tambah Admin</a>
          </div>
        </div>
      </li>
      <?php } ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-users"></i>
          <span>Data User</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if(isset($active_dataUser)){echo $active_dataUser ;}?>" href="<?php echo base_url('admin/dataMember');?>">Data User</a>
            <a class="collapse-item <?php if(isset($active_tambahUser)){echo $active_tambahUser ;}?>" href="<?php echo base_url('admin/tambahMember');?>">Tambah User</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <?php if ( $_SESSION["role_id"] == 'Admin') { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
          <i class="fas fa-users"></i>
          <span>Management</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item <?php if(isset($active_)){echo $active_ ;}?>" href="<?php echo base_url('admin');?>">Menu Management</a>
            <a class="collapse-item <?php if(isset($active_)){echo $active_ ;}?>" href="<?php echo base_url('admin');?>">User Management</a>
          </div>
        </div>
      </li>
      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Monitoring Iklan
      </div>

      <!-- Nav Item - Data -->
      <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities3">
          <i class="fas fa-book"></i>
          <span>Data Jalan</span></a>
          <div id="collapseUtilities3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('jalan');?>">Ruas</a>
            <a class="collapse-item" href="<?php echo base_url('jalan/#');?>">Kilometer</a>
            <a class="collapse-item" href="<?php echo base_url('monitoring/koordinatjalan');?>">Kordinat</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Iklan -->
      <li class="nav-item">
         <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities4" aria-expanded="true" aria-controls="collapseUtilities4">
          <i class="fas fa-money-bill-alt"></i>
          <span>Data Iklan</span></a>
          <div id="collapseUtilities4" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('tipe_iklan');?>">Tipe Iklan</a>
            <a class="collapse-item" href="<?php echo base_url('jenis_iklan');?>">Jenis Iklan</a>
            <a class="collapse-item" href="<?php echo base_url('iklan');?>">Iklan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        Analisis Perhitungan
      </div>

      <!-- Nav Item - Data -->
      <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities5" aria-expanded="true" aria-controls="collapseUtilities5">
          <i class="fas fa-book"></i>
          <span>Hirarki</span></a>
          <div id="collapseUtilities5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('ahp');?>">Semua Tujuan</a>
            <a class="collapse-item" href="<?php echo base_url('ahp/kriteria');?>">Kriteria Tujuan</a>
            <a class="collapse-item" href="<?php echo base_url('ahp/DaftarTujuan');?>">Daftar Tujuan</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities6" aria-expanded="true" aria-controls="collapseUtilities6">
          <i class="fas fa-book"></i>
          <span>Proses</span></a>
          <div id="collapseUtilities6" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('ahp');?>">Semua Tujuan</a>
            <a class="collapse-item" href="<?php echo base_url('ahp/kriteriaTujuan');?>">Kriteria Tujuan</a>
            <a class="collapse-item" href="<?php echo base_url('ahp/#');?>">Daftar Tujuan</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Produktivitas
      </div>

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('email'); ?>">
          <i class="fas fa-mail-bulk"></i>
          <span>Kirim Email</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-link"></i>
          <span>Halaman Lain</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="http://www.jasamarga.com" target="_blank">Jasa Marga</a>
            <a class="collapse-item" href="https://notadinas.jasamarga.co.id/" target="_blank">Nota Dinas</a>
            <a class="collapse-item" href="http://jmjtc.com">JM JTC</a>
            <a class="collapse-item" href="https://jmess.jasamarga.co.id:8001/public/login" target="_blank">JMESS</a>
            <a class="collapse-item" href="http://www.jasamargalive.com" target="_blank">CCTV Jalan Tol</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Keluar -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('login/keluar'); ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->