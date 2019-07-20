        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

			 <form method="post" action="<?php echo site_url('admin/proseseditdataMentor')?>" enctype="multipart/form-data">

  		   <?php foreach ($edit_info as $key) { ?>

  			<div class="row justify-content-center">
				<div class="col">
			        <div class="control-group">
			         <label class="control-label">ID</label>
			          <div class="controls">
			            <input class="form-control" type="text" name="id" readonly="" value="<?php echo $key->id; ?>">
			          </div>
			        </div>
			        <br />
					<div class="control-group">
				      <label class="control-label">Nama Lengkap</label>
				      <div class="controls">
				         <input class="form-control" type="text" name="nm_lengkap" required id="nm_lengkap" value="<?php echo $key->nm_lengkap; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">Email</label>
				      <div class="controls">
				         <input class="form-control" type="email" name="email" required id="email" value="<?php echo $key->email; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">Unit Kerja</label>
					    <div class="controls">
					          <select class="form-control" name="unit_kerja" required>
					              <option><?php echo $key->unit_kerja; ?></option>
					              <option value="Kantor Pusat">Kantor Pusat</option>
					              <option value="Cabang JTC">Cabang JTC</option>
					              <option value="Cabang Jagorawi">Cabang Jagorawi</option>
					              <option value="Cabang Purbaleunyi">Cabang Purbaleunyi</option>
					              <option value="Cabang Belmera">Cabang Belmera</option>
					              <option value="Cabang Semarang">Cabang Semarang</option>
					          </select>
					      </div>
				    </div>
				    <br />
				   	<div class="control-group">
				      <label class="control-label">Departemen</label>
				      <div class="controls">
				         <input class="form-control" type="text" name="departemen" required id="departemen" value="<?php echo $key->departemen; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				     <label class="control-label">No Telepon</label>
				      <div class="controls">
				        <input class="form-control" type="tel" name="no_telp" value="<?php echo $key->no_telp; ?>"required id="no_telp">
				      </div>
				    </div>

				</div>

				<div class="col">
					<div class="control-group">
				     <label class="control-label">Password</label>
				      <div class="controls">
				        <input class="form-control" type="password" name="password" required minlength="4" id="password" value="<?php echo $key->password; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">Role ID</label>
				      <div class="controls">
				          <select class="form-control" name="role_id" required id="role_id">
				              <option><?php echo $key->role_id; ?></option>
				              <option value="Admin">Admin</option>
				              <option value="Mentor">Mentor</option>
				          </select>
				      </div>
				    </div>
					<br />
				    <div class="control-group">
				      <label class="control-label">User Aktif</label>
				      <div class="controls">
				          <select class="form-control" name="user_aktif" required id="user_aktif">
				              <option><?php echo $key->user_aktif; ?></option>
				              <option value="1">Aktif</option>
				              <option value="0">Tidak Aktif</option>
				          </select>
				      </div>
				    </div>
				    <br />

				    <?php } ?>
				    
				    <a class="btn btn-md btn-danger" href="<?php echo site_url('admin/dataMentor');?>">Kembali</a>
				      <button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			
			</div>
		   </form>

        </div>
        <!-- ./container-fluid -->
        
      </div>
      <!-- End of Main Content -->

 
