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

                        <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                           <table class="table table-bordered">
                              <tr>
                                <th>No.</th>
                                <th>Tipe Iklan</th>
                                <th>Jenis Iklan</th>
                                <th>Lokasi</th> 
                                <th>Kordinat</th> 
                                <th>Biaya/Harga</th> 
                                <th>Tgl Pengajuan</th> 
                                <th>Tgl Aktif</th>
                                <th>Tgl Jatuh Tempo</th>
                                <th>Status</th>    
                              </tr>
                              <?php 
                              $no=1; 
                              foreach ($join3 as $row) { ?>
                              <tr>
                              <td><?php echo $no++;?></td>
                              <td><?php echo $row->nama_tipe;?></td>
                              <td><?php echo $row->nama_jenis;?></td>
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
                              <td><?php echo $row->tgl_aktif;?></td>
                              <td><?php echo $row->tgl_jatuh_tempo;?></td>
                              <td><?php echo $status;?></td>
                              </tr>
                                <?php } ?>
                                
                            </table>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

        