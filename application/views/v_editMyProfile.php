        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <div class="row">
          	<div class="col-lg-8">

        		<form method="post" action="<?php echo site_url('admin/proseseditMyProfile')?>" enctype="multipart/form-data">
          			
							<div class="form-group row">
								<label for="email" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>" readonly="">
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" value="<?= $admin['nm_lengkap']; ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">Unit Kerja</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" value="<?= $admin['unit_kerja']; ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">Departemen</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" value="<?= $admin['departemen']; ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<label for="name" class="col-sm-2 col-form-label">No Telepon</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" name="name" value="<?= $admin['no_telp']; ?>" required>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-2">Photo</div>
								<div class="col-sm-10">
									<div class="row">
										<div class="col-sm-3">
											<img src="<?= base_url('assets/img/profile/') . $admin['image']; ?>" class="img-thumbnail">
										</div>
										<div class="col-sm-9">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="image" name="image">
												<label class="custom-file-label" for="image">Ganti Photo</label>
											</div>
										</div>
									</div>
								</div>
					
							</div>

							<div class="form-group row justify-content-end">
								<div class="col-sm-10">
								<a class="btn btn-md btn-danger" href="<?php echo site_url('admin/myProfile');?>">Kembali</a>
									<button type="submit" class="btn btn-primary">Edit</button>
								</div>
							</div>

          	 </form>         		
          	</div>
          </div>

        </div>
     		<!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
