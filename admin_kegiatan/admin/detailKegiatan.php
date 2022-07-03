<?php 

$id=$_GET['id_detail'];
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$kegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id=$id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <style>
        .buton {
    float: right;
    display: block;
}
</style>
</head>
<body>
<div class="buton">
<a href="index.php?page=kegiatan"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>
    <center><font Size="4">DETAIL DATA</font></center><br>
    
    <div class="table-responsive">
    <?php foreach($kegiatan as $x){?>
        <table  class="table table-bordered">
            <tr align="center">
                <td colspan="3"><img src='../../assets/imgKegiatanDariDatabase/<?php echo $x['foto_flyer'];?>' width="200"></td>    
            </tr>

            <tr>
                <th>judul seminar</th>
                <td><?php echo $x['judul'];?></td>
            </tr>
            
            <tr>
                <th>kapasitas seminar</th>
                <td><?php echo $x['kapasitas'];?></td>
            </tr>

            <tr>
                <th>tanggal seminar</th>
                <td><?php echo $x['tanggal'];?></td>
            </tr>

            <tr>
                <th>Harga seminar</th>
                <td><?php echo $x['harga_tiket'];?></td>
            </tr>

            <tr>
                <th>tanggal kegiatan seminar</th>
                <td><?php echo $x['narasumber'];?></td>
            </tr>

            <tr>
                <th>tempat seminar</th>
                <td><?php echo $x['tempat'];?></td>
            </tr>
            <tr>
                <th>mc seminar</th>
                <td><?php echo $x['pic'];?></td>
            </tr>
            <tr>
                <th>deskripsi seminar</th>
                <td><?php echo $x['deskripsi'];?></td>
            </tr>
            <?php $idKelas = $x['jenis_id'] ;
            $jenisKegiatan = mysqli_query($koneksi,"SELECT * FROM jenis_kegiatan WHERE id = $idKelas");
            $jenisKegiatanArray = mysqli_fetch_assoc($jenisKegiatan);
            ?>
            <tr>
                <th>jenis seminar</th>
                <td><?php echo $jenisKegiatanArray['nama'];?></td>
            </tr>
<?php } ?>
            
</table>
    </div>


</body>
</html>