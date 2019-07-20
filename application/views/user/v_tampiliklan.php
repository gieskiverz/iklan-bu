        <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Pasang Iklan Yang Anda Inginkan</h1>               
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="clearfix" > 
                    <div class="wizard-container"> 
                        <?= $this->session->flashdata('pesan'); ?>
                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                           <table class="table table-bordered">
                              <tr>
                                <thead>
                        <tr>
                            <th style="background:#5d5a56;color:#fff">No</th>
                            <th style="background:#5d5a56;color:#fff">Materi Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Jenis Iklan</th>
                            <th style="background:#5d5a56;color:#fff">Luas</th>
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
                            
                        </tr>
                    </thead>  
                              </tr>
                              <?php 
                              $no=1; 
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
                              ?>
                              <tr bgcolor="<?php echo $bg;?>" >
                              <td><?php echo $no++;?></td>
                              <td><?php echo $row->nama_tipe;?></td>
                              <td><?php echo $row->nama_jenis;?></td>
                              <td><?php echo $row->luas;?></td>
                              <td><?php echo $row->lokasi;?></td>
                              <td><?php echo $row->kordinat;?></td>
                              <td align="right"><?php echo number_format($row->harga,2,",",".");?></td>
                              <?php     
                                if(empty($row->status)){
                                    $status="Pending";
                                }else{
                                    $status=$row->status;
                                }

                              ?>
                              <td><?php echo $row->tgl_pengajuan;?></td>
                              <td><?php echo $row->lama_iklan;?></td>
                              <td align="right"><?php echo number_format($row->biaya,2,",",".");?></td>
                              <td><a href='<?php echo base_url("assets/images/$row->proposal")?>'><?php echo $row->proposal;?></a></td>
                              <td><?php echo $row->tgl_aktif;?></td>
                              <td><?php echo $row->tgl_jatuh_tempo;?></td>
                              <td><?php echo $status;?></td>
                              <td><?php echo $keterangan;?></td>
                              </tr>
                                <?php } ?>
                                
                            </table>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

        