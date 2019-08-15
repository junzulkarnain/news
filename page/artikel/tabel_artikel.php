 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=artikel">Artikel</a>
          </li>
          <li class="breadcrumb-item active">Daftar Artikel</li>
        </ol>

        <!-- Page Content -->
        <h1>Daftar Artikel</h1>
        <hr>
        
        <a href="?page=artikel&aksi=tambah_artikel" class="btn btn-flat btn-primary" style="margin-bottom:10px"><span class="fa fa-plus-square"></span> Tambah</a>

        <table class="table table-hover" width="100%" id="table">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Tanggal</th>
              <th>Foto</th>
              <th>Kategori</th>
              <th>Status</th>
              <th width="10%"><center>Ubah</center></th>
              <th width="10%"><center>Hapus</center></th>
            </tr>
          </thead>
          <tbody>
              <?php   
                    $no     = 1;
                    $sql    = mysqli_query($db,"SELECT * FROM tbl_artikel, tbl_master_kategori where tbl_artikel.kategori=tbl_master_kategori.id_kategori");
                    while ($tampil = mysqli_fetch_array($sql)) {
               ?>
            <tr>
              <td><?php   echo $no++; ?></td>
              <td><?php   echo $tampil['judul']; ?></td>
              <td><?php   echo $tampil['penulis']; ?></td>
              <td><?php   echo $tampil['tanggal']; ?></td>
              <td>
                <img src="img/artikel/<?php echo $tampil['foto'];?>" height="100px" width="100px">
              </td>
              <td><?php   echo $tampil['nama_kategori']; ?></td>
              <td><?php   echo $tampil['status']; ?></td>
              <td><center>
                <a href="?page=artikel&aksi=ubah_artikel&id=<?php echo $tampil['id_artikel']; ?>" class="btn btn-success btn-flat"><i class="fa fa-edit"></i></a></center>
              </td>
              <td><center>
                <a href="?page=artikel&aksi=hapus_artikel&id=<?php echo $tampil['id_artikel']; ?>" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a></center>
              </td>
            </tr>
            <?php   } ?>
          </tbody>

        </table>

      </div>