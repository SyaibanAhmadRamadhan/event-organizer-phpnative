<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location:../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <center><font size="6">PROFILE DATA</font></center>

    <table border="1" cellpadding="5" align="center">
    <tr>
        <th><center><img src=../img/admin/<?php echo $_SESSION['gambar'];?> width="120"></center></th>
    </tr>
    </table>

    <br>

    <table border="2" class="table table-striped jambo_table bulk_action">
        <tr>
            <th>Nama Panjang   </th>
            <td><?php echo $_SESSION['name'];?></td>
        </tr>

        <tr>
            <th>Alamat  </th>
            <td><?php echo $_SESSION['alamat'];?></td>
        </tr>

        <tr>
            <th>Jenis Kelamin  </th>
            <td><?php echo $_SESSION['hp'];?></td>
        </tr>

        <tr>
            <th>Email  </th>
            <td><?php echo $_SESSION['email'];?></td>
        </tr>

        <tr>
            <th>Username  </th>
            <td><?php echo $_SESSION['username'];?></td>
        </tr>

        <tr>
            <th>Jenis Kelamin  </th>
            <td><?php echo $_SESSION['gender'];?></td>
        </tr>
    </table> 

    <!-- <a href="index.php?page=datadiri"class="btn btn-secondary btn-sm">Ubah Data Diri</a> -->
        
    <!-- footer content -->
    <!-- <footer> -->
        <!-- <div class="pull-right"> -->
            <!-- *Note : Jika Anda Mengubah Data Diri Otomatis LogOut -->
        <!-- </div> -->
        <!-- <div class="clearfix"></div> -->
    <!-- </footer> -->
    
</body>
</html>