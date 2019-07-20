<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <br><?php echo $this->session->flashdata('pesan');?> 
    <div class="panel panel-success">
        <form method="post" action="<?php echo site_url('ahp/prosestambahKriteria')?>" enctype="multipart/form-data">  
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Nama Kriteria</label>
                <div class="col-md-7">
                    <input type="text" name="nama_kriteria" id="" class="form-control " autocomplete="off" placeholder="Nama Kriteria Utama" required="" value="<?php echo set_value('nama_kriteria'); ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                </div>
            </div>
        </form>
    </div>
    
    <table class="table table-border table-hover" id="datatable">
	<thead>
		<th>No</th>
		<th>Nama Kriteria</th>		
		<th></th>
	</thead>
	<tbody>
		<?php
		$no=0;
		if(!empty($data))
		{
			foreach($data as $row)
			{
				$no+=1;
				$id=$row->kriteria_id;
			?>
			<tr>
				<td width="10%"><?=$no;?></td>
				<td width="60%"><?=$row->nama_kriteria;?></td>
				<td>
					<a title="Parameter Kriteria" href="<?php echo base_url('kriteria/subkriteria/'.$row->kriteria_id);?>" class="btn btn-xs btn-success"><i class="fa fa-level-down"></i> Parameter</a>
					<a title="Edit Kriteria" href="<?php echo site_url('ahp/editKriteria/'.$row->kriteria_id);?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
					<a onclick="return confirm('Yakin ingin menghapus?');" href="<?php echo site_url('ahp/deleteKriteria/'.$row->kriteria_id);?>" class="btn btn-xs btn-danger">Delete</a>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>

</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->

 
