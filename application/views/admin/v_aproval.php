        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
            <div class="col-md-6 col-sm-6">
                <form action="<?php echo site_url('iklan/update') ?>" method="POST">
                    <?php 

                           foreach ($join3 as $row) {
                            $biaya=$row->harga*$row->lama_iklan*$row->luas;
                                echo '<input type="hidden" name="row_id" value="'.$row->row_id.'" class="form-control" readonly>';
                                echo '<div class="form-group">';
                                echo '<label for="id_tipe">Nama</label>';
                                echo '<input type="text" name="nama" value="'.$row->name.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="id_tipe">Materi Iklan</label>';
                                echo '<input type="text" name="nama_tipe" value="'.$row->nama_tipe.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="namatipe">Nama Jenis Iklan</label>';
                                echo '<input type="text" name="nama_jenis" value="'.$row->nama_jenis.'" class="form-control" readonly>';   
                                echo '<div class="form-group">';
                                echo '<label for="luas">Luas Iklan</label>';
                                echo '<input type="text" name="luas" value="'.$row->luas.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="harga">Harga</label>';
                                echo '<input type="number" name="harga" value="'.$row->harga.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<label for="lokasi">Lokasi</label>';
                                echo '<input type="text" name="lokasi" value="'.$row->lokasi.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="kordinat">Kordinat</label>';








                                echo '<input type="number" name="kordinat" value="'.$row->kordinat.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="tgl_pengajuan">Tanggal Pengajuan</label>';
                                echo '<input type="date" name="tgl_pengajuan" value="'.$row->tgl_pengajuan.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="lama_iklan">Lama Iklan</label>';
                                echo '<input type="text" name="lama_iklan" value="'.$row->lama_iklan.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="tgl_pengajuan">Biaya</label>';
                                echo '<input type="text" name="biaya" value="'.$biaya.'" class="form-control" readonly>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="aproval">Status</label>';
                                echo '<select name="status" class="form-control">
                                        <option value="'.$row->status.'">'.$row->status.'</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                      </select>';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="tgl_aktif">Tanggal Aktif</label>';
                                echo '<input type="date" name="tgl_aktif" value="'.$row->tgl_aktif.'" class="form-control">';
                                echo '</div>';
                                echo '<div class="form-group">';
                                echo '<label for="tgl_akhir">Tanggal Jatuh Tempo</label>';
                                echo '<input type="date" name="tgl_jatuh_tempo" value="'.$row->tgl_jatuh_tempo.'" class="form-control">';
                                echo '</div>';
                                echo '<br>';
                                echo '<div class="form-group">';
                                echo '<input type="submit" value="update" class="btn btn-primary">';
                                echo '</div>';
                            }
                    ?>	
                </form>
            </div>

        </div>
     	<!-- ./container-fluid -->


 
