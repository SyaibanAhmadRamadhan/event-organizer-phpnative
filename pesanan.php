<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location:login.php");
}
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$id_user = $_SESSION['id_user'];
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="./css/pesanan.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
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
  <!-- end header -->

            
  <section class="orders">

    <h1 class="heading-pesanan">placed orders</h1>

    <div class="box-container-pesanan">
    <?php
      if(!$id_user){
         echo '<p class="empty">please login to see your orders</p>';
      }else {
          $order = mysqli_query ($koneksi,"SELECT * FROM daftar WHERE users_id= $id_user");
          if (mysqli_num_rows($order)){
            while ($order_array = mysqli_fetch_assoc($order)) {
            $idKelas = $order_array['kegiatan_id'];
            $idkategoriPeserta = $order_array['kategori_peserta_id'];
            $kelasQuery = mysqli_query($koneksi,"SELECT * FROM kegiatan WHERE id = $idKelas" );
            $kelasArray = mysqli_fetch_assoc($kelasQuery);
            $jenis = $kelasArray['jenis_id'];
            $jenisKegiatanQuery = mysqli_query($koneksi,"SELECT * FROM jenis_kegiatan WHERE id = $jenis");
            $jenisKegiatanArray = mysqli_fetch_assoc($jenisKegiatanQuery);

   ?>
   <div class="box">
      <p>judul seminar : <span><?= $kelasArray['judul']?></span></p>
      <p>tema seminar : <span><?= $jenisKegiatanArray['nama']?></span></p>
      <p>narasumber : <span><?= $kelasArray['narasumber']?></span></p>
      <p>lokasi : <span><?= $kelasArray['tempat']?></span></p>
      <!-- <p>payment method : <span><?= $kelasArray['deskripsi']?></span></p> -->
      <p>diselenggarakan pada : <span><?= $kelasArray['tanggal']?></span></p>
      <p>alasan : <span><?= $order_array['alasan']?></span></p>
      <p>serifikat : <span><?= $order_array['nosertifikat']?></span></p>
      <!-- <p> payment status : <span style="color:<?php if($fetch_orders['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p> -->
   </div>
   <?php
       }}else {echo '<p class="empty">no orders placed yet!</p>';}}
   ?>

   </div>

</section>



<!-- footer -->
<?php include './components/footer.php';?>
<!-- footer section ends -->




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