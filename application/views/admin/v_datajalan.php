        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

            <div class="col-md-6 col-sm-6">
                <form method="post" action="<?php echo site_url('jalan/createjalan')?>">
                    <div class="form-group">
                        <label for="namajalan">Nama Ruas</label>
                        <input type="text" name="namajalan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan Ruas</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" placeholder=""></textarea>
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
                            <th style="background:#5d5a56;color:#fff">Nama Ruas</th>
                            <th style="background:#5d5a56;color:#fff">Keterangan Ruas</th>
                            <th style="background:#5d5a56;color:#fff">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                    $no = 1;
                    foreach ($itemjalan->result() as $jalan) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$jalan->namajalan."</td>";
                        echo "<td>".$jalan->keterangan."</td>";
                        echo "<td align='center'><a href='".site_url('jalan/editjalan')."/".$jalan->id_jalan."'><button class='btn btn-primary'><i class='fas fa-edit'></i></button></a>";
                        echo " <a href='".site_url('jalan/deletejalan')."/".$jalan->id_jalan."'><button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
     	<!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
