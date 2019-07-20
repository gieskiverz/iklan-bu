        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
            <div class="col-md-6 col-sm-6">
                <form action="<?php echo site_url('jalan/updatejalan') ?>" method="POST">
                    <?php 
                        if ($itemjalan->num_rows()!=null) {
                            foreach ($itemjalan->result() as $jalan) {
                                echo '<div class="form-group">';
                                echo '<label for="id_jalan">ID Jalan</label>';
                                echo '<input type="text" name="id_jalan" value="'.$jalan->id_jalan.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="namajalan">Nama Jalan</label>';
                                echo '<input type="text" name="namajalan" value="'.$jalan->namajalan.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="keterangan">Keterangan</label>';
                                echo '<textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control">'.$jalan->keterangan.'</textarea>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<input type="submit" value="update" class="btn btn-primary">';
                                echo '</div>';
                            }
                        }
                    ?>	
                </form>
            </div>

        </div>
     	<!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
