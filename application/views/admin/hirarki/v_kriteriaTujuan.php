<style>
.radio-inline{
    margin-right:2%;
}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <?php
        echo validation_errors();
        echo form_open('#',array('class'=>'form-horizontal','id'=>'formcari'));
    ?>
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="">Tujuan</label>
        <div class="col-md-10">
            <select name="tujuan" class="form-control" id="tujuan">
              <option value="">Pilih Tujuan</option>
              <?php 
                if(!empty($tujuan))
                {
                    foreach($tujuan as $tjn)
                    { ?>
                <option value="<?php echo $tjn->id_tujuan;?>"><?php echo $tjn->judul;?></option>
                    <?php }
                }
              ?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="col-md-10 text-right">
            <button type="submit" class="btn btn-primary btn-flat">Search</button>
            <a href="<?php echo base_url('ahp/kriteriaTujuan') ?>" class="btn btn-default btn-flat">Batal</a>
        </div>
    </div>
    <?php
        echo form_close();
    ?>
<div id="matrik"></div>

</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript">
$(document).ready(function () {
   $("#formcari").submit(function(e){
		e.preventDefault();
		$.ajax({
			type:'get',
			dataType:'html',
			url:"<?=base_url('/ahp/gethtml');?>",
			data:{
                tujuan:$('#tujuan').val()
            },
			error:function(){
				$("#matrik").html('Gagal mengambil data matrik');
			},
			beforeSend:function(){
				$("#matrik").html('Mengambil data matrik. Tunggu sebentar');
			},
			success:function(x){
				$("#matrik").html(x);
			},
		});
	});
});
</script>

 
