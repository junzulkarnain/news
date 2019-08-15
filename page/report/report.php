 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Report</li>
        </ol>

        <!-- Page Content -->
        <h1>Report</h1>
        <hr>
        
        <form method="POST">
          <div class="row
          ">
            <div class="col-md-2">
              <label>Start Date</label>
              <input class="form-control" type="date" name="date1" />
            </div>
            <div class="col-md-2">
              <label>Finish Date</label>
              <input class="form-control" type="date" name="date2" />
            </div>
            <div class="col-md-2">
              <input style="margin-top:30px" class="btn btn-info" type="submit" name="cari" value="Cari"/>
            </div>
            <div class="col-md-6"></div>
          </div>         
        </form>
        <?php 
          @$date1   = $_POST['date1'];
          @$date2   = $_POST['date2'];
          @$cari    = $_POST['cari'];

          if (isset($cari)) {
            $sql    = mysqli_query($db,"SELECT  COUNT(tbl_artikel.id_artikel) AS jml, tbl_master_kategori.nama_kategori
            FROM tbl_artikel 
            LEFT JOIN tbl_master_kategori
            ON tbl_artikel.kategori=tbl_master_kategori.id_kategori
            WHERE tbl_artikel.tanggal 
            BETWEEN '$date1' AND '$date2' 
            GROUP BY tbl_artikel.kategori");
          }else{
            $sql    = mysqli_query($db,"SELECT  COUNT(tbl_artikel.id_artikel) AS jml, tbl_master_kategori.nama_kategori
            FROM tbl_artikel 
            LEFT JOIN tbl_master_kategori
            ON tbl_artikel.kategori=tbl_master_kategori.id_kategori
            GROUP BY tbl_artikel.kategori");
          }
        ?>

        <h4 style="margin-top:5px">Laporan Jumlah Berita</h4>
        <h6>Periode: <?php echo $date1; ?> - <?php echo $date2; ?></h6>
        <table class="table table-hover" width="100%" id="" >
          <thead>
            <tr>
              <th>No</th>
              <th>Kategori</th>
              <th>Jumlah Berita</th>
            </tr>
          </thead>
          <tbody>
              <?php   
                    $no     = 1;
                    while ($tampil = mysqli_fetch_assoc($sql)) {
               ?>
            <tr>
              <td><?php   echo $no++; ?></td>
              <td><?php   echo $tampil['nama_kategori']; ?></td>
              <td><?php   echo $tampil['jml']; ?></td>
            </tr>
            <?php   } ?>
          </tbody>

        </table>

      </div>
      