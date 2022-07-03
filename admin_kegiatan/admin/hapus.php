<?php
session_start();
if( !isset($_SESSION['admin']) ){
    header("Location: ../index.php");
    exit;
}
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$id = $_GET['id'];
// function hapus ($id){
//     global $koneksi;
//     mysqli_query($koneksi,"DELETE FROM sepeda WHERE id = $id");
//     mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_barang = $id");
//     return mysqli_affected_rows($koneksi);
// }
$hapus = mysqli_query($koneksi,"DELETE FROM kegiatan WHERE id = $id");
if($hapus){
    echo "<script>alert('data berhasil dihapus');
    document.location.href='index.php?page=kegiatan';
    </script>";
}else {
    echo "<script>alert('data gagal dihapus');
    document.location.href='index.php?page=kegiatan';
    </script>";
}
