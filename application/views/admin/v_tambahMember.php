        <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
  		  <div class="panel panel-success">
  		   <form method="post" action="<?php echo site_url('admin/prosestambahMember')?>" enctype="multipart/form-data">
  			<div class="row justify-content-center">

				<div class="col">

					<div class="control-group">
				      <label class="control-label">Nama Lengkap</label>
				      <div class="controls">
				         <input class="form-control" type="text" name="name" required>
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">Email</label>
				      <div class="controls">
				         <input class="form-control" type="email" name="email" required>
				      </div>
				    </div>
				    <br />
				    <input type="hidden">
				    <div class="control-group">
				      <label class="control-label">Foto</label>
				      <div class="controls">
				         <input id="image" name="image" class="form-control" type="text" value="default.jpg" readonly="">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				     <label class="control-label">Nama Kampus</label>
				      <div class="controls">
				          <select class="form-control" name="nm_kampus" required>
				              <option value="">Pilih Nama Kampus</option>
				              <option>Politeknik Pos Indonesia</option>
				              <option>Universitas Negeri Jakarta</option>
				              <option>Universitas Indonesia</option>
				              <option>Politeknik Negeri Jakarta</option>
				              <option>Institut Pertanian Bogor</option>
				          </select>
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				     <label class="control-label">No Telepon</label>
				      <div class="controls">
				        <input class="form-control" type="tel" pattern="\(\d\d\d\d\)-\d\d\d\d\d\d\d\d" name="no_telp" value="" required>
				      </div>
				    </div>
					<br />
					<div class="control-group">
				     <label class="control-label">Password</label>
				      <div class="controls">
				        <input class="form-control" type="password" name="password" required minlength="4">
				      </div>
				    </div>
					
				</div>

				<div class="col">

				    <input id="role_id" type="hidden" name="role_id" value="3">
				    <div class="control-group">
				      <label class="control-label">Role ID</label>
				      <div class="controls">
				         <input class="form-control" type="text" value="3" readonly="">
				      </div>
				    </div>
				    <br />
				    <div class="control-group">
				      <label class="control-label">User Aktif</label>
				      <div class="controls">
				          <select class="form-control" name="user_aktif" required>
				              <option value="">Pilih User Aktif</option>
				              <option value="1">Aktif</option>
				              <option value="0">Tidak Aktif</option>
				          </select>
				      </div>
				    </div>
				    <br />
			        <input id="tgl_buat" type="hidden" name="tgl_buat" data-date-format="dd-mm-yyyy" value="<?php echo isset($date) ? $date : date('d-m-Y')?>">
			        <div class="control-group">
			         <label class="control-label">Tanggal Daftar</label>
			          <div class="controls">
			            <input class="form-control" type="text" value="<?php date_default_timezone_set("Asia/Jakarta"); echo date(" d/M/Y ");?>" readonly="">
			          </div>
			        </div>
				    <br/>
				    <a class="btn btn-md btn-danger" href="<?php echo site_url('admin/dataMember');?>">Kembali</a>
				      <button type="submit" class="btn btn-primary">Simpan</button>
				
				</div>
			
			</div>
		   </form>
          </div>
        
    </div>
      <!-- End of Main Content -->

 
