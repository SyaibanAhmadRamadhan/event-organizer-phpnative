<?php 

$id=$_GET['id_detail'];
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$daftar = mysqli_query($koneksi,"SELECT * FROM daftar WHERE id=$id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta content="" name="description">

<meta content="" name="keywords">

<!-- Favicons -->
<link href="../../assets/img/logo.png" rel="icon">
<link href="../../assets/img/logo.png" rel="apple-touch-icon">
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
<a href="index.php?page=pesanan"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>
    <center><font Size="4">DETAIL DATA PESERTA</font></center><br>
    
    <div class="table-responsive">
    <?php foreach($daftar as $x){
        $idKelas = $x['kegiatan_id'];
        $idKategoriPeserta = $x['kategori_peserta_id'];
        $idUser = $x['users_id'];
        $user = mysqli_query($koneksi,"SELECT * FROM users WHERE id = $idUser");
        $userArray = mysqli_fetch_assoc($user);
        $kategoriPeserta = mysqli_query($koneksi,"SELECT * FROM kategori_peserta WHERE id = $idKategoriPeserta");
        $kategoriPesertaArray = mysqli_fetch_assoc($kategoriPeserta);
        $kegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan WHERE id = $idKelas");
        $kegiatanArray = mysqli_fetch_assoc($kegiatan);
        $IDjenisKegiatan = $kegiatanArray['jenis_id'];
        $jenisKegiatanQuery = mysqli_query($koneksi,"SELECT * FROM jenis_kegiatan WHERE id = $IDjenisKegiatan");
        $jenisKegiatanArray = mysqli_fetch_assoc($jenisKegiatanQuery);
        ?>
        <table  class="table table-bordered">
            <tr align="center">
                <td colspan="3"><img src='../../assets/imgKegiatanDariDatabase/<?php echo $kegiatanArray['foto_flyer'];?>' width="200"></td>    
            </tr>

            <tr>
                <th>nama peserta</th>
                <td><?php echo $userArray['username'];?></td>
            </tr>
            
            <tr>
                <th>email peserta</th>
                <td><?php echo $userArray['email'];?></td>
            </tr>

            <tr>
                <th>kategori peserta</th>
                <td><?php echo $kategoriPesertaArray['nama'];?></td>
            </tr>

            <tr>
                <th>judul seminar</th>
                <td><?php echo $kegiatanArray['judul'];?></td>
            </tr>

            <tr>
                <th>narasumber seminar</th>
                <td><?php echo $kegiatanArray['narasumber'];?></td>
            </tr>

            <tr>
                <th>pembawa acara seminar</th>
                <td><?php echo $kegiatanArray['pic'];?></td>
            </tr>
            <tr>
                <th>jenis seminar</th>
                <td><?php echo $jenisKegiatanArray['nama'];?></td>
            </tr>
            <tr>
                <th>tanggal pelaksana seminar</th>
                <td><?php echo $kegiatanArray['tanggal'];?></td>
            </tr>
            <tr>
                <th>tanggal pemesanan</th>
                <td><?php echo $x['tanggal_daftar'];?></td>
            </tr>

            <tr>
                <th>alasan</th>
                <td><?php echo $x['alasan'];?></td>
            </tr>
<?php } ?>
            
</table>
    </div>


</body>
</html>