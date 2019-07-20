        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <?php echo $this->session->flashdata('pesan');?>

          <div class="row"> 	
          	<div class="col-lg-6">
          		
          		<form action="<?= base_url('admin/prosesgantiPassword') ?>" method="post">
          			<div class="form-group">
					    <label for="password_lama">Password Lama</label>
					    <input type="password" class="form-control" id="password_lama" name="password_lama" required>
					 </div>
					 </br>

					 <div class="form-group">
					    <label for="password_baru1">Password Baru</label>
					    <input type="password" class="form-control" id="password_baru1" name="password_baru1" required minlength="4">
					 </div>
					 </br>

					 <div class="form-group">
					    <label for="password_baru2">Ulangi Password</label>
					    <input type="password" class="form-control" id="password_baru2" name="password_baru2" required minlength="4">
					 </div>
					 </br>

					 <div class="form-group">
		  				<a class="btn btn-md btn-danger" href="<?php echo site_url('admin/myProfile');?>">Kembali</a>
					 	<button type="submit" class="btn btn-primary">Ganti Password</button>	

					 </div>
          		</form>

     	    </div>
          </div>
        </div>
     	<!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
