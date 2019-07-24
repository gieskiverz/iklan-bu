
<?php
if(empty($data))
{
	redirect(base_url('ahp'));
}
foreach($data as $row){	
}
$tujuan_id=$row->tujuan_id;
$tujuanId=$tujuan_id;
?>
<script type="text/javascript">
function proseshitung()
{
	$.ajax({
		type:'get',
		dataType:'json',
		url:"<?=base_url('ahp/proseshitung');?>",
		data:"id=<?=$tujuan_id;?>",
		error:function(){
			$("#respon").html('Proses hitung seleksi beasiswa gagal');
			$("#error").show();
		},
		beforeSend:function(){
			$("#error").hide();
			$("#respon").html("Sedang bekerja, tunggu sebentar");
		},
		success:function(x){
			if(x.status=="ok")
			{
				alert('Proses seleksi berhasil. Halaman akan direfresh');
				window.location=window.location;
			}else{
				$("#respon").html('Proses hitung seleksi beasiswa gagal');
				$("#error").show();
			}
		},
	});
}
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<br><?php echo $this->session->flashdata('pesan');?>
	<p>&nbsp;</p>
	<?php
		$sql="Select COUNT(*) as m FROM daftar_tujuan Where tujuan_id='$tujuan_id' AND status IN ('lolos','tidaklolos')";
		$c=$this->m_db->get_query_row($sql,'m');
		if($c < 1)
		{
			echo '<div class="alert alert-warning hidden-print" id="error">'.$judul.' belum diproses. Klik <a href="javascript:;" onclick="proseshitung();">di sini</a> untuk proses</div>';
		}else{	
	?>
	<a href="javascript:;" onclick="proseshitung();" class="btn btn-primary btn-md">Ulangi Proses Hitung</a>
	<table class="table table-border table-hover" id="datatable">
		<thead>
			<th>Judul</th>
			<?php	
				$dKriteria=$this->mod_kriteria->kriteria_data();
				if(!empty($dKriteria))
				{
					foreach($dKriteria as $rKriteria)
					{
						echo '<th>'.$rKriteria->nama_kriteria.'</th>';
					}
				}
			?>
			<th>Total</th>
			<th>Status</th>
		</thead>
		<?php
$s=array(
'id_tujuan'=>$tujuan_id,
);
if($this->m_db->is_bof('tujuan',$s)==FALSE)
{
	$dtujuan=$this->m_db->get_data('daftar_tujuan',["tujuan_id" => $tujuan_id]);
	if(!empty($dtujuan))
	{
		foreach($dtujuan as $rtujuan)
		{

			$jalanId=$rtujuan->jalan_id;
			$nama=field_value('jalan','id_jalan',$jalanId,'namajalan');
			
			?>
			<tr>
				<td><?=$nama;?></td>
				<?php
				$total=0;
				if(!empty($dKriteria))
				{
					foreach($dKriteria as $rKriteria)
					{						
						$kriteriaid=$rKriteria->kriteria_id;
						$subkriteria=peserta_nilai($jalanId,$kriteriaid);
						$prioritas=ambil_prioritas($tujuan_id,$subkriteria);


						$total += $prioritas;
						echo '<td>'.number_format($prioritas,2).'</td>';
					}
				}
				?>
				<td><?=number_format($total,2);?></td>
				<td><?=ucwords($rtujuan->status);?></td>
			</tr>			
			<?php
			
		}
		
	}else{
		return false;
	}
	
}else{
	return false;
}
?>
	</table>

<?php
}
?>
</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->