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
    echo form_open(base_url('ahp/proseseditDaftarTujuan'),array('class'=>'form-horizontal'));
    ?>  

    <input type="hidden" name="id" id="id" value="<?php echo $data->daftar_tujuan_id; ?>">
    <input type="hidden" name="id_jalan" id="id_jalan" value="<?php echo $data->jalan_id; ?>">
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
                <option <?php if($tjn->id_tujuan == $data->tujuan_id){ echo "selected"; } ?>
                 value="<?php echo $tjn->id_tujuan;?>"><?php echo $tjn->judul;?></option>
                    <?php }
                }
              ?>
            </select>
        </div>
    </div>
    
    <div class="form-group required">
        <label class="col-sm-2 control-label" for="">Nama Ruas</label>
        <div class="col-md-10">
            <select name="ruas" class="form-control" id="ruas">
              <option value="">Pilih Ruas</option>
            </select>
        </div>
    </div>

    <div class="form-group">
	<label class="col-sm-2 control-label" for="">Penilaian</label>
	<div class="col-md-10">
		<table class="table table-bordered">
			<thead>
				<th>Kriteria</th>
				<th>Nilai</th>
			</thead>
			<tbody>
			<?php
			if(!empty($kriteria))
			{
				foreach($kriteria as $rk)
				{
					$kriteriaid=$rk->kriteria_id;
					echo '<tr>';
					echo '<td>'.$rk->nama_kriteria.'</td>';
                    echo '<td>';
                    $dSub = $this->db->get_where('subkriteria',array('kriteria_id'=>$kriteriaid))->result();
					if(!empty($dSub))
					{						
						echo '<select name="kriteria['.$kriteriaid.']" class="form-control" data-placeholder="Pilih Nilai" required style="width: 100%">';						
						foreach($dSub as $rSub)
						{
							$o='';
							if($rSub->tipe=="teks")
							{
								$o=$rSub->nama_subkriteria;
							}elseif($rSub->tipe=="nilai"){
								$opmin=$rSub->op_min;
								$opmax=$rSub->op_max;
								$nilaimin=$rSub->nilai_minimum;
								$nilaimax=$rSub->nilai_maksimum;
								if($opmin==$opmax && $nilaimin==$nilaimax)
								{
									$o=$opmax." ".$nilaimin;
								}else{
									$o=$opmin." ".$nilaimin." dan ".$opmax." ".$nilaimax;
								}
							}
							$nDB=$this->db->get_where("daftar_tujuan_nilai",["daftar_tujuan_id" =>$data->daftar_tujuan_id,"kriteria_id" =>$rSub->kriteria_id])->row();							
							$jj='';
							if($rSub->subkriteria_id==$nDB->nilai_id)
							{
								$jj='selected="selected"';
							}							
							echo '<option value="'.$rSub->subkriteria_id.'" '.$jj.'>'.$o.'</option>';
						}
						echo '</select>';
					}
					echo '</td>';
					echo '</tr>';
				}
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>


        <div class="form-group">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                <a href="<?php echo base_url('ahp/DaftarTujuan') ?>" class="btn btn-default btn-flat">Batal</a>
            </div>
        </div>
        <?php
        echo form_close();
        ?>

</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript">
$(document).ready(function () {
   $('#tujuan').on('change',function(){
    $.ajax({
        url: '<?php echo base_url() ?>ahp/get_ruas',
        type: 'GET',
        data: {
            tujuan:$('#tujuan').val(),
            tujuan_active: $('#id_jalan').val()
        },
        success:function(r){
            var data = JSON.parse(r);
            var element = '<option value="">Pilih Ruas</option>';

            var active = $("#id_jalan").val();
            for (var i = 0; i < data.length; i++) {
                if(active !== undefined && active == data[i].id_jalan){
                    element+='<option value="'+data[i].id_jalan+'" selected>'+data[i].namajalan+'</option>';
                }else{
                    element+='<option value="'+data[i].id_jalan+'">'+data[i].namajalan+'</option>';
                }
            }
            $('#ruas').html(element);
        }
    });
   });

   if ($('#id_jalan').val()) {
       $.ajax({
        url: '<?php echo base_url() ?>ahp/get_ruas',
        type: 'GET',
        data: {
            tujuan:$('#tujuan').val(),
            tujuan_active: $('#id_jalan').val()
        },
        success:function(r){
            var data = JSON.parse(r);
            var element = '<option value="">Pilih Ruas</option>';

            var active = $("#id_jalan").val();
            for (var i = 0; i < data.length; i++) {
                if(active == data[i].id_jalan){
                    element+='<option value="'+data[i].id_jalan+'" selected>'+data[i].namajalan+'</option>';
                }else{
                    element+='<option value="'+data[i].id_jalan+'">'+data[i].namajalan+'</option>';
                }
            }
            $('#ruas').html(element);
        }
    });
   }
});
</script>

 
