<link rel="stylesheet" href="<?=base_url();?>konten/tema/lte/plugins/datatables/dataTables.bootstrap.css"/>
<script src="<?=base_url();?>konten/tema/lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>konten/tema/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "order": [[ 1, asc ]],
        "oLanguage": {
            "sProcessing": '<i class="fa fa-spinner fa-pulse fa-3x"></i>'
      },
    });
});
</script>
        <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
     <br><?php echo $this->session->flashdata('pesan');?> 
    <div>
        <a href="<?=base_url('ahp/addDaftarTujuan');?>" class="btn btn-primary btn-md">Tambah Daftar Tujuan</a>
    </div>
    <p>&nbsp;</p>
    <table class="table table-border table-hover" id="datatable">
        <thead>
            <th>Tujuan</th>
            <th>Nama Ruas</th>
            <th>Status</th>
            <th></th>
        </thead>
        <tbody>
          <?php
            if(!empty($datas))
            {
                foreach($datas as $row)
                {
                ?>
                <tr>
                    <td><?=$row->judul;?></td>
                    <td><?=$row->namajalan;?></td>
                    <td><?=$row->status;?></td>
                    <td>
                        <a title="Edit Subkriteria" href="<?php echo site_url('ahp/editDaftarTujuan/'.$row->daftar_tujuan_id);?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <a onclick="return confirm('Yakin ingin menghapus?');" href="<?php echo site_url('ahp/deleteDaftarTujuan/'.$row->daftar_tujuan_id);?>" class="btn btn-xs btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                }
            }
            ?>
        </tbody>
    </table>

</div>
<!-- ./container-fluid -->

</div>
<!-- End of Main Content -->