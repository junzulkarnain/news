<?php 
  include "koneksi.php";
  @$username = $_POST['username'];
  @$password = $_POST['password'];

        $sql      = mysqli_query($db,"SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
        $cek      = mysqli_num_rows($sql);
        $data     = mysqli_fetch_assoc($sql);

        if ($cek > 0) {
          session_start();
          $_SESSION['status']     = "login";
          $_SESSION['username']   = $data['username']; 
          $_SESSION['level']      = $data['level'];
          ?>
              <script type="text/javascript">
                  alert('Login Berhasil');
                  window.location.href="index.php";
              </script>
          <?php
        }else{
          ?>
              <script type="text/javascript">
                  alert('Login Gagal');
                  window.location.href="login.php";
              </script>
          <?php
        }
 ?>