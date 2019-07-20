        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

			<?php echo $this->session->flashdata('pesan');?>

        <div class="card mb-3 col-lg-8">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" class="card-img">
						</div>
						<div class="col-md-8">
							<div class="card-body">
								<h5 class="card-title"><?= $admin['nm_lengkap']; ?></h5>
								<p class="card-text">Unit Kerja : <?= $admin['unit_kerja']; ?></p>
								<p class="card-text">Departemen : <?= $admin['departemen']; ?></p>
								<p class="card-text">No Telpon  : <?= $admin['no_telp']; ?></p>
								<p class="card-text">Email      : <?= $admin['email']; ?></p>
								<br>
								<p class="card-text"><small class="text-muted">Admin Sejak <?= $admin['tgl_buat']; ?></small></p>
							</div>
						</div>
					</div>
				</div>
		  <div class="col-md-4">
		  	
			  <a class="btn btn-outline-secondary" href="<?php echo site_url('admin/editMyProfile');?>">Edit Profile</a>
			  <a class="btn btn-outline-secondary" href="<?php echo site_url('admin/gantiPassword');?>">Ganti Password</a>
		  	
		  </div>
        </div>
        <!-- ./container-fluid -->
        
      </div>
      <!-- End of Main Content -->

 
