
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php#hero" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>X-Tech</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if(isset($_SESSION['id_user'])) { ?>
            <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#pricing">Kelas</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="pesanan.php"><?php echo $_SESSION['username']?></a></li>
          <li><a class="getstarted scrollto" href="./logout.php">logout</a></li>
          <?php } elseif (isset($_SESSION['admin'])) { ?>
            <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#pricing">Kelas</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="./admin_kegiatan/admin/index.php">Hal Admin</a></li>
            <li><a class="getstarted scrollto" href="logout.php">logout</a></li>
            <?php } else { ?>
              <li><a class="nav-link scrollto active" href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#pricing">Kelas</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#blog">Blog</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
            <li><a class="getstarted scrollto" href="login.php">login</a></li>
            <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>