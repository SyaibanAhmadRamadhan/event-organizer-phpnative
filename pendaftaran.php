<?php
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
if(!isset($_SESSION['login'])){
    header("Location:login.php");
}
$id_user = $_SESSION['id_user'];
$idKelas= $_GET['idKegiatan'];
$queryKelas = mysqli_query($koneksi,"SELECT * FROM daftar WHERE users_id = $id_user && kegiatan_id = $idKelas");
if (mysqli_num_rows($queryKelas)>0){
   echo "<script>alert('anda telah melakukan pemesanan seminar ini');
        document.location.href='index.php#pricing'</script>";
        exit;
}
if(isset($_POST['order'])){
   date_default_timezone_set('Asia/Jakarta');
    $id_kategoripeserta = $_POST['kategoriPeserta'];
    $id_user = $_SESSION['id_user'];
    $alasan = $_POST['alasan'];
    $idKelas= $_GET['idKegiatan'];
    $jenis = mysqli_query($koneksi,"SELECT * FROM jenis_kegiatan");
    $jenisArray = mysqli_fetch_assoc($jenis);
    $idjenis = $jenisArray["id"];
    $query = mysqli_query($koneksi, "SELECT max(right(nosertifikat, 3)) as no_sertifikat FROM daftar WHERE kegiatan_id=$idKelas");
    if (mysqli_num_rows($query) > 0) {
      foreach ($query as $qq) {
       $no = ((int)$qq['no_sertifikat'])+1;
       $kd = sprintf("%03s", $no);
      }
     } else {
      $kd = "001";
     }
     if ($idjenis == 1){
      $huruf = "S-2022-VI-";
     }elseif ($idjenis == 2){
      $huruf = "W-2022-VI-";
     }elseif ($idjenis == 3) {
      $huruf = "E-2022-VI-";
     }elseif ($idjenis == 4){
      $huruf = "B-2022-VI-";
     }elseif ($idjenis == 5) {
      $huruf = "P-2022-VI-";
     }
   
   $nosertifikat = $huruf.$kd;
    $tanggal = date("Y-m-d h:i:s");
    $true = mysqli_query($koneksi,"INSERT INTO daftar (
      id, tanggal_daftar, alasan, users_id , kegiatan_id, kategori_peserta_id, nosertifikat) 
      VALUES ('', '$tanggal', '$alasan', $id_user, $idKelas, $id_kategoripeserta, '$nosertifikat')");
      if($true){
         echo "<script>alert('Pemesanan berhasil');
        document.location.href='pesanan.php'</script>";
      }else {
         echo "<script>alert('pendaftaran gagal);document.location.href='index.php'</script>";
      }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Sepeda</title>
    <link rel="stylesheet" href="./css/pendaftaran.css">
    <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>
<body>
<!-- header -->
<?php include './components/header.php';?>
<!-- endheader -->
<!-- checkout-->
<section class="checkout-orders">

   <form action="" method="POST">

   <h3>your orders</h3>

      <div class="display-orders">
      <?php
        $kelas = mysqli_query ($koneksi,"SELECT * FROM kegiatan WHERE id=$idKelas");
        $kelasArray = mysqli_fetch_assoc($kelas);
      ?>
         <p> <?= $kelasArray['judul']; ?> <span></span> </p>
         <div class="grand-total">Harga : <span>Rp. </span><span id="hasil"> <?= number_format($kelasArray['harga_tiket']); ?></span></div>
      </div>

      <h3>place your orders</h3>
      <div class="flex">
         <div class="inputBox">
            <span>ALASAN :</span>
            <input type="text" name="alasan" placeholder="alasan daftar" class="box" required>
         </div>
         <div class="inputBox">
            <span>kategori peserta:</span>
            <select class="box" name="kategoriPeserta" required>
                  <option value="">kategori peserta</option>
                  <?php
                     $kategoriPeserta = mysqli_query ($koneksi,"SELECT * FROM kategori_peserta");
                     while ($array = mysqli_fetch_assoc($kategoriPeserta)){
                  ?>
                      <option value="<?php echo $array['id'];?>">
                          <?php echo $array['nama'];?>

                      </option>
                  <?php } ?>
              </select>
         </div>
      <input type="submit" name="order" id="order_button" class="btnPendaftaran <?= ($kelasArray['harga_tiket'] > 1)?'':'disabled'; ?>" value="place order">
   </form>

</section>
<?php include './components/footer.php'?>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>