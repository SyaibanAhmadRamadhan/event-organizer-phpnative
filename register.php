<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

if(isset($_POST['submit'])){
  $username = ($_POST['username']);
    $email = ($_POST['email']);
    $password = ($_POST['password']);
    $password2 = ($_POST['password2']);

    $usernameQuery = mysqli_query($koneksi,"SELECT * FROM users WHERE email = '$email' ");
    if (mysqli_num_rows($usernameQuery)>0){
      echo "<script>alert('email sudah tersedia');
        document.location.href='register.php'</script>";
        exit;
    }

    if ($password != $password2) {
      echo "<script>alert('repassword tidak sesuai');
        document.location.href='register.php'</script>";
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query ($koneksi,"INSERT INTO users (id,username,email,role,password,created_at,status)VALUES('','$username','$email','public','$passwordHash',current_timestamp,1)");
    echo "<script>
    alert('pendaftaran berhasil');
    document.location.href='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>X-Tech</title>

      <!-- Favicons -->
      <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
  <br>
  <br>
  <br>
  <div class="row justify-content-md-center">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Registrasi</b>User</a>
  </div>

  <form action="" method="post">
    <div class="form-group row">
      <label for="nama" class="col-4 col-form-label">username</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-address-book"></i>
            </div>
          </div> 
          <input id="nama" name="username" type="text" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-4 col-form-label">Email</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-envelope"></i>
            </div>
          </div> 
          <input id="email" name="email" type="text" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="lock" class="col-4 col-form-label">Password</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-lock"></i>
            </div>
          </div> 
          <input  type="password" name="password"class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="lock" class="col-4 col-form-label">Cek Password</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-lock"></i>
            </div>
          </div> 
          <input  type="password" name="password2"class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
        </div>
      </div>
    </div> 
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" href="index.php"  class="btn btn-primary">Daftar</button>
      </div>
    </div>
    <a href="login.php" class="text-center">Sudah memiliki akun</a>
  </div>
  </form>
         

      
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
