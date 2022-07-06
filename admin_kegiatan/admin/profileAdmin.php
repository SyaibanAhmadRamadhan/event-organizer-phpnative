<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location:../index.php");
}

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
</head>
<body>
    <center><font size="6">PROFILE DATA</font></center>

    <table border="1" cellpadding="5" align="center">

    </table>

    <br>

    <table border="2" class="table table-striped jambo_table bulk_action">
        <tr>
            <th>username  </th>
            <td><?php echo $_SESSION['username_admin'];?></td>
        </tr>

        <tr>
            <th>role  </th>
            <td><?php echo $_SESSION['role'];?></td>
        </tr>

        <tr>
            <th>Email  </th>
            <td><?php echo $_SESSION['email'];?></td>
        </tr>

    </table> 

</body>
</html>