const flashdata = $('.flash-data').data('flashdata');

if (flashData) {
	Swal({
		title: 'Data ',
		text: 'Berhasil ' + flashData,
		type: 'success'
	});
}

//  Tombol Hapus
$('.tombolhapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
		title: 'Apakah Kamu Yakin?',
		text: "Data Akan Dihapus!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Iya, Hapus Aja!'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
