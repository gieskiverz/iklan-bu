
    <!-- Footer area-->
    <div class="footer-area">

        <div class=" footer">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer">
                            <h4>About us </h4>
                            <div class="footer-title-line"></div>

                            <a href="user"><img src="<?= base_url('assets/'); ?>vendorHome/img/JM/bg123.jpg" alt="" class="wow pulse" data-wow-delay="2s" ></a>
                            <p>Cari Informasi Lebih Lanjut..</p>
                            <ul class="footer-adress">
                                <li><i class="pe-7s-map-marker strong"> </i> Plaza Tol Cililitan
                                    Jln. Cililitan Besar
                                    Jakarta 13510</li>
                                <li><i class="pe-7s-mail strong"> </i> ctc@jasamarga.co.id</li>
                                <li><i class="pe-7s-call strong"> </i> (62 21) 8088 7227​</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer">
                            <h4>Eksternal link </h4>
                            <div class="footer-title-line"></div>
                            <ul class="footer-menu">
                                <li><a href="properties.html">Web Jasa Marga</a> </li>
                                <li><a href="http://jasamargalive.com/webjm3/mjm/index.php">Live CCTV Jasa Marga</a>
                                </li>
                                <li><a href="http://lpse.jasamarga.co.id/">LPSE </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 wow fadeInRight animated">
                        <div class="single-footer news-letter">
                            <h4>Sosial Media</h4>
                            <div class="footer-title-line"></div>
                            <p>Kepoin Juga Sosial Media Kami Untuk Mendapatkan Update Seputar Jasa Marga. Masukan Email
                                Dibawah Ini Untuk Berlanganan</p>

                            <form>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="E-mail ... ">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary subscribe" type="button"><i
                                                class="pe-7s-paper-plane pe-2x"></i></button>
                                    </span>
                                </div>
                                <!-- /input-group -->
                            </form>

                            <div class="social pull-right">
                                <ul>
                                    <li><a class="wow fadeInUp animated" href="https://twitter.com/OFFICIAL_JSMR"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a class="wow fadeInUp animated"
                                            href="https://www.facebook.com/official.jasamarga/?ref=bookmarks"
                                            data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="wow fadeInUp animated"
                                            href="https://www.instagram.com/official.jasamarga/"
                                            data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-copy text-center">
            <div class="container">
                <div class="row">
                    <div class="pull-left">
                        <span> Copyright &copy; Sistem Informasi Iklan JTC 2019 </span>
                    </div>
                    <div class="bottom-menu pull-right">
                        <ul>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.2s">Home</a></li>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.3s">Iklan</a></li>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.4s">Faq</a></li>
                            <li><a class="wow fadeInUp animated" href="#" data-wow-delay="0.6s">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?= base_url('assets/'); ?>vendorHome/js/modernizr-2.6.2.min.js"></script>

    <script src="<?= base_url('assets/'); ?>vendorHome/js/jquery-1.10.2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/bootstrap-select.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/bootstrap-hover-dropdown.js"></script>

    <script src="<?= base_url('assets/'); ?>vendorHome/js/easypiechart.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/jquery.easypiechart.min.js"></script>

    <script src="<?= base_url('assets/'); ?>vendorHome/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/wow.js"></script>

    <script src="<?= base_url('assets/'); ?>vendorHome/js/icheck.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/price-range.js"></script>

    <!-- Tambahan Daftar -->
    <script src="<?= base_url('assets/'); ?>vendorHome/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/jquery.validate.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendorHome/js/wizard.js"></script>
    <!--  -->
    
    <script src="<?= base_url('assets/'); ?>vendorHome/js/main.js"></script>

    <!-- Menyisipkan library Google Maps -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script>
        // fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center:new google.maps.LatLng(-6.265139, 106.872304),
            zoom:9,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</body>

</html>