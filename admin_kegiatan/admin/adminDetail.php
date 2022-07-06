<?php 

$id=$_GET['id_detail'];
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');
$user = mysqli_query($koneksi,"SELECT * FROM users WHERE id=$id");
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
<a href="index.php?page=admin"><i class="fa-solid fa-xmark fa-2x" data-toggle="tooltip" title="close"></i></a>
</div>
    <center><font Size="4">DETAIL DATA ADMIN</font></center><br>
    
    <div class="table-responsive">
    <?php foreach($user as $x){
        $idUser = $x['id'];
        ?>
        <table  class="table table-bordered">
            <tr>
                <th>nama user</th>
                <td><?php echo $x['username'];?></td>
            </tr>
            <tr>
                <th>email user</th>
                <td><?php echo $x['email'];?></td>
            </tr>
            <tr>
                <th>last login user</th>
                <td><?php echo $x['last_login'];?></td>
            </tr>
            <tr>
                <th>status</th>
                <td><?php echo $x['status'];?></td>
            </tr>
        </table>
<?php } ?>
            

    </div>


</body>
</html>