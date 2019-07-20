<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <br><?php echo $this->session->flashdata('pesan');?>

        <form method="post" action="<?php echo site_url('ahp/proseseditKriteria')?>" enctype="multipart/form-data">
            <?php foreach ($edit_kriteria as $key) { ?>
            <div class="row justify-content-center">
				<div class="col">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">ID Kriteria</label>
                        <div class="col-md-7">
                            <input type="text" name="kriteria_id" id="kriteria_id" class="form-control " autocomplete="off" readonly="" value="<?php echo $key->kriteria_id; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="">Nama Kriteria</label>
                        <div class="col-md-7">
                            <input type="text" name="nama_kriteria" id="nama_kriteria" class="form-control " autocomplete="off" placeholder="Nama Kriteria" required="" value="<?php echo $key->nama_kriteria; ?>"/>
                        </div>
                    </div>
                    <?php } ?>

                    <button type="submit" class="btn btn-primary btn-flat">Ubah</button>
                    <a href="<?php echo site_url('ahp/kriteria')?>" class="btn btn-default btn-flat">Batal</a>
                </div>
            </div>
        </form>
        
</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->

 
