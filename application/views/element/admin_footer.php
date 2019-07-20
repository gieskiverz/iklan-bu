     <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Internship Bj.harisel <?= date('Y'); ?> </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" Jika Yakin :) </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('login/keluar'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  <script src="<?= base_url('assets/'); ?>sweetAlert/sweetalert2.all.min.js"></script>
  
  <!-- Bootstrap core JavaScript-->
  

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>

  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins --> 
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

  <script>
    // file upload gambar
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHkLzz4xUgq6M2LS41BWqFJ4v8KaKPikg&v=3""></script>
	<script>
	$(document).on('click','#clearmap',clearmap)
	.on('click','#simpandaftarkoordinatjalan',simpandaftarkoordinatjalan)
	.on('click','#hapuspolylinejalan',hapuspolylinejalan)
	.on('click','#viewpolylinejalan',viewpolylinejalan);
		var poly;
		var map;

		function initialize() {
			var mapOptions = {
			zoom: 14,
			// Center di kantor kecamatan jekulo
			center: new google.maps.LatLng(-6.806428778495534, 110.84213197231293)
			};

			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			var polyOptions = {
			strokeColor: '#000000',
			strokeOpacity: 1.0,
			strokeWeight: 3
			};
			poly = new google.maps.Polyline(polyOptions);
			poly.setMap(map);

			// Add a listener for the click event
			google.maps.event.addListener(map, 'rightclick', addLatLng);
			google.maps.event.addListener(map, "rightclick", function(event) {
				var lat = event.latLng.lat();
				var lng = event.latLng.lng();
				var datakoordinat = {'latitude':lat, 'longitude':lng};
				$.ajax({
					url : '<?php echo site_url("admin/tambahkoordinatjalan") ?>',
					data : datakoordinat,
					dataType : 'json',
					type : 'POST',
					success : function(data,status){
						if (data.status!='error') {
							$('#daftarkoordinat').load('<?php echo current_url()."/ #daftarkoordinat > *" ?>');
						}else{
							alert(data.msg);
						}
					}
				})
				//$('#latitude').val(lat);
				//$('#longitude').val(lng);
				//alert(lat +" dan "+lng);
			});
		}

		/**
		* Handles click events on a map, and adds a new point to the Polyline.
		* @param {google.maps.MouseEvent} event
		*/
		function addLatLng(event) {

			var path = poly.getPath();

			// Because path is an MVCArray, we can simply append a new coordinate
			// and it will automatically appear.
			path.push(event.latLng);

			// Add a new marker at the new plotted point on the polyline.
			var marker = new google.maps.Marker({
			position: event.latLng,
			title: '#' + path.getLength(),
			map: map
			});
		}
		function clearmap(e){
			e.preventDefault();
			$.ajax({
				url : '<?php echo site_url("admin/hapusdaftarkoordinatjalan") ?>',
				dataType : 'json',
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
									$('#daftarkoordinat').load('<?php echo current_url()."/ #daftarkoordinat > *" ?>');
								}else{
									alert(data.msg);
								}
				}
			})
				var mapOptions = {
					zoom: 14,
					// Center the map on Chicago, USA.
					center: new google.maps.LatLng(-6.805701340471898, 110.92556476593018)
				};

				map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

				var polyOptions = {
					strokeColor: '#000000',
					strokeOpacity: 1.0,
					strokeWeight: 3
				};
				poly = new google.maps.Polyline(polyOptions);
				poly.setMap(null);
				initialize();
		}
		function simpandaftarkoordinatjalan(e){
			e.preventDefault();
			var datakoordinat = {'id_jalan':$('#id_jalan').val()};
			console.log(datakoordinat);
			$.ajax({
				url : '<?php echo site_url("admin/simpandaftarkoordinatjalan") ?>',
				dataType : 'json',
				data : datakoordinat,
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
						$('#daftarkoordinat').load('<?php echo current_url()."/ #daftarkoordinat > *" ?>');
						$('#daftarkoordinatjalan').load('<?php echo current_url()."/ #daftarkoordinatjalan > *" ?>');
						alert(data.msg);
						clearmap(e);
					}else{
						alert(data.msg);
					}
				}
			})
		}
		function hapuspolylinejalan(e){
			e.preventDefault();
			var datakoordinat = {'id_jalan':$(this).data('iddatajalan')};
			console.log(datakoordinat);
			$.ajax({
				url : '<?php echo site_url("admin/hapuspolylinejalan") ?>',
				data : datakoordinat,
				dataType : 'json',
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
						alert(data.msg);
						$('#daftarkoordinatjalan').load('<?php echo current_url()."/ #daftarkoordinatjalan > *" ?>');
						clearmap(e);
					}else{
						alert(data.msg);
					}
				}
			})
		}
		function viewpolylinejalan(e){
			e.preventDefault();
			var datakoordinat = {'id_jalan':$(this).data('iddatajalan')};
			console.log(datakoordinat);
			$.ajax({
				url : '<?php echo site_url("admin/viewpolylinejalan") ?>',
				data : datakoordinat,
				dataType : 'json',
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
						clearmap(e);
						//load polyline
						$.each(data.msg,function(m,n){
							var lat = n["latitude"];
							var lng = n["longitude"];
							console.log(m,n);
							$.each(data.datajalan,function(k,v){
								createpolylinedatajalan(data.msg,v['namajalan'],lat,lng);
							})
							return false;
						})
						//end load polyline
					}else{
						alert(data.msg);
					}
				}
			})
		}
		function createpolylinedatajalan(datakoordinat,nama,lat,lon){
			var mapOptions = {
			zoom: 14,
			//get center latlong
			center: new google.maps.LatLng(lat, lon),
			//mapTypeId: google.maps.MapTypeId.TERRAIN
			//end get center latlong
			};

			var map = new google.maps.Map(document.getElementById('map-canvas'),
				mapOptions);

			var listkoordinat = [];
			$.each(datakoordinat,function(k,v){
				listkoordinat.push(new google.maps.LatLng(parseFloat(v['latitude']), parseFloat(v['longitude'])));
			})
			var pathKoordinat = new google.maps.Polyline({
			path: listkoordinat,
			geodesic: true,
			strokeOpacity: 1.0,
			});

			pathKoordinat.setMap(map);
			
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHkLzz4xUgq6M2LS41BWqFJ4v8KaKPikg&v=3"></script>
	<script>
	$(document).on('click','#clearmap',clearmap)
	.on('click','#simpandaftarkoordinatjembatan',simpandaftarkoordinatjembatan)
	.on('click','#hapusmarkerjembatan',hapusmarkerjembatan)
	.on('click','#viewmarkerjembatan',viewmarkerjembatan);
		var map;
		var markers = [];

		function initialize() {
			var mapOptions = {
			zoom: 14,
			// Center di kantor kabupaten kudus
			center: new google.maps.LatLng(-6.806428778495534, 110.84213197231293)
			};

			map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

			// Add a listener for the click event
			google.maps.event.addListener(map, 'rightclick', addLatLng);
			google.maps.event.addListener(map, "rightclick", function(event) {
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();		  
			$('#latitude').val(lat);
			$('#longitude').val(lng);
			//alert(lat +" dan "+lng);
			});
		}

		/**
		* Handles click events on a map, and adds a new point to the marker.
		* @param {google.maps.MouseEvent} event
		*/
		function addLatLng(event) {
			var marker = new google.maps.Marker({
			position: event.latLng,
			title: 'Simple GIS',
			map: map
			});
			markers.push(marker);
		}
		//membersihkan peta dari marker
		function clearmap(e){
			e.preventDefault();
			$('#latitude').val('');
			$('#longitude').val('');
			setMapOnAll(null);
		}
		//buat hapus marker
		function setMapOnAll(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
		markers = [];
		}
		//end buat hapus marker

		function simpandaftarkoordinatjembatan(e){
			e.preventDefault();
			var datakoordinat = {'id_jembatan':$('#id_jembatan').val(),'latitude':$('#latitude').val(),'longitude':$('#longitude').val()};
			console.log(datakoordinat);
			$.ajax({
				url : '<?php echo site_url("admin/simpandaftarkoordinatjembatan") ?>',
				dataType : 'json',
				data : datakoordinat,
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
						$('#daftarkoordinatjembatan').load('<?php echo current_url()."/ #daftarkoordinatjembatan > *" ?>');
						alert(data.msg);
						clearmap(e);
					}else{
						alert(data.msg);
					}
				}
			})
		}
		function hapusmarkerjembatan(e){
			e.preventDefault();
			var datakoordinat = {'id_jembatan':$(this).data('iddatajembatan')};
			$.ajax({
				url : '<?php echo site_url("admin/hapusmarkerjembatan") ?>',
				data : datakoordinat,
				dataType : 'json',
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
						alert(data.msg);
						$('#daftarkoordinatjembatan').load('<?php echo current_url()."/ #daftarkoordinatjembatan > *" ?>');
						clearmap(e);
					}else{
						alert(data.msg);
					}
				}
			})
		}
		function viewmarkerjembatan(e){
			e.preventDefault();
			var datakoordinat = {'id_jembatan':$(this).data('iddatajembatan')};
			$.ajax({
				url : '<?php echo site_url("admin/viewmarkerjembatan") ?>',
				data : datakoordinat,
				dataType : 'json',
				type : 'POST',
				success : function(data,status){
					if (data.status!='error') {
						clearmap(e);
						//load marker
						$.each(data.msg,function(m,n){
							var myLatLng = {lat: parseFloat(n["latitude"]), lng: parseFloat(n["longitude"])};
							console.log(m,n);
							$.each(data.datajembatan,function(k,v){
								addMarker(v['namajembatan'],myLatLng);
							})
							return false;
						})
						//end load marker
					}else{
						alert(data.msg);
					}
				}
			})
		}
		// Menampilkan marker lokasi jembatan
		function addMarker(nama,location) {
			var marker = new google.maps.Marker({
				position: location,
				map: map,
				title : nama
			});
			markers.push(marker);
		}

		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

</body>

</html>