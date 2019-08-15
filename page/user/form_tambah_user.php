
 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Artikel</a>
          </li>
          <li class="breadcrumb-item active">Form Tambah Artikel</li>
        </ol>

        <!-- Page Content -->
        <h1>Tambah Artikel</h1>
        <hr>
       
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
          <label class="control-label col-sm-2">ID Artikel:</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="id_artikel" placeholder="Enter ID Artikel">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Judul:</label>
          <div class="col-sm-12">          
            <input type="text" class="form-control" placeholder="Masukan Judul" name="judul">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Penulis:</label>
          <div class="col-sm-12">          
            <input type="text" class="form-control" placeholder="Masukan Penulis" name="penulis">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Tanggal:</label>
          <div class="col-sm-12">          
            <input type="date" class="form-control" name="tanggal">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Isi:</label>
          <div class="col-sm-12">          
           <textarea name="isi" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
          </div>
        </div>
  </form>

      </div>

<?php 
  @$id       = $_POST['id_artikel'];
  @$judul    = $_POST['judul'];
  @$penulis  = $_POST['penulis'];
  @$isi      = $_POST['isi'];
  @$tanggal  = $_POST['tanggal'];

  @$simpan  = $_POST['simpan'];

  if (isset($simpan )) {
     mysqli_query($db,"INSERT INTO artikel (id_artikel, judul,penulis, tanggal, isi) VALUES ('$id', '$judul', '$penulis', '$tanggal', '$isi')");
  }

 ?>