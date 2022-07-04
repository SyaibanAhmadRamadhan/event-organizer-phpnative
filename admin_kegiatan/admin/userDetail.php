<?php 

$id=$_GET['id_detail'];
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$user = mysqli_query($koneksi,"SELECT * FROM users WHERE id=$id");
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
<a href="index.php?page=user"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>
    <center><font Size="4">DETAIL DATA USER</font></center><br>
    
    <div class="table-responsive">
    <?php foreach($user as $x){
        $idUser = $x['id'];
        ?>
        <table  class="table table-bordered">
            <tr>
                <th>nama user</th>
                <td><?php echo $x['username'];?></td>
            </tr>
            <tr>
                <th>email user</th>
                <td><?php echo $x['email'];?></td>
            </tr>
            <tr>
                <th>last login user</th>
                <td><?php echo $x['last_login'];?></td>
            </tr>
            <tr>
                <th>last login user</th>
                <td><?php echo $x['status'];?></td>
            </tr>
        </table>
        <?php 
        $daftar = mysqli_query($koneksi,"SELECT * FROM daftar WHERE users_id = $idUser");
        $i =1;
        while ($daftarArray = mysqli_fetch_assoc($daftar)){;
        $idKelas = $daftarArray['kegiatan_id'];
        $idKategoriPeserta = $daftarArray['kategori_peserta_id'];
        $kategori = mysqli_query($koneksi,"SELECT * FROM kategori_peserta WHERE id = $idKategoriPeserta");
        $kategoriArray = mysqli_fetch_assoc($kategori);
        $kegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id = $idKelas");
        $kegiatanArray = mysqli_fetch_assoc($kegiatan);
        ?>
        <center><font Size="3">SEMINAR <?php echo $i ?></font></center><br>
        <table  class="table table-bordered">
            <tr>
                <th>judul seminar</th>
                <td><?php echo $kegiatanArray['judul'];?></td>
            </tr>
            <tr>
                <th>alasan peserta</th>
                <td><?php echo $daftarArray['alasan'];?></td>
            </tr>
            <tr>
                <th>kategori peserta</th>
                <td><?php echo $kategoriArray['nama'];?></td>
            </tr>
            <tr>
                <th>tanggal peserta daftar</th>
                <td><?php echo $daftarArray['tanggal_daftar'];?></td>
            </tr>
        </table>
        <?php $i++?>
        <?php } ?>
<?php } ?>
            

    </div>


</body>
</html>