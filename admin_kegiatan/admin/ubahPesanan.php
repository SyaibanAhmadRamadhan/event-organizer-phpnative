<?php 
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

$id=$_GET["id"];

if(isset($_POST["submit"])){
    $id=$_GET["id"];
    $judul = $_POST['judulSeminar'];
    $kategoriPeserta = $_POST['kategoriPeserta'];
    $alasan = $_POST["alasan"];

    $update = mysqli_query($koneksi,"UPDATE daftar SET 
    kegiatan_id='$judul',
    kategori_peserta_id='$kategoriPeserta',
    alasan = $alasan WHERE id = $id");

    if ($update) {
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href='index.php?page=pesanan';
            </script>";
    }



}
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
<h3> <i class="fa-solid fa-pen-to-square mr-3"></i> edit data</i></h3><hr> 
            
           <?php    $daftar = mysqli_query($koneksi,"SELECT * FROM daftar WHERE id='$id'");
                    $daftarArray = mysqli_fetch_assoc($daftar);
                    $idKegiatan = $daftarArray['kegiatan_id'];
                    $idUsersDaftar = $daftarArray['kategori_peserta_id'];
                    $users = mysqli_query($koneksi,"SELECT * FROM kategori_peserta WHERE id = $idUsersDaftar ");
                    $userArray = mysqli_fetch_assoc($users);
                    $kegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id = $idKegiatan");
                    $kegiatanArray = mysqli_fetch_assoc($kegiatan);?>
                <form method="post" action=""enctype="multipart/form-data" >
                    
                <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">alasan peserta</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="alasan" required="required" value="<?= $daftarArray['alasan']?>" >
                        </div>
                    </div>

                <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">kategori peserta</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="kategoriPeserta"  required ><br>
                                <option value= <?= $userArray['id'] ?>><?= $userArray['nama']?></option>
                                <?php $kategoriPesertaLooping = mysqli_query($koneksi,"SELECT * FROM kategori_peserta");
                                while ($kategoriPesertaLoopingArray = mysqli_fetch_assoc($kategoriPesertaLooping)) {
                                ?>
                                    <option value= <?= $kategoriPesertaLoopingArray['id']?>> <?= $kategoriPesertaLoopingArray['nama']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">jenis kegiatan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="judulSeminar"  required ><br>
                                <option value= <?= $kegiatanArray['id'] ?>><?= $kegiatanArray['judul']?></option>
                                <?php $kegiatanLoopong = mysqli_query($koneksi,"SELECT * FROM kegiatan");
                                while ($kegiatanLoopongArray = mysqli_fetch_assoc($kegiatanLoopong)) {
                                ?>
                                    <option value= <?= $kegiatanLoopongArray['id']?>> <?= $kegiatanLoopongArray['judul']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <div  class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
            </div>
        </div>
    </body>
    </html>

