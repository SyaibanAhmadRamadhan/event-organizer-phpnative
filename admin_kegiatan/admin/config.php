<?php
$koneksi = mysqli_connect("localhost","root","","tugas_semester2");

// ========================================================================================================================

// keluarin data
function data($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $sepeda=[];
    while ($array = mysqli_fetch_assoc($result) ){
        $sepeda[] = $array;
    }    
    return $sepeda;
}


// ========================================================================================================================

// detail
function detail($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $sepeda=[];
    $array = mysqli_fetch_assoc($result);
    $sepeda[] = $array;    
    return $sepeda;
}
// ========================================================================================================================

// cek extensi filenya
function upload(){
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file=$_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    
    // ketika tidak ada gambar dipili
    if($error == 4){
        echo "<script>
        alert('masukan gambar');
        </script>";
        return false;
    }
    
    // cek ekstensi file
    $daftar =['jpg','jpeg','png'];
    $extensi = explode('.',$nama_file);
    $extensi = strtolower(end($extensi));
    // var_dump($extensi);
    if( !in_array($extensi, $daftar) ){
        echo "<script>
        alert('format file harus jpg jpeg png');
        </script>";
        return false;
    }
    
    // cek tipe file
    // belum clear
    // var_dump($tipe_file); 
    // die;
    if($tipe_file != 'image/jpeg' && $tipe_file != "image/png" &&  $tipe_file != "image/jpg"){
        echo "<script>
        alert('yagn anda pilih bukan gambar');
        </script>";
        return false;
    }
    
    // cek ukuran file 
    // maksimal 2mb = 2000000 bait
    if($ukuran_file > 2000000){
        echo "<script>
        alert('ukuran file tidak boleh lebih dari 2mb');
        </script>";
        return false;
    }
    
    // lolos pengecekan
    // generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $extensi;
    // var_dump($nama_file_baru);
    // die;
    move_uploaded_file($tmp_file,'../../components/img'.$nama_file_baru);
    return $nama_file_baru;
}
    

// ========================================================================================================================
// tambah data
function tambah($data){
    global $koneksi;
    $id_admin = $_SESSION['id_admin'];
    $tanggal = date("Y-m-d H:i:s");
    $kode = htmlspecialchars($data['kode']);
    $nama = htmlspecialchars($data['name']);
    $stock = htmlspecialchars($data['stock']);
    $suplier = htmlspecialchars($data['suplier']);
    $komentar = htmlspecialchars($data['komentar']);
    // $gambar = htmlspecialchars($data['gambar']);
    $harga = htmlspecialchars($data['harga']);

    $gambar = upload();
    if (!$gambar){
        return false;
    }
    $result = "INSERT INTO sepeda VALUES ('',$id_admin,'$kode','$nama','$suplier','$harga','$stock',0,'$tanggal',1200,'$komentar','$gambar') ";
    mysqli_query($koneksi,$result);
    return mysqli_affected_rows($koneksi);
}


// ========================================================================================================================


// hapus
function hapus ($id){
    global $koneksi;
    mysqli_query($koneksi,"DELETE FROM sepeda WHERE id = $id");
    mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_barang = $id");
    return mysqli_affected_rows($koneksi);
}


// ========================================================================================================================


// ubah data barang
function ubah($barang){
    global $koneksi;
    $simpan = mysqli_query($koneksi,$barang);
    $array=[];
    $var = mysqli_fetch_assoc($simpan);
    $array[]=$var;
    return $array;
}

// ========================================================================================================================

// update ubah
function updatebarang($data){
    global $koneksi;
    $id =$_GET['id'];
    $name = htmlspecialchars($_POST['merek']);
    $harga = htmlspecialchars($_POST['harga']);
    $stock = htmlspecialchars($_POST['stock']);
    // $gambar = htmlspecialchars($_POST['gambar']);
    $suplier = htmlspecialchars($_POST['suplier']);

    $gambar = upload();
    if (!$gambar){
        return false;
    }
    $update = "UPDATE sepeda SET 
                name = '$name',
                price = '$harga',
                stock = '$stock',
                gambar = '$gambar',
                suplier = '$suplier'
            WHERE id=$id
                ";
                $update2 = "UPDATE keranjang SET 
                stock = '$stock',
            WHERE id=$id
                ";
    if (mysqli_query($koneksi,$update)){
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href='index.php?page=sepeda';
            </script>";
    }else{
        echo "
            <script>
            alert('data gagal diubah!');
            document.location.href='index.php?page=sepeda';
            </script>";
    }
    if (mysqli_query($koneksi,$update2)){
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href='index.php?page=sepeda';
            </script>";
    }else{
        echo "
            <script>
            alert('data gagal diubah!');
            document.location.href='index.php?page=sepeda';
            </script>";
    }
}


// ========================================================================================================================


// update data diri
function updatediri($data){
    global $koneksi;
    $id =$_SESSION['id'];
    $name = htmlspecialchars($data['name']);
    $email = htmlspecialchars($data['email']);
    $username = htmlspecialchars($data['username']);
    $alamat = htmlspecialchars($data['alamat']);
    $hp = htmlspecialchars($data['hp']);
    
    $update = "UPDATE admin SET 
                name = '$name',
                email = '$email',
                username = '$username',
                alamat = '$alamat',
                no_hp = '$hp'
            WHERE id=$id
                ";
    if (mysqli_query($koneksi,$update)){
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href='../index.php';
            </script>";
    }else{
        echo "
            <script>
            alert('data gagal diubah!');
            document.location.href='index.php?page=sepeda';
            </script>";
    }
}


// ========================================================================================================================


// cari
function cari($cari){
    global $koneksi;
    $query = "SELECT * FROM sepeda WHERE 
                    name LIKE '%$cari%' OR
                    kode LIKE '%$cari%' OR
                    stock LIKE '%$cari%' OR
                    gambar LIKE '%$cari%' OR
                    tgl_masuk LIKE '%$cari%'";

    $result = mysqli_query($koneksi,$query);
    $sepeda=[];
    while ($array = mysqli_fetch_assoc($result) ){
        $sepeda[] = $array;
    }    
    return $sepeda;
 
}



// ========================================================================================================================


// cek extensi filenya
function uploadregis(){
    $nama_file = $_FILES['gambar']['name'];
    $tipe_file=$_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // ketika tidak ada gambar dipili
    if($error == 4){
        echo "<script>
        alert('masukan gambar');
        </script>";
        return false;
    }

    // cek ekstensi file
    $daftar =['jpg','jpeg','png'];
    $extensi = explode('.',$nama_file);
    $extensi = strtolower(end($extensi));
    // var_dump($extensi);
    if( !in_array($extensi, $daftar) ){
        echo "<script>
        alert('format file harus jpg jpeg png');
        </script>";
        return false;
    }

    // cek tipe file
    // belum clear
    // var_dump($tipe_file); 
    // die;
    if($tipe_file != 'image/jpeg' && $tipe_file != "image/png" &&  $tipe_file != "image/jpg"){
        echo "<script>
        alert('yagn anda pilih bukan gambar');
        </script>";
        return false;
    }

    // cek ukuran file 
    // maksimal 2mb = 2000000 bait
    if($ukuran_file > 2000000){
        echo "<script>
        alert('ukuran file tidak boleh lebih dari 2mb');
        </script>";
        return false;
    }

    // lolos pengecekan
    // generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $extensi;
    // var_dump($nama_file_baru);
    // die;
    move_uploaded_file($tmp_file,'../img/admin/'.$nama_file_baru);
    return $nama_file_baru;
}


// ========================================================================================================================


// regist
function register($data){
    global $koneksi;
    $name = htmlspecialchars($data['name']);
    $username = htmlspecialchars($data['username']);
    $password = htmlspecialchars($data['password']);
    $password2 = htmlspecialchars($data['password2']);
    $email = htmlspecialchars($data['email']);
    $alamat = htmlspecialchars($data['alamat']);
    $gender = htmlspecialchars($data['gender']);
    $hp = htmlspecialchars($data['no_hp']);
    // $gambar = htmlspecialchars($data['gambar']);

    $cekuser = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' ");
    $cekemail = mysqli_query($koneksi,"SELECT * FROM admin WHERE email='$email'");
    if (mysqli_fetch_assoc($cekuser)){
        return[
            'error'=>true,
            'pesan'=>'username sudah digunakan'
        ];
        exit;
    }

    if (mysqli_fetch_assoc($cekemail)){
        return[
            'error'=>true,
            'pesan'=>'email sudah digunakan'
        ];
        exit;
    }

    if ($password != $password2){
        return[
            'error'=>true,
            'pesan'=>'password tidak sama'
        ];
        exit;
    }

    $gambar = uploadregis();
    if (!$gambar){
        return false;
    }
    $password = password_hash($password,PASSWORD_DEFAULT);
    if( mysqli_query($koneksi,"INSERT INTO admin VALUES ('','$name','$hp','$gender','$alamat','$email','$username','$password','$gambar')") ){
        echo "<script>
        alert('user berhasil dibuat');
        document.location.href='../index.php';
        </script>";
    }
}  




?>