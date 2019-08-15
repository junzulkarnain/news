 <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="?page=dashboard">Dashboard</a>
          </li>
        </ol>

        <!-- Page Content -->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-newspaper"></i>
                </div>
                <div class="mr-5">Jumlah Artikel</div>
                <h1>
                  <?php 
                    $query_jumlah_artikel = mysqli_query($db,"SELECT id_artikel FROM tbl_artikel"); 
                    $jumlah_artikel = mysqli_num_rows($query_jumlah_artikel);
                    echo $jumlah_artikel;
                   ?>
                </h1>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-users"></i>
                </div>
                <div class="mr-5">Jumlah User</div>
                <?php
                  $query_jml_user = mysqli_query($db,"SELECT COUNT(id_user) AS jml_user FROM tbl_user");
                  $data_jml_user = mysqli_fetch_assoc($query_jml_user);
                ?>
                <h1><?php echo $data_jml_user['jml_user'];?></h1>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left"></span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          </div>
        </div>

      </div>