        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
            <div class="col-md-6 col-sm-6">
                <form action="<?php echo site_url('tipe_iklan/updatetipe') ?>" method="POST">
                    <?php 
                        if ($itemtipe->num_rows()!=null) {
                            foreach ($itemtipe->result() as $tipe) {
                                echo '<div class="form-group">';
                                echo '<label for="id_tipe">ID Materi</label>';
                                echo '<input type="text" name="id_tipe" value="'.$tipe->id_tipe.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="namatipe">Materi Iklan</label>';
                                echo '<input type="text" name="nama_tipe" value="'.$tipe->nama_tipe.'" class="form-control">';
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

 
