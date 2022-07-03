<?php

include 'config.php';
$id = $_SESSION['id'];
$diri = ubah("SELECT * FROM admin WHERE id=$id");

if(isset($_POST['ubah'])){
    updatediri($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <center><font size="6">UBAH DATA DIRI</font></center><br>

    <table border="1" cellpadding="5" align="center">
        <tr>
            <th><center><img src=../img/admin/<?php echo $diri[0]['gambar'];?> width="120"></center></th>
        </tr>
    </table>
    <br>

    

    <form method="post" action="">

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Panjang</label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control"  required type="text" name="name" value="<?php echo $diri[0]['name'];?>" >
            </div>
        </div>
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="hp" required value="<?php echo $diri[0]['no_hp'];?>" >
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="email" required value="<?php echo $diri[0]['email'];?>" >
            </div>
        </div>
        
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Usename</label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="username" required value="<?php echo $diri[0]['username'];?>" >
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
            <div class="col-md-6 col-sm-6 ">
                <input class="form-control" type="text" name="alamat" required value="<?php echo $diri[0]['alamat'];?>" >
            </div>
        </div>

        <!-- name <input type="file" name="name" value="<?php echo $diri[0]['name'];?>" > -->

        <div class="item form-group">
			<div  class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="ubah" class="btn btn-primary bg-dark" value="UPDATE DATA!">
			</div>
        </div>

    </form>
<!-- <a href="index.php?page=profile"><button class="btn btn-dark right">back</button></a> -->
</body>
</html>