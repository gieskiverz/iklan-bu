<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<br><?php echo $this->session->flashdata('pesan');?>
	<div class="panel panel-success">
        <form method="post" action="<?php echo site_url('ahp/prosestambahTujuan')?>" enctype="multipart/form-data">
        
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Judul</label>
                    <div class="col-md-9">
                        <input type="text" name="judul" id="" class="form-control " autocomplete="" placeholder="Judul Tujuan" required="" value="<?php echo set_value('judul'); ?>"/>
                    </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Keterangan</label>
                    <div class="col-md-9">
                        <textarea name="keterangan" class="form-control"><?=set_value('keterangan');?></textarea>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Tahun</label>
                    <div class="col-md-9">
                        <input type="number" maxlength=4 name="tahun" id="" class="form-control " autocomplete="" placeholder="Tahun Tujuan" required="" value="<?php echo set_value('tahun'); ?>"/>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="">Kuota</label>
                    <div class="col-md-9">
                        <input type="number" name="kuota" id="" class="form-control " autocomplete="" placeholder="Kuota" required="" value="<?php echo set_value('kuota'); ?>"/>
                    </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">&nbsp;</label>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </div>
        </form>
    </div>
	
	<p>&nbsp;</p>
	<table class="table table-border table-hover" id="datatable">
		<thead>
			<th>Judul</th>
			<th>Keterangan</th>
			<th>Tahun</th>
			<th>Kuota</th>
			<th></th>
		</thead>
		<tbody>
			<?php
			if(!empty($data))
			{
				foreach($data as $row)
				{
					$id=$row->id_tujuan;
				?>
				<tr>
					<td><?=$row->judul;?></td>				
					<td><?=$row->keterangan;?></td>
					<td><?=$row->tahun;?></td>
					<td><?=$row->kuota;?></td>
					<td>
						<a href="<?php echo site_url('ahp/kandidat/'.$row->id_tujuan);?>" class="btn btn-xs btn-success">Kandidat</a> 
						<a title="Edit Kriteria" href="<?php echo site_url('ahp/editTujuan/'.$row->id_tujuan);?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
						<a onclick="return confirm('Yakin ingin menghapus?');" href="<?php echo site_url('ahp/delete/'.$row->id_tujuan);?>" class="btn btn-xs btn-danger">Delete</a>
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