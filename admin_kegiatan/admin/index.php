<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location:../index.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    .position{
      position:fixed;
    }
    </style>
    <title>Nusantara E-bike store</title>
    <link rel="icon" href="../assets/images/sepeda.jpg" type="image/ico" />

    <!-- Bootstrap -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->
    <link href="../assets/nprogress/nprogress.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="../assets/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../assets/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md  bg-dark">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col ">
          <div class="left_col scroll-view bg-dark">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix bg-dark">
              <a href="index.php?page=profile">
                <div class="profile_pic">
                  <img src="../img/admin/625c4a0e1ebea.jpg" alt="..." class="img-circle profile_img">
                </div>
              </a>
              <a href="index.php?page=profile">
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2><?php echo $_SESSION['username_admin'];?></h2>
                </div>
              </a>
            </div>
</br>
            <!-- /menu profile quick info -->

             <!-- sidebar menu -->
             <div id="sidebar-menu" class="main_menu_side hidden-print main_menu bg-dark">
              <div class="menu_section">
                <ul class="nav side-menu ">
                <li> <a href="index.php?page=dashboard"> <i class="fa fa-dashboard"></i> Dashboard <span class="fa fa-chevron"> </span> </a> </li>
                  <li> <a href="index.php?page=home"> <i class="fa fa-building"></i> Company Profile <span class="fa fa-chevron"> </span> </a> </li>
                  <li> <a href="javascript:void(0)"><i class="fa fa-bicycle"> </i> Barang <span class="fa fa-chevron-down"> </span ></a> 
                    <ul class="nav child_menu">
                      <li> <a href="index.php?page=kegiatan"> halaman kegiatan </a> </li>
                      <li> <a href="index.php?page=tambahKegiatan"> Tambah kegiatan </a> </li>
                    </ul>
                  </li>
                  <li> <a href="javascript:void(0)"><i class="fa fa-bicycle"> </i> pesanan <span class="fa fa-chevron-down"> </span ></a> 
                    <ul class="nav child_menu">
                      <li> <a href="index.php?page=pesanan"> pesanan </a> </li>
                    </ul>
                  </li>
                  
                  <li> <a href="index.php?page=profile"> <i class="fa fa-user"></i>Profile <?php echo $_SESSION['username_admin'];?> <span class="fa fa-chevron"> </span> </a> </li> 
                </ul>
              </div>
            </div>
          </div>
        </div>
            <!-- /sidebar menu -->

     <!-- top navigation -->
     <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" >
                <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="../img/admin/625c4a0e1ebea.jpg" alt=""><?php echo $_SESSION['username_admin'];?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item"  href="index.php?page=profile"> <i class="fa fa-user pull-right"></i> PROFILE</a>
                  <!-- <a class="dropdown-item"  href="index.php?page=register"><i class="fa fa-registered pull-right"></i> REGISTER</a> -->
                  <a class="dropdown-item"  href="../../index.php"><i class="fa fa-sign-out pull-right"></i> HALAMAN PENJUALAN</a>
                  <a class="dropdown-item"  href="../../logout.php"><i class="fa fa-sign-out pull-right"></i> LOG OUT</a>
                </div>
              </li>
            </ul>
          </nav>
         </div>
       </div>
        <!-- /top navigation -->

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
          <?php
          // var_dump($sepeda);
          
            //$query = array();
            //parse_str($_SERVER['QUERY_STRING'], $query);
            error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
            //$id =$_GET['page'];
            $page = $_GET["page"];
            switch ($page) {
      	      case 'ubahKegiatan':
                if(isset($_GET["page"]))
                {
                    $id=$_GET["id"];
                    include 'ubahKegiatan.php';
                }
      		      break;

                case 'ubahPesanan':
                  if(isset($_GET["page"]))
                  {
                      $id=$_GET["id"];
                      include 'ubahPesanan.php';
                  }
                  break;

              case 'detailKegiatan':
                if(isset($_GET['page']))
                {
                  $id = $_GET['id_detail'];
                  include 'detailKegiatan.php';
                }
                break;
              case 'detailDaftarKegiatan':
                if(isset($_GET['page']))
                {
                  $id = $_GET['id_detail'];
                  include 'detailDaftarKegiatan.php';
                }
                break;
              case 'kegiatan':
                include 'kegiatan.php';
                break;
              case 'profile':
                include 'tampil/profile.php';
                break;
                case 'admin':
                  include 'tampil/admin.php';
                  break;
      	      case 'tambahKegiatan':
      		      include 'tambahKegiatan.php';
      		      break;
              case 'pesanan';
                include 'daftarKegiatan.php';
                break;
              case 'pesanandibatalkan';
                include 'crud/pesanandibatalkan.php';
                break;
              case 'dashboard':
                include 'dashboard.php';
                break;
              case 'register':
                include 'form/register.php';
                break;
                
              case 'datadiri':
          		  # code...
                include 'form/datadiri.php';
                break;
              case 'home':
                # code...
                include 'tampil/profileperusahaan.php';
                break;
              default:
		            #code...
		            include 'dashboard.php';
		            break;

            }
           
            
          ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            Copyright @ 2022 Toko sepeda
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
          <!-- </div> -->
    </div>

    <!-- jQuery -->
    <script src="../assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../assets/js/custom.min.js"></script>
</body>
</html>