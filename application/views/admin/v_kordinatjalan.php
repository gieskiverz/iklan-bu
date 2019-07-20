        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tambah Data
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?php echo site_url('monitoring/koordinatjalan') ?>">Kordinat Jalan</a>
                    <a class="dropdown-item" href="<?php echo site_url('monitoring/koordinatjembatan') ?>">Kordinat Iklan</a>
                    <a class="dropdown-item" href="<?php echo site_url('monitoring/jembatan') ?>">Data Iklan</a>
                </div>
            </div>
            <br>
            
        <!-- <div class="container"> -->
        
            <div class="row">    
                <div class="card col-md-8">
                    <div class="card-header">
                        <i class="fas fa-globe-asia"> Peta</i>
                    </div>
                    <div class="card-body">
                        <div class="panel-body" style="height:300px;" id="map-canvas">					
                        </div>
                    </div>
                </div>
                <div class="card col-md-4">
                    <div class="card-header">
                        <i class="fas fa-list-alt"> Daftar Kordinat</i>
                    </div>
                    <div class="card-body">
                        <div class="panel-body" style="min-height:300px;">
                            <table class="table">
                                <th>No</th>
                                <th>Lat</th>
                                <th>Long</th>
                                <th></th>
                                <tbody id="daftarkoordinat">
                                    <?php if($this->cart->contents()!=null){
                                        foreach ($this->cart->contents() as $koordinat) {
                                            if($koordinat['jenis']=='jalan'){
                                                echo '<tr><td>'.$koordinat["id"].'</td><td>'.$koordinat["latitude"].'</td><td>'.$koordinat["longitude"].'</td></tr>';
                                            }
                                        }
                                    } ?>
                                </tbody>
                            </table>
                            <form action="#">
                                <div class="form-group">
                                    <label for="datajalan">Data Jalan</label>
                                    <?php if ($itemdatajalan->num_rows()!=null) {
                                        echo '<select name="id_jalan" id="id_jalan" class="form-control">';
                                        foreach ($itemdatajalan->result() as $datajalan) {
                                            echo "<option value='".$datajalan->id_jalan."'>".$datajalan->namajalan."</option>";
                                        }
                                        echo '</select>';
                                    }else{
                                        echo anchor('admin/jalan', '<span class="glyphicon glyphicon-plus"></span> Tambah Data Jalan', 'class="btn btn-info form-control"');
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm" id="simpandaftarkoordinatjalan"><i class="fas fa-save"> Simpan</i></button> 
                                    <button class="btn btn-info btn-sm" id="clearmap"><i class="fas fa-globe-asia"> ClearMap</i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card col-md-12">
                    <div class="card-header">
                        <i class="fas fa-globe-asia"> Data Koordinat Jalan</i>
                    </div>
                    <div class="card-body">
                        <div class="panel-body" style="min-height:400px">
                            <table class="table">
                                <th>No</th>
                                <th>Data Jalan</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th></th>
                                <tbody id="daftarkoordinatjalan">
                                    <?php 
                                    if ($itemkoordinatjalan->num_rows()!=null) {
                                        $no = 1;
                                        foreach ($itemdatajalan->result() as $jalan) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $no++;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $jalan->namajalan;
                                            echo "</td>";
                                            echo "<td>";
                                            foreach ($itemkoordinatjalan->result() as $koordinat) {
                                                if ($koordinat->id_jalan==$jalan->id_jalan) {
                                                    echo $koordinat->latitude."</br>";
                                                }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            foreach ($itemkoordinatjalan->result() as $koordinat) {
                                                if ($koordinat->id_jalan==$jalan->id_jalan) {
                                                    echo $koordinat->longitude."</br>";
                                                }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            echo '<button class="btn-info btn btn-sm" id="viewpolylinejalan" data-iddatajalan="'.$jalan->id_jalan.'"><i class="fas fa-globe-asia"> View Polyline</i></button> ';
                                            echo '<button class="btn-danger btn btn-sm" id="hapuspolylinejalan" data-iddatajalan="'.$jalan->id_jalan.'"><i class="fas fa-trash-alt"></i></button>';
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        <!-- </div> -->
            
        </div>
     	<!-- ./container-fluid -->

      </div>
      <!-- End of Main Content -->

 
