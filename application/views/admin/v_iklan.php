

     <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

            <div class="col-md-12 col-sm-12">
                <div class="table-responsive">
                     <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
                    <thead>
                        <tr>
                            <th style="background:#5d5a56;color:#fff">No</th>
                            <th style="background:#5d5a56;color:#fff">Perusahaan</th>
                            <th style="background:#5d5a56;color:#fff">Materi Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Jenis Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Ukuran</th>
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
                          $keterangan="Jatuh Tempo ".$selisih." hari lagi";
                        }elseif((int)$selisih < 0){
                          $bg="red";
                          $keterangan="Expired";
                        }else{
                          $bg='';
                          $keterangan="Jatuh Tempo ".$selisih." lagi";
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
        <!-- ./container-fluid -->
      <!-- End of Main Content -->

 


 
