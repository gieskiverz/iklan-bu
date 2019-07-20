<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <br><?php echo $this->session->flashdata('pesan');?>

        <form method="post" action="<?php echo site_url('ahp/proseseditTujuan')?>" enctype="multipart/form-data">

  		   <?php foreach ($edit_tujuan as $key) { ?>
            <div class="row justify-content-center">
				<div class="col">
                    <div class="control-group">
                        <label class="control-label">ID</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="id_tujuan" readonly="" value="<?php echo $key->id_tujuan; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <label class="control-label">Judul</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="judul" required value="<?php echo $key->judul; ?>">
                        </div>
                    </div>
                    <br>
                    <div class="control-group">
                        <label class="control-label">Keterangan</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="keterangan" value="<?php echo $key->keterangan; ?>" required id="keterangan">
                        </div>
                    </div>
                    <br>
                    <?php } ?>
                
                    <a class="btn btn-md btn-danger" href="<?php echo site_url('ahp');?>">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
            
        </form>
    
</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->

 
