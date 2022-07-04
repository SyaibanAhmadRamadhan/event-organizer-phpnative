<?php
$id_admin = $_SESSION['admin'];
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

function data($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $sepeda=[];
    while ($array = mysqli_fetch_assoc($result) ){
        $sepeda[] = $array;
    }    
    return $sepeda;
}
$jumlahdataperhalaman = 5;
$jumlahdata = count(data("SELECT * FROM users WHERE role = 'public' "));
$jumlahhalaman = ceil($jumlahdata / $jumlahdataperhalaman);
$halamanaktif = (isset($_GET['hal'])) ? $_GET['hal'] :1;
$awaldata = ( $jumlahdataperhalaman * $halamanaktif ) - $jumlahdataperhalaman;
$user = data("SELECT * FROM users WHERE role = 'administrator' && status = 'not login' LIMIT $awaldata, $jumlahdataperhalaman");



// if(isset($_POST['cari'])){
//     $kegiatan = cari($_POST['keyword']);

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
<h3> <i class="fa fa-bicycle mr-3"> </i>DATA USER</i></h3><hr> 
        <!-- <right><a href="index.php?page=tambah"><button class="btn btn-dark right">Tambah Data</button></a> -->
        <div class="pull-left">
        <form action='' method="post" align="right" >
            <input type="text" name="keyword" id="keyword" placeholder="search..." autocomplete="off" >
           <img src="../assets/images/loading_icon.gif" class='loader'>
        </form>
        </div>
<div class="pull-right">
  <a href="?page=admin" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
</div>


        <!-- <a href='tambah.php'>tambah</a> -->
        
        <div class="table-responsive">
        <div id="container">
        <table  class="table table-striped jambo_table bulk_action">
            <thead>
                <tr>
                    <th width="36"style="text-align:center">No</th>
                    <th width="145" style="text-align:center">nama</th>
                    <th width="160" style="text-align:center">email</th>
                    <th width="130" style="text-align:center">last login</th>
                    <th width="200" style="text-align:center">fitur</th>
                </tr>
            </thead>

            <?php if (empty($user)){?>
                <tr>
                    <td colspan="7">
                        <p>tidak ada data</p>
                    </td>
                </tr>
            <?php }?>

            <tbody>
                <?php $i =1;?>
                <?php foreach($user as $x){?>
                    <tr>
                        <td width="45"  height="1" style="text-align:center"><?php echo $i + $awaldata;?></td>
                        <td width="232"style="text-align:center"><?php echo $x['nama'];?></td>
                        <td width="258"style="text-align:center"><?php echo $x['email'];?></td>
                       
                        <td width="208"style="text-align:center"><?php echo $x['last_login'];?></td>
                        <td width="305"style="text-align:center">
                            <!-- <a href="detail.php?id=<?php echo $x['id'];?>" class='btn btn-secondary btn-sm'>detail</a> -->
                            <a href="index.php?page=adminDetail&id_detail=<?php echo $x['id'];?>" class="btn btn-primary p-1">Detail</a>|
                            <a href="index.php?page=ubahAdmin&id=<?php echo $x['id'];?>"class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square p-1.5" data-toggle="tooltip" title="Edit Data"></i></a>
                            
                        </td>
                    </tr>
                    <?php $i++;?>
                <?php }?>
            </tbody>
        </table>
        <div class="pull-right ">
        <div class="pagination">
        <?php if ($halamanaktif > 1) :?>
    <a href='?page=kegiatan&hal=<?php echo $halamanaktif - 1;?>'>&laquo;</a>
<?php endif; ?>

<?php for ( $i = 1 ; $i<=$jumlahhalaman ; $i++ ) :?>
    <?php if ($i == $halamanaktif ):?>
        <a href='index.php?page=kegiatan&hal=<?php echo $i?>' class="active"><?php echo $i;?></a>
    <?php else:?>
        <a href='index.php?page=kegiatan&hal=<?php echo $i?>'><?php echo $i;?></a>
    <?php endif; ?>
<?php endfor; ?>

<?php if ($halamanaktif < $jumlahhalaman) : ?>
    <a href='index.php?page=kegiatan&hal=<?php echo $halamanaktif + 1;?>'>&raquo;</a>
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

