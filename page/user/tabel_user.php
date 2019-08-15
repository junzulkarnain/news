 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=artikel">Artikel</a>
          </li>
          <li class="breadcrumb-item active">Daftar User</li>
        </ol>

        <!-- Page Content -->
        <h1>Daftar User</h1>
        <hr>
        
        <a href="?page=user&aksi=tambah_user" class="btn btn-flat btn-primary" style="margin-bottom:10px">Tambah</a>

        <table class="table table-hover" width="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Password</th>
              <th>Level</th>
              <th width="15%"><center>Aksi</center></th>
            </tr>
          </thead>
          <tbody>
              <?php   
                    $no     = 1;
                    $sql    = mysqli_query($db,"SELECT * FROM tbl_user");
                    while ($tampil = mysqli_fetch_array($sql)) {
               ?>
            <tr>
              <td><?php   echo $no++; ?></td>
              <td><?php   echo $tampil['username']; ?></td>
              <td><?php   echo $tampil['password']; ?></td>
              <td><?php   echo $tampil['level']; ?></td>
              <td>
                <a href="" class="btn btn-success btn-flat">Ubah</a>
                <a href="?page=user&aksi=hapus_user&id=<?=$tampil['id_user']?>" class="btn btn-danger btn-flat">Hapus</a>
              </td>
            </tr>
            <?php   } ?>
          </tbody>

        </table>

      </div>