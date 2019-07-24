
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
                            <form method="post" action="<?php echo site_url('user/prosespasangiklan')?>" enctype="multipart/form-data">                        
                                <div class="wizard-header">
                                    <h3>
                                        <b>Submit</b> YOUR PROPERTY <br>
                                        <small>Lengkapi Data-data Berikut</small>
                                    </h3>
                                </div>

                                <ul>
                                    <li><a href="#step1" data-toggle="tab">Step 1 </a></li>
                                    <li><a href="#step4" data-toggle="tab">Finished </a></li>
                                </ul>

                                <div class="tab-content">

                                    <div class="tab-pane" id="step1">                                        
                                        <h4 class="info-text">Informasi Iklan Yang Akan di Pasang </h4>
                                        <div class="row">  
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Materi Iklan <small>(required)</small></label>
                                                    <?php  
                                                        echo '<select name="tipe_iklan" id="id_tipe" class="form-control">';
                                                        echo "<option value=''>Pilih Materi Iklan</option>";
                                                        foreach ($itemtipe->result() as $tipe) {
                                                            echo "<option value='".$tipe->id_tipe."'>".$tipe->nama_tipe."</option>";
                                                        }
                                                        echo '</select>';
                                                    ?>
                                                </div>
                                                 <div class="form-group">
                                                    <label>Jenis Iklan <small>(required)</small></label>
                                                    <?php  
                                                    echo '<select name="jenis_iklan" id="id_jenis" class="form-control">';
                                                    echo "<option value=''>Pilih Jenis Iklan</option>";
                                                    foreach ($itemjenis->result() as $jenis) {
                                                        $harga=number_format($jenis->harga,2,",",".");
                                                        echo "<option myMin=".$jenis->ukuran." myMax=".$jenis->ukuran_max." value='".$jenis->id_jenis."'>".$jenis->nama_jenis." - Min Luas : ".$jenis->ukuran."/m2 - Harga : ".$harga." /bulan</option>";
                                                    }
                                                    echo '</select>';
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Luas Iklan /m<sup>2</sup><small> (required)</small></label>
                                                    <div class="input-group sm-2">
                                                        <input id="luas" min ="" max="" class="form-control" value="" placeholder="Panjang X Lebar" name="luas" type="text" required>
                                                        <span class="input-group-addon">m<sup>2</sup></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lama_iklan">Lama Iklan :</label>
                                                        <select id="bulanTahun" name="bulanTahun" class="form-control" required>
                                                            <option value="">-Pilih Bulan / Tahun-</option>
                                                            <option value="bulan">Bulan</option>
                                                            <option value="tahun">Tahun</option>
                                                        </select>
                                                    <div class="input-group sm-2">
                                                        <input id="inputBulanTahun" class="form-control" value="" placeholder="Lama Pemasangan /Bulan" name="lama_iklan" type="number">
                                                        <span id="spanBulanTahun" class="input-group-addon"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6"> 
                                                <div class="form-group">
                                                    <label for="ruas">Ruas<small>(required)</small></label>
                                                    <?php  
                                                        echo '<select name="jalan" id="id_jalan" class="form-control">';
                                                        echo "<option value=''>Pilih Ruas Jalan</option>";
                                                        foreach ($info_ruas->result() as $ruas) {
                                                            echo "<option value='".$ruas->id_jalan."'>".$ruas->namajalan."</option>";
                                                        }
                                                        echo '</select>';
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lokasi">KM<small>(required)</small></label>
                                                    <input class="form-control" value="" placeholder="KM" name="lokasi" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kordinat">Kordinat<small>(required)</small></label>
                                                    <input class="form-control" value="" placeholder="Kordinat Lat & Long (-xxx, xxx)" name="kordinat" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label for="proposal">Upload Proposal<small>(required)</small></label>
                                                    <input class="" name="proposal" type="file" id="property-images">
                                                    <p class="help-block">File Proposal yang berisi proposal pemasangan iklan beserta foto lokasi tempat pemasangan iklan.</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="step4">                                        
                                        <h4 class="info-text"> Finished and submit </h4>
                                        <div class="row">  
                                            <div class="col-sm-12">
                                                <div class="">
                                                    <p>
                                                        <label><strong>Terms and Conditions</strong></label>
                                                        Perusahaan Jasa Marga Berhak Membatalkan, Membongkar, dan Melaporkan Apabila Anda Melangar Peraturan Jasa Marga 
                                                    </p>

                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" /> <strong>Accept termes and conditions.</strong>
                                                        </label>
                                                    </div> 

                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End step 4 -->

                                </div>

                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='' class='btn btn-next btn-primary' name='submit' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Finish' />
                                    </div>

                                    <div class="pull-left">
                                        <input type='button' class='btn btn-previous btn-default' name='previous' value='Previous' />
                                    </div>
                                    <div class="clearfix"></div>                                            
                                </div>	
                            </form>
                        </div>
                        <!-- End submit form -->
                    </div> 
                </div>
            </div>
        </div>

<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function(){
        $('#id_jenis').change(function() {
            var optMax = $('option:selected', this).attr('myMax');
            var optMin = $('option:selected', this).attr('myMin');
            $('#luas').attr({
                min: optMin,
                max: optMax,
                placeholder: "Minimal : "+optMin+", Maximal : "+optMax
            });
        });

        $('#bulanTahun').change(function() {
            var opt = $('option:selected', this).val();
            $('#spanBulanTahun').text(opt)
            $('#inputBulanTahun').attr({
                placeholder: "Lama pemasangan /"+opt
            });
        });
    });
</script>