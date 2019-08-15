
 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?page=dashboard">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="?page=artikel">Artikel</a></li>
          <li class="breadcrumb-item active">Form Tambah Artikel</li>
        </ol>

        <!-- Page Content -->
        <h1>Tambah Artikel</h1>
        <hr>
       
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" hidden>
          <label class="control-label col-sm-2">ID Artikel:</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="id_artikel" placeholder="Enter ID Artikel">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Judul:</label>
          <div class="col-sm-12">          
            <input type="text" class="form-control" placeholder="Masukan Judul" name="judul" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Penulis:</label>
          <div class="col-sm-12">          
            <input type="text" class="form-control" placeholder="Masukan Penulis" name="penulis" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Tanggal:</label>
          <div class="col-sm-12">
              <?php
                $tgl_sekarang = date("Y-m-d");
              ?>          
              <input type="date" class="form-control" name="tanggal">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Kategori:</label>
          <div class="col-sm-12">          
              <select name="kategori" class="form-control" required>
                <option value="">Pilih Kategori</option>
                <?php 
                  $query_kategori = mysqli_query($db," SELECT * FROM tbl_master_kategori");
                  while ($tampil_kategori = mysqli_fetch_array($query_kategori)) {?>
                  <option value="<?=$tampil_kategori[0]?>"><?php echo $tampil_kategori[1]?></option>
                  <?php
                  }
                 ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Isi:</label>
          <div class="col-sm-12">          
           <textarea name="isi" class="form-control" required></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Status:</label>
          <div class="col-sm-12">          
             <div class="radio">
                <label style="margin-right:50px" ><input type="radio" name="status" class="form-control" value="aktif" checked>Aktif</label>
                <label><input type="radio" name="status" class="form-control" value="tidak_aktif">Tidak Aktif</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Foto:</label>
          <div class="col-sm-12">          
           <input type="file" name="foto" required>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
          </div>
        </div>
  </form>

      </div>

<?php 
  @$id       = $_POST['id_artikel'];
  @$judul    = $_POST['judul'];
  @$penulis  = $_POST['penulis'];
  @$kategori = $_POST['kategori'];
  @$isi      = $_POST['isi'];
  @$tanggal  = $_POST['tanggal'];
  @$status   = $_POST['status'];

  @$foto      = $_FILES['foto']['name'];
  @$tmp       = $_FILES['foto']['tmp_name'];
  @$file_ext  = strtolower(end(explode('.',$foto)));
  
  @$path      = "img/artikel/".$foto;
  move_uploaded_file($tmp, $path);


  @$simpan  = $_POST['simpan'];
  if (isset($simpan )) {
     mysqli_query($db,"INSERT INTO tbl_artikel VALUES ('$id', '$judul', '$penulis', '$tanggal', '$kategori', '$isi', '$status', '$foto')"); 
     ?>
        <script type="text/javascript">
        alert('Tambah Data Berhasil');
        window.location.href="index.php?page=artikel";
        </script>
     <?php
  }


 ?>