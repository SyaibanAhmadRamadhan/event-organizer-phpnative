<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$id = $_GET['id'];
session_start();
$_SESSION=[];
session_unset();
session_destroy();
// setcookie('id','',time()-3600);
// setcookie('key','',time()-3600);
$updateUser = mysqli_query($koneksi,"UPDATE users SET status = 'not login' WHERE id = $id");
header("Location: index.php");
?>