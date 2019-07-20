

     <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

            <div class="col-md-12 col-sm-12">
               <form method="POST" action="<?php echo site_url('email/kirim_email') ?>">
                <div class="form-group">   
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" value="" placeholder="Nama Anda" required class="form-control"/>
                </div>
                <div class="form-group">   
                    <label for="email">Email</label>
                    <input type="email" name="email" value="" placeholder="xxx@gmail.com" required class="form-control"/>
                </div>
                <div class="form-group">   
                    <label for="subjek">Subjek</label>
                    <textarea name="pesan" required placeholder="Pesan" class="form-control"></textarea>
                </div>
                 <div class="form-group">   
                     <input type="submit" value="Kirim" />
                </div>
                 
              </form>
         </div>
        </div>
        <!-- ./container-fluid -->
      <!-- End of Main Content -->

 


 
