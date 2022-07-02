<?php 
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

if (isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $usernameQuery = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email' && role = 'public'");
  if (mysqli_num_rows($usernameQuery)>0){
    $usernameArray = mysqli_fetch_assoc($usernameQuery);
    if (password_verify($password,$usernameArray['password'])){
        $_SESSION['id_user']=$usernameArray['id'];
        $_SESSION['email']=$email;
        $_SESSION['username']=$usernameArray['username'];
        $_SESSION['login']=true;
        $updateUser = mysqli_query($koneksi,'UPDATE users SET last_login = current_timestamp');
        header("Location:index.php");
        exit;
    }else {
      echo "<script>alert('password tidak sama');
      document.location.href='register.php'</script>";
      exit;
    }
  }else {
    echo "<script>alert('username tidak tersedia');
  document.location.href='register.php'</script>";
  exit;
  }
  $hariini = date();
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
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Masuk sebagai siswa</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sudah punya akun X-tech? Yuk masuk untuk mengakses beragam fitur X-Tech</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="email" id="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password"class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button name="login"type="submit" href="index.php" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="register.php" class="text-center">Daftar sebagai pengguna baru</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
