        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

        	<!-- Isi Konten -->

        	<div class="panel-body">
        		<?php echo $this->session->flashdata('pesan');?>

        		<div class="col-md-6">
        			<a class="btn btn-md btn-success" href="<?php echo base_url('admin/tambahMember');?>">Tambah User</a>
        		</div>
        		<!-- DataTales Example --><br/>
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary fas fa-users"> User</h6>
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
        					<th style="background:#5d5a56;color:#fff">Nama Organisasi</th>
        					<th style="background:#5d5a56;color:#fff">No Telepon</th>
        					<th style="background:#5d5a56;color:#fff">User Aktif</th>
        					<th style="background:#5d5a56;color:#fff">Tangal Daftar</th>
        					<th style="background:#5d5a56;color:#fff">Aksi</th>
        				</tr>
					</thead>
        			<tbody>
        				<?php
	                          $no = 1;                        
	                          foreach($info_member as $row){
	                      ?>
        				<tr>
        					<td style="font-size: 15px;"><?php echo $no++; ?></td>
        					<td>
        						<img src="<?= base_url('assets/img/profile/') . $row->image; ?>" width="80px">
        					</td>
        					<td style="font-size: 15px;"><?php echo $row->name; ?></td>
        					<td style="font-size: 15px;"><?php echo $row->email; ?></td>
        					<td style="font-size: 15px;"><?php echo $row->nm_organisasi; ?></td>
        					<td style="font-size: 15px;"><?php echo $row->no_telp; ?></td>
        					<td style="font-size: 15px;"><?php echo $row->user_aktif; ?></td>
        					<td style="font-size: 15px;"><?php echo $row->tgl_buat; ?></td>

        					<td style="width:120px" align="center">
        						<a href="<?php echo site_url('admin/editdataMember/'.$row->id);?>"><button class='btn btn-primary'><i class='far fa-edit'></i></button> </a>
        						<a href="<?php echo site_url('admin/hapusinfoMember/'.$row->id);?>" onclick="return confirm('Yakin ?');"><button class='btn btn-danger'><i class='far fa-trash-alt'></i></button>
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
