<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

	<br><?php echo $this->session->flashdata('pesan');?>
	
	<p>&nbsp;</p>
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
						$subkriteria = $this->db->get_where('daftar_tujuan_nilai', ['daftar_tujuan_id' => $rtujuan->daftar_tujuan_id, 
						"kriteria_id" => $kriteriaid])->row();
						$nilaiID = $subkriteria->nilai_id;
						// $nilai=field_value('kriteria_nilai','kriteria_nilai_id',$nilaiID,'nama_nilai');
						$prioritas=ambil_prioritas($tujuan_id,$subkriteria);
						$total+=$prioritas;
						echo '<td>'.$nilaiID.'</td>';
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

</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->