        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

            <div class="col-md-12 col-sm-12">
               
                <br>
                <form method="post" action="<?php echo site_url('tipe_iklan/createtipe')?>">
                    <div class="form-group">
                        <label for="nama_tipe">Nama Materi Iklan</label>
                        <input type="text" name="nama_tipe" class="form-control">
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
                            <th style="background:#5d5a56;color:#fff">Materi Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                    $no = 1;
                    
                    foreach ($itemtipe->result() as $tipe) {
                        echo "<tr>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$tipe->nama_tipe."</td>";
                        echo "<td  align='center'><a></i><a href='".site_url('tipe_iklan/edittipe')."/".$tipe->id_tipe."'><button class='btn btn-primary'><i class='fas fa-edit'></i></button></a>  ";
                        echo " <a href='".site_url('tipe_iklan/deletetipe')."/".$tipe->id_tipe."'><button class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a></td>";
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

 
