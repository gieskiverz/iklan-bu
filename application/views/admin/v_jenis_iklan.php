        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

            <div class="col-md-6 col-sm-6">
               
                <br>
                <form method="post" action="<?php echo site_url('jenis_iklan/createjenis')?>">
                    <div class="form-group">
                        <label for="nama_jenis">Nama Jenis Iklan</label>
                        <input type="text" name="nama_jenis" class="form-control" placeholder="Jenis Iklan">
                    </div>
                    <div class="form-group">
                        <label for="datatipe">Materi Tipe</label>
                        <?php if ($itemtipe->num_rows()!=null) {
                            echo '<select name="id_tipe" id="id_tipe" class="form-control">';
                            echo "<option value=''>Pilih Tipe Iklan</option>";
                            foreach ($itemtipe->result() as $tipe) {
                                echo "<option value='".$tipe->id_tipe."'>".$tipe->nama_tipe."</option>";
                            }
                            echo '</select>';
                        }else{
                            echo anchor('admin/tipe_iklan', '<span class="glyphicon glyphicon-plus"></span> Tambah Data iklan', 'class="btn btn-info form-control"');
                        } ?>
                    </div>
                     <div class="form-group">
                        <label for="ukuran">Luas Iklan Minimal(m2)</label>
                        <input type="number" name="ukuran" class="form-control" placeholder="Panjang X Lebar">
                    </div>
                     <div class="form-group">
                        <label for="ukuran">Luas Iklan Maximal(m2)</label>
                        <input type="number" name="ukuran_max" class="form-control" placeholder="Panjang X Lebar">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga (Rp/m2)</label>
                        <input type="number" name="harga" class="form-control" placeholder="Harga (Rp/m2)">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <thead>
                        <tr>
                            <th style="background:#5d5a56;color:#fff">No</th>
                            <th style="background:#5d5a56;color:#fff">Jenis Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Luas Iklan Minimal(m2)</th>
                            <th style="background:#5d5a56;color:#fff">Luas Iklan Maximal(m2)</th>
                            <th style="background:#5d5a56;color:#fff">Harga (Rp/m2)</th>
                            <th width="28%" style="background:#5d5a56;color:#fff">Range Harga</th>
                            <th style="background:#5d5a56;color:#fff">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    $no = 1;
                    foreach ($itemjenis->result() as $jenis) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$jenis->nama_jenis."</td>";
                        echo "<td>".$jenis->ukuran."</td>";
                        echo "<td>".$jenis->ukuran_max."</td>";
                        $harga=number_format($jenis->harga,2,",",".");
                        echo "<td align='right'>".$harga."</td>";
                        echo "<td align='right'>".number_format($jenis->ukuran*$jenis->harga,2,",",".")." - ".number_format($jenis->ukuran_max*$jenis->harga,2,",",".")."</td>";
                        echo "<td align='center'><a href='".site_url('jenis_iklan/editjenis')."/".$jenis->id_jenis."'><button class='btn btn-primary'><i class='fas fa-edit'></i></button></a>  ";
                        echo " <a href='".site_url('jenis_iklan/deletejenis')."/".$jenis->id_jenis."'><button class='btn btn-danger'><i class='fas fa-trash-alt'></button></a></td>";
                        echo "</tr>";
                    }
                    echo "";
                 ?>
            </tbody>
                </table>

            </div>
                </div>
        </div>
        <!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
