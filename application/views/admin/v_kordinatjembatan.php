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
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" name="latitude" id="latitude">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" name="longitude" id="longitude">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datajembatan">Data jembatan</label>
                                    <?php if ($itemdatajembatan->num_rows()!=null) {
                                        echo '<select name="id_jembatan" id="id_jembatan" class="form-control">';
                                        foreach ($itemdatajembatan->result() as $datajembatan) {
                                            echo "<option value='".$datajembatan->id_jembatan."'>".$datajembatan->namajembatan."</option>";
                                        }
                                        echo '</select>';
                                    }else{
                                        echo anchor('admin/jembatan', '<span class="glyphicon glyphicon-plus"></span> Tambah Data jembatan', 'class="btn btn-info form-control"');
                                    } ?>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm" id="simpandaftarkoordinatjembatan"><span class="glyphicon glyphicon-save"><i class="fas fa-save"> Simpan</i></button> 
                                    <button class="btn btn-info btn-sm" id="clearmap"><i class="fas fa-globe-asia">  ClearMap</i></button>
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
                                <th>Data jembatan</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th></th>
                                <tbody id="daftarkoordinatjembatan">
                                    <?php 
                                    if ($itemkoordinatjembatan->num_rows()!=null) {
                                        $no = 1;
                                        foreach ($itemdatajembatan->result() as $jembatan) {
                                            echo "<tr>";
                                            echo "<td>";
                                            echo $no++;
                                            echo "</td>";
                                            echo "<td>";
                                            echo $jembatan->namajembatan;
                                            echo "</td>";
                                            echo "<td>";
                                            foreach ($itemkoordinatjembatan->result() as $koordinat) {
                                                if ($koordinat->id_jembatan==$jembatan->id_jembatan) {
                                                    echo $koordinat->latitude."</br>";
                                                }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            foreach ($itemkoordinatjembatan->result() as $koordinat) {
                                                if ($koordinat->id_jembatan==$jembatan->id_jembatan) {
                                                    echo $koordinat->longitude."</br>";
                                                }
                                            }
                                            echo "</td>";
                                            echo "<td>";
                                            echo '<button class="btn-info btn btn-sm" id="viewmarkerjembatan" data-iddatajembatan="'.$jembatan->id_jembatan.'"><i class="fas fa-globe-asia"> View marker</i></button> ';
                                            echo '<button class="btn-danger btn btn-sm" id="hapusmarkerjembatan" data-iddatajembatan="'.$jembatan->id_jembatan.'"><i class="fas fa-trash-alt"></i></button>';
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

 
