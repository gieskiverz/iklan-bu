<div class="row">
<div class="col-md-3">
	<ul class="list-group">
	  <?php	  
	  if(!empty($kriteria))
	  {
	  	foreach($kriteria as $rk)
	  	{
			echo '<li class="list-group-item"><a href="javascript:;" onclick="showsubdata('.$rk->kriteria_id.','.$tujuan_id.');">'.$rk->nama_kriteria.'</a></li>';
		}
	  }
	  ?>
	</ul>
</div>
<div class="col-md-9">
	<div id="matriksub"></div>
</div>
</div>

<script>
function showsubdata(kriteria,tujuan_id)
    {
	    $.ajax({
			type:'get',
			dataType:'html',
			url:"<?=base_url('ahp/getsub');?>",
			data:"kriteria="+kriteria+"&tujuan_id="+tujuan_id,
			error:function(){
				$("#matriksub").html('Gagal mengambil data matrik');
			},
			beforeSend:function(){
				$("#matriksub").html('Mengambil data matrik. Tunggu sebentar');
			},
			success:function(x){
				$("#matriksub").html(x);
			},
		});
    }
</script>