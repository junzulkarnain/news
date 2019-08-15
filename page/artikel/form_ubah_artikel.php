
 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Artikel</a>
          </li>
          <li class="breadcrumb-item active">Form Ubah Artikel</li>
        </ol>

        <!-- Page Content -->
        <h1>Ubah Artikel</h1>
        <hr>
    <?php 
        $id   = $_GET['id'];
        $sql  = mysqli_query($db,"SELECT * FROM tbl_artikel WHERE id_artikel='$id'");
        $tampil = mysqli_fetch_assoc($sql);
     ?>
    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group" hidden>
          <label class="control-label col-sm-2">ID Artikel:</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" name="id_artikel" value="<?php echo $tampil['id_artikel'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Judul:</label>
          <div class="col-sm-12">          
            <input type="text" class="form-control" placeholder="Masukan Judul" name="judul" value="<?php echo $tampil['judul'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Penulis:</label>
          <div class="col-sm-12">          
            <input type="text" class="form-control" name="penulis" value="<?php echo $tampil['penulis'] ?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Tanggal:</label>
          <div class="col-sm-12">          
              <input type="text" class="form-control" name="tanggal" value="<?php echo $tampil['tanggal'];?>">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Kategori:</label>
          <div class="col-sm-12">          
              <select name="kategori" class="form-control">
                <?php 
                  $query_kategori = mysqli_query($db," SELECT * FROM tbl_master_kategori");
                  while($tampil_kategori = mysqli_fetch_array($query_kategori)){
                      $pilih = ($tampil_kategori['id_kategori'] == $tampil['kategori']? "selected":"");
                      echo "<option value='$tampil_kategori[id_kategori]' $pilih>$tampil_kategori[nama_kategori]</option>";                 
                  }
                 ?>
              </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Isi:</label>
          <div class="col-sm-12">          
           <textarea name="isi" class="form-control"><?php echo $tampil['isi'] ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2">Status:</label>
          <div class="col-sm-12">          
           <div class="radio">
              <label style="margin-right:50px" ><input  type="radio" name="status" class="form-control" value="aktif" checked>Aktif</label>
              <label><input type="radio" name="status" class="form-control" value="tidak_aktif">Tidak Aktif</label>
          </div>
          </div>
        </div>
        <img src="img/artikel/<?php echo $tampil['foto']?>" height="100px" width="100px">
        <div class="form-group">
          <label class="control-label col-sm-2">Foto:</label>
          <div class="col-sm-12">          
           <input type="file" name="foto">
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
  @$path      = "img/".$foto;
  move_uploaded_file($tmp, $path);

  @$simpan  = $_POST['simpan'];

  if(isset($simpan)) {
    if($foto != null) {
        mysqli_query($db,"UPDATE tbl_artikel SET judul='$judul', penulis='$penulis', tanggal='$tanggal', kategori='$kategori', isi='$isi', status='$status', foto='$foto'WHERE id_artikel='$id'");
        ?>
        <script type="text/javascript">
        alert('Ubah Data Berhasil');
        window.location.href="index.php?page=artikel";
        </script>
     <?php
    }else{
      mysqli_query($db,"UPDATE tbl_artikel SET judul='$judul', penulis='$penulis', tanggal='$tanggal', kategori='$kategori', isi='$isi', status='$status'  WHERE id_artikel='$id'");
     ?>
        <script type="text/javascript">
        alert('Ubah Data Berhasil');
        window.location.href="index.php?page=artikel";
        </script>
     <?php
  }
  }
  ?>
