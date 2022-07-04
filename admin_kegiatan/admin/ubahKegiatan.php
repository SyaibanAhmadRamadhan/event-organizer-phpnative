<?php 
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

$id=$_GET["id"];
function upload(){
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file=$_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $daftar =['jpg','jpeg','png'];
    $extensi = explode('.',$nama_file);
    $extensi = strtolower(end($extensi));
    if( !in_array($extensi, $daftar) ){
        echo "<script>
        alert('format file harus jpg jpeg png');
        </script>";
        return false;
    }
    if($tipe_file != 'image/jpeg' && $tipe_file != "image/png" &&  $tipe_file != "image/jpg"){
        echo "<script>
        alert('yagn anda pilih bukan gambar');
        </script>";
        return false;
    }
    if($ukuran_file > 2000000){
        echo "<script>
        alert('ukuran file tidak boleh lebih dari 2mb');
        </script>";
        return false;
    }
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $extensi;
    move_uploaded_file($tmp_file,'../../assets/imgKegiatanDariDatabase/'.$nama_file_baru);
    return $nama_file_baru;
}
$kegiatan = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id='$id'");
$kegiatanArray = mysqli_fetch_assoc($kegiatan);
if(isset($_POST["submit"])){
    $id=$_GET["id"];
    $judul = $_POST['judul'];
    $kapasitas = $_POST['kapasitas'];
    $harga = $_POST["harga_tiket"];
    $tanggal = $_POST['tanggal'];
    $narasumber = $_POST['narasumber'];
    $tempat = $_POST['tempat'];
    $pic = $_POST["pic"];
    $foto = upload();
    $deskripsi = $_POST["deskripsi"];
    $jenisKegiatan = $_POST['jenisKegiatan'];

    $update = mysqli_query($koneksi,"UPDATE kegiatan SET 
    judul='$judul',
    kapasitas='$kapasitas',
    harga_tiket = $harga,
    tanggal = '$tanggal',
    narasumber ='$narasumber',
    tempat = '$tempat',
    pic = '$pic',
    foto_flyer='$foto',
    deskripsi = '$deskripsi',
    jenis_id = $jenisKegiatan WHERE id = $id");

    if ($update) {
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href='index.php?page=kegiatan';
            </script>";
    }



}
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
<h3> <i class="fa-solid fa-pen-to-square mr-3"></i> edit data</i></h3><hr> 
            
           
                <form method="post" action=""enctype="multipart/form-data" >

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">judul seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="judul" required="required" value="<?= $kegiatanArray['judul']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">kapasitas seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="number" name="kapasitas" required="required" value="<?= $kegiatanArray['kapasitas']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">harga seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="number" name="harga_tiket" required="required" value="<?= $kegiatanArray['harga_tiket']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">tanggal seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="date" name="tanggal" required="required" value="<?= $kegiatanArray['tanggal']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">narasumber seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="narasumber" required="required" value="<?= $kegiatanArray['narasumber']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">tempat seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="tempat" required="required" value="<?= $kegiatanArray['tempat']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">pembawa acara seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="pic" required="required" value="<?= $kegiatanArray['pic']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">deskripsi seminar</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="deskripsi" required="required" value="<?= $kegiatanArray['deskripsi']?>" >
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">jenis kegiatan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="jenisKegiatan"  required ><br>
                            <?php 
                            $idKelas = $kegiatanArray['jenis_id'];
                            $jenisKegiatan = mysqli_query($koneksi, "SELECT * FROM jenis_kegiatan WHERE id = $idKelas");
                            $jenisKegiatanArray = mysqli_fetch_assoc($jenisKegiatan);?>
                                <option value= <?= $jenisKegiatanArray['id'] ?>><?= $jenisKegiatanArray['nama']?></option>
                                <?php $jenis_Kegiatan = mysqli_query($koneksi,"SELECT * FROM jenis_kegiatan");
                                while ($jenis_KegiatanArray = mysqli_fetch_assoc($jenis_Kegiatan)) {
                                ?>
                                    <option value= <?= $jenis_KegiatanArray['id']?>> <?= $jenis_KegiatanArray['nama']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" >foto</label><br>
                        <div class="col-md-6 col-sm-6">
                            <input size="4" name="gambar" required type="file" value="<img src=../img/<?=$sepeda['foto_flyer']?>">
                            <br>
                        </div>
                    </div>

                    <div class="item form-group">
                        <div  class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
            </div>
        </div>

    <script src="../method/js/rp.js"></script>
    </body>
    </html>

