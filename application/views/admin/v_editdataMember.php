        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

			 <form method="post" action="<?php echo site_url('admin/proseseditdataMember')?>" enctype="multipart/form-data">

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
				         <input class="form-control" type="text" name="name" required value="<?php echo $key->name; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">Email</label>
				      <div class="controls">
				         <input class="form-control" type="email" name="email" required value="<?php echo $key->email; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				     <label class="control-label">Nama Organisasi</label>
				      <div class="controls">
				          <select class="form-control" name="nm_organisasi" required>
				              <option value=""><?php echo $key->nm_organisasi; ?></option>
				              <option value="Politeknik Pos Indonesia">Politeknik Pos Indonesia</option>
				              <option value="Universitas Negeri Jakarta">Universitas Negeri Jakarta</option>
				              <option value="Universitas Indonesia">Universitas Indonesia</option>
				              <option value="Politeknik Negeri Jakarta">Politeknik Negeri Jakarta</option>
				              <option value="Institut Pertanian Bogor">Institut Pertanian Bogor</option>
				          </select>
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				     <label class="control-label">No Telepon</label>
				      <div class="controls">
				        <input class="form-control" type="tel" name="no_telp" value="<?php echo $key->no_telp; ?>" required id="no_telp">
				      </div>
				    </div>
					<br />
					<div class="control-group">
				     <label class="control-label">Password</label>
				      <div class="controls">
				        <input class="form-control" type="password" name="password" required minlength="4" value="<?php echo $key->password; ?>">
				      </div>
				    </div>

				</div>

				<div class="col">

					<input type="hidden">
				    <div class="control-group">
				      <label class="control-label">Role ID</label>
				      <div class="controls">
				         <input id="role_id" name="role_id" class="form-control" type="text" readonly="" value="<?php echo $key->role_id; ?>">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">User Aktif</label>
				      <div class="controls">
				          <select class="form-control" name="user_aktif" required>
				              <option value="<?php echo $key->user_aktif; ?>"><?php echo $key->user_aktif; ?></option>
				              <option value="1">Aktif</option>
				              <option value="0">Tidak Aktif</option>
				          </select>
				      </div>
				    </div>
				    <br />

				    <?php } ?>
				    
				    <a class="btn btn-md btn-danger" href="<?php echo site_url('admin/dataMember');?>">Kembali</a>
				      <button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			
			</div>
		   </form>

        </div>
        <!-- ./container-fluid -->
        
      </div>
      <!-- End of Main Content -->

 
