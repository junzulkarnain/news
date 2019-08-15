 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=kategori">Kategori</a>
          </li>
          <li class="breadcrumb-item active">Daftar Kategori</li>
        </ol>

        <!-- Page Content -->
        <h1>Daftar Katergori</h1>
        <hr>
        
        <a href="#" class="btn btn-flat btn-primary" style="margin-bottom:10px"><span class="fa fa-plus-square"></span> Tambah</a>

        <table class="table table-hover" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kategori</th>
              <th width="10%"><center>Ubah</center></th>
              <th width="10%"><center>Hapus</center></th>
            </tr>
          </thead>
          <tbody>
              <?php   
                    $no     = 1;
                    $sql    = mysqli_query($db,"SELECT * FROM tbl_master_kategori");
                    while ($tampil = mysqli_fetch_array($sql)) {
               ?>
            <tr>
              <td><?php   echo $no++; ?></td>
              <td><?php   echo $tampil['nama_kategori']; ?>
              </td>
              <td><center>
                <a href="#" class="btn btn-success btn-flat"><i class="fa fa-edit"></i></a></center>
              </td>
              <td><center>
                <a href="#" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a></center>
              </td>
            </tr>
            <?php   } ?>
          </tbody>

        </table>

      </div>