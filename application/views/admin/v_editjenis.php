        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
            <div class="col-md-6 col-sm-6">
                <form action="<?php echo site_url('jenis_iklan/updatejenis') ?>" method="POST">
                    <?php 
                        if ($itemjenis->num_rows()!=null) {
                            foreach ($itemjenis->result() as $jenis) {
                                echo '<div class="form-group">';
                                echo '<label for="id_tipe">ID Jenis Iklan</label>';
                                echo '<input type="text" name="id_jenis" value="'.$jenis->id_jenis.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="namatipe">Nama Jenis Iklan</label>';
                                echo '<input type="text" name="nama_jenis" value="'.$jenis->nama_jenis.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="ukuran">Ukuran Min</label>';
                                echo '<input type="text" name="ukuran" value="'.$jenis->ukuran.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="ukuran_max">Ukuran Max</label>';
                                echo '<input type="text" name="ukuran_max" value="'.$jenis->ukuran_max.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="harga">Harga</label>';
                                echo '<input type="number" name="harga" value="'.$jenis->harga.'" class="form-control">';
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

 
