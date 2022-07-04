<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
// $query = mysqli_query($koneksi,'SELECT MAX(kode) as kodex  FROM  sepeda'); // mengambil nilai kode_seminar terbesar
// $data = mysqli_fetch_assoc($query);
// $kodeBarang = $data['kodex'];
// $urutan = (int) substr($kodeBarang, 3, 3);
// $urutan++;
// $kodeBarang = "SPD" . sprintf("%03s", $urutan);
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
        document.location.href='index.php?page=tambahKegiatan';
        </script>";
        exit;
    }
    if($tipe_file != 'image/jpeg' && $tipe_file != "image/png" &&  $tipe_file != "image/jpg"){
        echo "<script>
        alert('yagn anda pilih bukan gambar');
        document.location.href='index.php?page=tambahKegiatan';
        </script>";
        exit;
    }
    if($ukuran_file > 2000000){
        echo "<script>
        alert('ukuran file tidak boleh lebih dari 2mb');
        document.location.href='index.php?page=tambahKegiatan';
        </script>";
        exit;
    }
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $extensi;
    move_uploaded_file($tmp_file,'../../assets/imgKegiatanDariDatabase/'.$nama_file_baru);
    return $nama_file_baru;
}
if(isset($_POST['submit'])){

    $judul = $_POST['judul'];
    $kapasitas = $_POST['kapasitas'];
    $narasumber = $_POST['narasumber'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $jenisKegiatan = $_POST['jenisKegiatan'];
    $gambar = upload();
    $tempat = $_POST['tempat'];
    $mc = $_POST['mc'];
    $insert = mysqli_query($koneksi,"INSERT INTO kegiatan (
        id,judul,kapasitas,narasumber,tanggal,harga_tiket,deskripsi,jenis_id,foto_flyer,pic,tempat)
        VALUES ('','$judul',$kapasitas,'$narasumber','$tanggal',$harga,'$deskripsi',$jenisKegiatan,'$gambar','$mc','$tempat')");
    if ($insert){
        echo "<script>alert('data berhasil dimasukan');
      document.location.href='index.php?page=kegiatan'</script>";
    }
    
}
?>

<style>
        .buton {
    float: right;
    display: block;
}
</style>
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <div class="buton">
<a href="index.php?page=tambah"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>



<h3> <i class="fa-solid fa-circle-plus mr-3"></i> Tambah Data</i></h3><hr> 

    <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" size="4"  type="text" name="judul" required="required" placeholder="judul seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" size="4" type="number" name="kapasitas" required placeholder="kapasitas seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" size="4" type="date" id="pcs" name="tanggal"  required placeholder="tanggal seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"  type="text" name="narasumber" required placeholder="narasumber seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"  type="text" name="tempat" required placeholder="tempat seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"  type="text" name="mc" required placeholder="mc seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6 ">
                    <input class="form-control" size="4"  type="text" name="harga" required placeholder="harga seminar...">
                <br>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6">
                <select class="form-control"name="jenisKegiatan" required>
                    <option value="">jenis kegiatan</option>
                    <?php 
                        $jeniskegiatan = mysqli_query ($koneksi,"SELECT * FROM jenis_kegiatan");
                        while ($array = mysqli_fetch_assoc($jeniskegiatan)){
                    ?>
                        <option value="<?php echo $array['id'];?>">
                            <?php echo $array['nama'];?>
                            
                        </option>
                    <?php } ?>
                </select>
                <br>
            </div>
		</div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6">
            <textarea name="deskripsi" cols="300" rows="4" ></textarea>
            <br>
            </div>
		</div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"></label><br>
            <div class="col-md-6 col-sm-6">
                <input size="4" name="gambar" type="file" required>
                <br>
            </div>
		</div>

        <div class="item form-group">
			<div  class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="tambah">
			</div>
        </div>

</form>

 <script src="../method/js/rp.js"></script>
 <script src="../method/js/pcs.js"></script>


