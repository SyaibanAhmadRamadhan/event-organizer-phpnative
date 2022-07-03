<?php
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

$kelas = mysqli_query($koneksi,"SELECT * FROM kegiatan");
$kelasArray = [];
while ($kelasAssoc = mysqli_fetch_assoc($kelas)){
  $kelasArray[]=$kelasAssoc;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>X-Tech</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
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

  <!-- =======================================================
  * Template Name: FlexStart - v1.9.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include './components/header.php';?>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Mulai upgrade skilmu & siap jadi TALENTA DIGITAL</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Tingkatkan keterampilan digital, tambah portofolio, dan siapkan karir kamu untuk jadi talenta digital handal bersama X-Tech</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Mulai Sekarang</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3> </h3>
              <h2>Diera digital ini semakin banyak dibutuhkannya para ahli yang expert dibidangnya masing-masing, untuk mengembangkan Pendidikan, perusahaan, Bisnis, dan lain sebagainya.</h2>
              <p>
                Ayo bergabung di kelas X-Tech untuk mengupgrade skilmu. 
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->

  <!-- ======= Pricing Section ======= -->
  <section id="pricing" class="pricing">

<div class="container" data-aos="fade-up">


  <header class="section-header">
    <h2> </h2>
    <p>Pilih Kelas Mu</p>
  </header>

  <div class="row gy-4" data-aos="fade-left">
<?php foreach ($kelasArray as $x ) { 
      $idKelas = $x['id'];
    $queryJenis = mysqli_query($koneksi,"SELECT * FROM jenis_kegiatan WHERE id = $idKelas");
    $jenisArray = mysqli_fetch_assoc($queryJenis);
    ?>
    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
      <div class="box">
      <span class="featured"><?php echo $jenisArray['nama']?></span>
        <h3 style="color: #07d5c0;"><?php echo $x['judul']?></h3>
        <img src="assets/img/<?php echo $x['foto_flyer']?>" class="img-fluid" alt="">
        <ul>
        <li><?php echo $x['narasumber']?></li>
          <br>
          <li>Rp. <?php echo number_format($x['harga_tiket'])?></li>
        </ul>
        <a href="kelas.php?id=<?php echo $x['id']?>" class="btn-buy">Coba Sekarang</a>
      </div>
    </div>

    <?php } ?>

  </div>

</div>

</section><!-- End Pricing Section -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Testimonials</h2>
          <p>Apa yang mereka katakan tentang kita?</p>
        </header>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Event ini sangat bagus untuk melatih kreatifitas pemuda milenial
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Indung Kurniawan</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Bagaimana mengatakannya ya? Menurutku ini sangat menakjubkan
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Indah Intania</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Ini sangat membantu kita untuk berlatih di dunia kerja nanti
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Kartika Putri</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Saya sangat tertarik untuk mengenal lebih jauh tentang apa itu User Interface dan User Experience
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>Suratman Kusnadi</h3>
                  <h4>Entrepreneur</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Team</h2>
          <p>Our hard working team</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/kholid.jpg" class="img-fluid" alt="">
                
              </div>
              <div class="member-info">
                <h4>Kholid Saifullah A.</h4>
                <span>Mentor UI/UX</span>
                <p>Perancang yang baik jarang membuat periklanan yang baik, karena mereka melihat segala sesuatunya berdasarkan keindahan gambar dan melupakan hal yang harus dijual itu.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/rafly.png" class="img-fluid" alt="">
                
              </div>
              <div class="member-info">
                <h4>Rafly Al Hakim</h4>
                <span>Mentor JS</span>
                <p>Menyelesaikan setiap permasalahan dengan coding adalah suatu kesenangan tersendiri bagi seorang programmer. Dan kamu harus belajar untuk bersabar dalam menemukan setiap permasalahan yang kamu hadapi.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/najmi.jpeg" class="img-fluid" alt="">
                
              </div>
              <div class="member-info">
                <h4>Najmi Taqiy</h4>
                <span>Mentor Design Grafis</span>
                <p>Desain adalah ekspresidari sebuah tujuan, dan mungkin nantinya akan disebut sebagai sebuah seni; desain tergantung pada seberapa besar sebuah batasan dan bagaimana metode yang dilakukan.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/team/vidya.png" class="img-fluid" alt="">
              </div>
              <div class="member-info">
                <h4>Vidya Febriyana</h4>
                <span>Mentor PHP</span>
                <p>Tidak ada satupun bahasa pemrograman, yang bisa mencegah programmer membuat program yang jelek. Jadi kamu harus bangga untuk membuat program dalam kemampuan mu sendiri!</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Team Section -->

    

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="blog" class="blog">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Blog</h2>
          <p>Recent posts form our Blog</p>
        </header>

        <div class="row">

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Belajar Mengajar</span>
              <h3 class="post-title">Guru yang baik itu seperti lilin, ia menghabiskan dirinya sendiri untuk menerangi jalan bagi orang lain.</h3>
              
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-2.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Framework</span>
              <h3 class="post-title">Seorang programmer wajib menguasai kode atau bahasa pemrograman untuk bisa melakukan tugas-tugasnya dengan baik.</h3>
             
            </div>
          </div>

          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="assets/img/blog/blog-3.jpg" class="img-fluid" alt=""></div>
              <span class="post-date">Kegiatan Diskusi</span>
              <h3 class="post-title">Dalam sebuah diskusi, hal yang sulit adalah tidak membela pendapat seseorang, tetapi untuk mengetahuinya.</h3>
              
            </div>
          </div>

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p>JL.Mekar Wangi<br>Komplek Pertanian Atsiri</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Hubungi kita disini!</h3>
                  <p>+62 882 1386 0108<br>+62 879 8987 7277 </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>raflyalhakim207@gmail.com<br>kholid@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Waktu Dilaksanakam</h3>
                  <p>Senin - Jumat<br>9:00 - 17:00</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php include './components/footer.php'?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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