        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

            <div class="col-md-6 col-sm-6">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tambah Data
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?php echo site_url('monitoring/koordinatjalan') ?>">Kotdinat Jalan</a>
                        <a class="dropdown-item" href="<?php echo site_url('monitoring/jembatan') ?>">Data Iklan</a>
                        <a class="dropdown-item" href="<?php echo site_url('monitoring/koordinatjembatan') ?>">Kotdinat Iklan</a>
                    </div>
                </div>
                <br>
                <form method="post" action="<?php echo site_url('monitoring/createjembatan')?>">
                    <div class="form-group">
					<label for="namajembatan">Nama jembatan</label>
					<input type="text" name="namajembatan" class="form-control">
				</div>
				<div class="form-group">
					<label for="keterangan">Keterangan</label>
					<textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="submit" value="simpan" class="btn btn-primary">
				</div>
                </form>
            </div>
            <div class="col-md-12 col-sm-12">
                <?php if ($itemjembatan->num_rows()!=null) {
                    $no = 1;
                    echo "<table class='table'>";
                    echo "<th>No</th>";
                    echo "<th>Nama jembatan</th>";
                    echo "<th>Keterangan</th>";
                    foreach ($itemjembatan->result() as $jembatan) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$jembatan->namajembatan."</td>";
                        echo "<td>".$jembatan->keterangan."</td>";
                        echo "<td><a href='".site_url('monitoring/editjembatan')."/".$jembatan->id_jembatan."'>edit</a>";
                        echo " <a href='".site_url('monitoring/deletejembatan')."/".$jembatan->id_jembatan."'>delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } ?>
            </div>

        </div>
     	<!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
