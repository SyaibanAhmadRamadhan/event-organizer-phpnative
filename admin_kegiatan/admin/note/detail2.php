<?php
include 'config.php';
$sepeda = data("SELECT * FROM sepeda");

// $sepeda = cari($_GET['keyword']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>admin</title>
    
    <style>
    .tab {
    display: inline-block;
    margin-left: 300px;
    }
    </style>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
        <img src="../assets/images/user.png" alt="..." class="img-circle profile_img" width="30">
            <a class="navbar-brand " href="" > Hello, Admin</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <span class="tab"></span><p class="navbar-brand " href="" > DETAIL DATA</p>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php?page=sepeda">data sepeda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->
    
    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <a href="index.php?page=tambah" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</a>
                <!-- <a href="export.php" target="_blank" class="btn btn-success ms-1"><i class="bi bi-file-earmark-spreadsheet-fill"></i>&nbsp;Ekspor ke Excel</a> -->
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action" style="width:100% ; weight: 1000px;"  id="data" >
                <thead class="table-dark">
                  <tr>
                    <th style="text-align:center">No</th>
                    <th style="text-align:center">Gambar</th>
                    <th style="text-align:center">Kode Barang</th>
                    <th style="text-align:center">Name</th>
                    <th style="text-align:center">Stock</th>
                    <th style="text-align:center">Harga</th>
                    <th style="text-align:center">Suplier</th>
                    <th style="text-align:center">tanggal Masuk</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $i = 1;?>
                  <?php foreach($sepeda as $x){?>
                  <tr>
                    <td style="text-align:center" width="50"><?php echo $i;?></td>
                    <td style="text-align:center"><img src='../img/<?php echo $x ["gambar"];?>' width="70"><br><?php echo $x['gambar'];?></td>
                    <td style="text-align:center"> <?php echo $x ["kode"];?> </td>
                    <td style="text-align:center"> <?php echo $x ["name"];?> </td>
                    <td style="text-align:center"> <?php echo $x ["stock"];?> Pcs </td>
                    <td style="text-align:center"><?php echo $x ["price"];?> </td>
                    <td style="text-align:center"> <?php echo $x ["suplier"];?> </td>
                    <td style="text-align:center"> <?php echo $x ["tgl_masuk"];?> </td>
                  </tr>
                  <?php $i++;?>
                  <?php }; ?> 
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
      <!-- Close Container -->

    
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Fungsi Table
            $('#data').DataTable();
            // Fungsi Table
        });
    </script>
  </body>
</html>