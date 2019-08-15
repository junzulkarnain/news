<?php
session_start();
session_destroy();
?> 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>News - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="" style="background-image: url('img/bg-login.jpg'); width:100%">

  <div class="container">
    
    <div class="card card-login mx-auto mt-5">
    <div align="center" style="margin-top:20px;">
      <img src="img/logo2.png" width="250px">
    </div>
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="POST" action="login_aksi.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="" class="form-control" required="required" autofocus="autofocus" name="username">
              <label for="">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="" class="form-control"  required="required" name="password">
              <label for="">Password</label>
            </div>
          </div>
          
          <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
        </form>
        
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>


