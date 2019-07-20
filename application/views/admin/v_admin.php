        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_admin; ?> Admin</div>
                    </div>
                    <a href="<?php echo site_url('admin/dataMentor');?>">
                    <div class="col-auto">
                      <i class="fas fa-user-shield fa-2x"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
       
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_asset; ?> User</div>
                    </div>
                    <a href="<?php echo site_url('admin/dataMember');?>">
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x" style="color: #FFD700;"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Iklan Terpasang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_terpasang; ?> Terpasang</div>
                    </div>
                    <a href="<?php echo site_url('jenis_iklan');?>">
                    <div class="col-auto">
                      <i class="fas fa-chalkboard fa-2x"></i> 
                      <!-- fas fa-presentation -->
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Iklan Pending</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $iklan_pending; ?> Pending</div>
                    </div>
                    <a href="<?php echo site_url('iklan');?>">
                    <div class="col-auto">
                      <i class="fas fa-chalkboard-teacher fa-2x" style="color: #FFD700;"></i>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- End of Content Row -->

          <!-- Divider -->
          <hr class="sidebar-divider"><br>   

          <!-- Content Row -->
          <div class="row">

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"aria-labelledby="dropdownMenuLink">
                     <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item" href="#">View</a>
                      <a class="dropdown-item" href="#">Refresh</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Lain-lain</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Independent
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Organisasi
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Lain-lain
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pendapatan Per-bulan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Action:</div>
                      <a class="dropdown-item" href="#">View</a>
                      <a class="dropdown-item" href="#">Refresh</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Lain-lain</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary fas fa-business-time"> Iklan</h6>
            </div>
            <div class="card-body">
              <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <thead>
                        <tr>
                            <th style="background:#5d5a56;color:#fff">No</th>
                            <th style="background:#5d5a56;color:#fff">Nama Pemasang</th>
                            <th style="background:#5d5a56;color:#fff">Materi Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Jenis Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Luas Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Lokasi</th>
                            <th style="background:#5d5a56;color:#fff">Kordinat</th>
                            <th style="background:#5d5a56;color:#fff">Harga</th>
                            <th style="background:#5d5a56;color:#fff">Tgl Pengajuan</th>
                            <th style="background:#5d5a56;color:#fff">Lama Iklan(Bulan)</th>
                            <th style="background:#5d5a56;color:#fff">Total Biaya</th>
                            <th style="background:#5d5a56;color:#fff">File Proposal</th>
                            <th style="background:#5d5a56;color:#fff">Tgl Aktif</th>
                            <th style="background:#5d5a56;color:#fff">Tgl Jatuh Tempo</th>
                            <th style="background:#5d5a56;color:#fff">Stattus</th>
                            <th style="background:#5d5a56;color:#fff">Keterangan</th>
                            <th style="background:#5d5a56;color:#fff">Aproval</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    foreach ($join3 as $row) {
                        $datetime1 = new DateTime($row->tgl_jatuh_tempo);
                        $datetime2 = new DateTime();
                        $difference = $datetime1->diff($datetime2);
                        $selisih=$difference->days;
                        if((int)$selisih < 30){
                          $bg="yellow";
                          $keterangan="Jatuh Tempo ".$selisih." lagi";
                        }elseif((int)$selisih < 0){
                          $bg="red";
                          $keterangan="Expired";
                        }else{
                          $bg='';
                          $keterangan="Jatuh Tempo ".$selisih." hari lagi";
                        }
                        echo "<tr bgcolor=$bg>";
                        echo "<td>".$no++."</td>";
                        echo "<td>".$row->nm_organisasi."</td>";
                        echo "<td>".$row->nama_tipe."</td>";
                        echo "<td>".$row->nama_jenis."</td>";
                        echo "<td>".$row->luas."</td>";
                        echo "<td>".$row->lokasi."</td>";
                        echo "<td>".$row->kordinat."</td>";
                        $harga=number_format($row->harga,2,",",".");
                        $biaya=number_format($row->biaya,2,",",".");
                         if(empty($row->status)){
                                    $status="Pending";
                                }else{
                                    $status=$row->status;
                                }
                        
                        echo "<td align='right'>".$harga."</td>";
                        echo "<td>".$row->tgl_pengajuan."</td>";
                        echo "<td>".$row->lama_iklan."</td>";
                        echo "<td align='right'>".$biaya."</td>";?>
                        <td><a href='<?php echo base_url("assets/images/$row->proposal")?>'><?php echo $row->proposal;?></a></td>";
                        <?php
                        echo "<td>".$row->tgl_aktif."</td>";
                        echo "<td>".$row->tgl_jatuh_tempo."</td>";
                        echo "<td>".$status."</td>";
                        echo "<td>".$keterangan."</td>";
                        echo "<td align='center'><a href='".site_url('iklan/aproval')."/".$row->row_id."'><button class='btn btn-primary'><i class='fas fa-edit'></i></button></a>  ";
                       
                        echo "</tr>";
                    }
                    echo "";
                    ?>
                    </tbody>
                    </table>

                 </div>
         </div>
            </div>
          </div>
        
        </div>
        <!-- ./container-fluid -->
        
      </div>
      <!-- End of Main Content -->
