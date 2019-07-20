      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

			 	 <!-- Isi Konten -->
	       <div class="panel-body"> 
	         <?php echo $this->session->flashdata('pesan');?>

	         <div class="col-md-6">
							<a class="btn btn-md btn-success" href="<?php echo base_url('admin/tambahMentor');?>">Tambah Admin</a>
							<button type="button" id="tombol" onclick="swal('Hallo World', 'Latihan', 'success')">Klik Saya</button>
	          </div>			
							
						<!-- DataTales Example --><br/>
						<div class="card shadow mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary fas fa-user-tie"> Admin</h6>
							</div>
							<div class="card-body">
								<div class="table-responsive">
								 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th style="background:#5d5a56;color:#fff">No</th>
													<th style="background:#5d5a56;color:#fff">Image</th>
													<th style="background:#5d5a56;color:#fff">Nama</th>
													<th style="background:#5d5a56;color:#fff">Email</th>
													<th style="background:#5d5a56;color:#fff">Unit Kerja</th>
													<th style="background:#5d5a56;color:#fff">Departemen</th>
													<th style="background:#5d5a56;color:#fff">No Telepon</th> 
													<th style="background:#5d5a56;color:#fff">Role User</th>
													<th style="background:#5d5a56;color:#fff">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
														$no = 1;                        
														foreach($info_admin as $row){
												?>
												<tr class="">
													<td style="font-size: 15px;"><?php echo $no++; ?></td>
													<td>
													<img src="<?= base_url('assets/img/profile/') . $row->image; ?>" width="70px">
													</td>
													<td style="font-size: 15px;"><?php echo $row->nm_lengkap; ?></td>
													<td style="font-size: 15px;"><?php echo $row->email; ?></td>
													<td style="font-size: 15px;"><?php echo $row->unit_kerja; ?></td>
													<td style="font-size: 15px;"><?php echo $row->departemen; ?></td>                      
													<td style="font-size: 15px;"><?php echo $row->no_telp; ?></td>
													<td style="font-size: 15px;"><?php echo $row->role_id; ?></td>

													<td style="width:120px" align="center">
															<a href="<?php echo site_url('admin/editdataMentor/'.$row->id);?>"><button class='btn btn-primary'><i class='far fa-edit'></i></button></a>
															<a href="<?php echo site_url('admin/hapusinfoMentor/'.$row->id);?>"><button class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
															</a>
													</td>								
												</tr>
												<?php 
												}
												?>
											</tbody>
									</table>
								</div>
							</div>
          	</div>

          </div>
          <!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 

