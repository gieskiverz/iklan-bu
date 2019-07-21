<style>
.radio-inline{
    margin-right:2%;
}
</style>
<script type="text/javascript">
$(document).ready(function () {
	$(".opsi input").removeAttr('required');
	$(".opsi select").removeAttr('required');
	$(".tipe").each(function(){
		$(this).change(function(){
			var did=$(this).attr('data-id');
			$(".opsi").attr('style','display:none');
			$(".opsi input").removeAttr('required');
			$(".opsi select").removeAttr('required');
			$("#div_"+did).show();
			$("#div_"+did+" input").attr('required','required');
		});
	});
	
});
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php
    echo validation_errors();
    echo form_open(base_url('ahp/prosestambahsubKriteria?kriteria=').$kriteria,array('class'=>'form-horizontal'));
    ?>  
        <div class="form-group required">
            <label class="col-sm-2 control-label" for="">Tipe</label>
            <div class="col-md-6">
                <?php
                $tipe=array('teks','nilai');
                echo com_choice('radio','tipe',$tipe,'teks',array('class'=>'tipe '),TRUE,TRUE);
                ?>
            </div>
        </div>
        <div id="div_teks" class="opsi">
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="">Keterangan</label>
                <div class="col-md-7">
                    <input type="text" name="ket" id="" class="form-control " autocomplete="" placeholder="keterangan" required="" value="<?php echo set_value('ket'); ?>"/>
                </div>
            </div>	
        </div>

        <div id="div_nilai" class="opsi" style="display: none;">
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="">Minimum</label>
                <div class="col-md-10">
                    <div class="row">
                    <div class="col-sm-2" style="margin: 0;padding=0">
                        <select name="opmin" class="form-control" required="">
                            <option value="<"> < </option>
                            <option value="<="> <= </option>
                            <option value=">"> > </option>
                            <option value="=>"> => </option>
                            <option value="="> = </option>
                        </select>
                    </div>
                    <div class="col-sm-8" style="margin: 0;padding=0">
                        <input type="number" name="min" id="" class="form-control " autocomplete="" placeholder="Nilai Minimum" required="" value="<?php echo set_value('min'); ?>"/>
                    </div>
                    </div>
                </div>
            </div>
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="">Maksimum</label>
                <div class="col-md-10">
                    <div class="row">
                    <div class="col-sm-2" style="margin: 0;padding=0">
                        <select name="opmax" class="form-control" required="">
                            <option value="<"> < </option>
                            <option value="<="> <= </option>
                            <option value=">"> > </option>
                            <option value="=>"> => </option>
                            <option value="="> = </option>
                        </select>
                    </div>
                    <div class="col-sm-8" style="margin: 0;padding=0">
                        <input type="number" name="max" id="" class="form-control " autocomplete="" placeholder="Nilai Maximum" required="" value="<?php echo set_value('max'); ?>"/>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="nilaikategori">
            <div class="form-group required">
                <label class="col-sm-2 control-label" for="">Nilai</label>
                <div class="col-md-6">
                    <?php
                    if(!empty($nilai))
                    {
                        foreach($nilai as $rnilai)
                        {
                        ?>
                        <div class="radio">
                            <label>
                                <input type="radio" name="nilaiid" value="<?=$rnilai->nilai_id;?>"/><?=$rnilai->nama_nilai;?>
                            </label>
                        </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                <a href="<?php echo base_url('ahp/subKriteria/').$kriteria ?>" class="btn btn-default btn-flat">Batal</a>
            </div>
        </div>
        <?php
        echo form_close();
        ?>

</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->

 
