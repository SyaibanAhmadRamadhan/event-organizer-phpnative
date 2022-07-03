<?php
include 'config.php';
$id_admin = $_SESSION['id_admin'];
// pagination
// config
$jumlahdataperhalaman = 5;
$jumlahdata = count(data("SELECT * FROM sepeda"));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET['hal'])) ? $_GET['hal'] :1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;

$sepeda = data("SELECT * FROM pembeli WHERE id_admin=$id_admin && status='pending' LIMIT $awaldata, $jumlahdataperhalaman");

// if(isset($_POST['cari'])){
//     $sepeda = cari($_POST['keyword']);

// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
   <style>
.pagination {
  display: inline-block;
  right: 230;
  
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
  font-size: 15px;
  
}

.pagination a.active {
  background-color: pink;
  color: white;
  border: 1px solid #4CAF50;
}

.pagination a:hover:not(.active) {
    background-color: #ddd;
}



.loader{
    width: 70px;
    position: absolute;
    top:125px;
    left:420px;
    display:none;
    
    
}
</style>
</head>
<body>
<h3> <i class="fa fa-bicycle mr-3"> </i>DATA SEPEDA</i></h3><hr> 
        <!-- <right><a href="index.php?page=tambah"><button class="btn btn-dark right">Tambah Data</button></a> -->
        <div class="pull-left">
        <form action='' method="post" align="right" >
            <input type="text" name="keyword" id="keyword" placeholder="search..." autocomplete="off" >
           <img src="../assets/images/loading_icon.gif" class='loader'>
        </form>
        </div>
<div class="pull-right">
  <a href="?page=pesanan" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
  <!-- <a href="?page=pesanandibatalkan" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Pesanan Dibatalkan</a> -->
</div>


        <!-- <a href='tambah.php'>tambah</a> -->
        
        <div class="table-responsive">
        <div id="container">
        <table  class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th style="text-align:center">No</th>
                    <th  style="text-align:center">nama</th>
                    <th  style="text-align:center">no_hp</th>
                    <th  style="text-align:center">tanggal pesanan</th>
                    <th  style="text-align:center">pesanan</th>
                    <th style="text-align:center">ekspedisi</th>
                    <th style="text-align:center">alamat</th>
                    <th style="text-align:center">Harga</th>
                    <th style="text-align:center">status</th>
                </tr>
            </thead>

            <?php if (empty($sepeda)){?>
                <tr>
                    <td colspan="7">
                        <p>tidak ada data</p>
                    </td>
                </tr>
            <?php }?>

            <tbody>
                <?php $i =1;?>
                <?php foreach($sepeda as $x){?>
                    <tr>
                        <td style="text-align:center"><?php echo $i + $awaldata;?></td>
                        <td style="text-align:center"><?php echo $x['nama'];?></td>
                        <td style="text-align:center"><?php echo $x['no_hp'];?></td>
                       
                        <td style="text-align:center"><?php echo $x['date'];?></td>
                        <td style="text-align:center"><?php echo $x['produk'];?></td>
                        <td style="text-align:center"><?php echo $x['ekspedisi'];?>, <?php echo $x['paket_ekspedisi'];?></td>
                        <td style="text-align:center"><?php echo $x['provinsi'].', '.$x['kota_kabupaten'].', '.$x['kode_pos'];?></td>
                        <td style="text-align:center">Rp. <?php echo number_format($x['totalharga']);?></td>
                        <td style="text-align:center"><?php echo $x['status'];?></td>
                        <!-- <td style="text-align:center"> -->
                            <!-- <a href="detail.php?id=<?php echo $x['id'];?>" class='btn btn-secondary btn-sm'>detail</a> -->
                            <!-- <a href="index.php?page=detail&id_detail=<?php echo $x['id'];?>" class="btn btn-primary p-1">Detail</a>| -->
                            <!-- <a href="index.php?page=ubah&id=<?php echo $x['id'];?>"class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square p-1.5" data-toggle="tooltip" title="Edit Data"></i></a>| -->
                            <!-- <a href="crud/hapus.php?id=<?php echo $x['id'];?>"class="btn btn-danger btn-sm" onclick="return confirm('apakah anda ingin menghapus <?php echo $x['name'];?>')";><i class="fa-solid fa-trash-can p-1.5" data-toggle="tooltip" title="Hapus Data"></i></a> -->
                            
                        <!-- </td> -->
                    </tr>
                    <?php $i++;?>
                <?php }?>
            </tbody>
        </table>
        <div class="pull-right ">
        <div class="pagination">
        <?php if ($halamanaktif > 1) :?>
    <a href='?page=sepeda&hal=<?php echo $halamanaktif - 1;?>'>&laquo;</a>
<?php endif; ?>

<?php for ( $i = 1 ; $i<=$jumlahhalaman ; $i++ ) :?>
    <?php if ($i == $halamanaktif ):?>
        <a href='index.php?page=sepeda&hal=<?php echo $i?>' class="active"><?php echo $i;?></a>
    <?php else:?>
        <a href='index.php?page=sepeda&hal=<?php echo $i?>'><?php echo $i;?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href='index.php?page=sepeda&hal=<?php echo $halamanaktif + 1;?>'>&raquo;</a>
<?php endif; ?>
</div>
</div>
                </div>
    </div>
</div>
<script src="../assets/jquery331/jquery-3.3.1.min.js"></script>
<script src="method/search.js"></script>
</body>
</html>

