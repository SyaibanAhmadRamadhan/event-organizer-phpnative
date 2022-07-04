<?php 
session_start();
$koneksi = mysqli_connect('localhost', 'root', '', 'semester2');

$id=$_GET["id"];

if(isset($_POST["submit"])){
    $id=$_GET["id"];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST["role"];

    $update = mysqli_query($koneksi,"UPDATE users SET 
    username='$username',
    email='$email',
    role = '$role' WHERE id = $id");

    if ($update) {
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href='index.php?page=user';
            </script>";
    }



}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Document</title>
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
<h3> <i class="fa-solid fa-pen-to-square mr-3"></i> edit data</i></h3><hr> 
            
           <?php    $user = mysqli_query($koneksi,"SELECT * FROM users WHERE id='$id'");
                    $userArray = mysqli_fetch_assoc($user);?>
                <form method="post" action=""enctype="multipart/form-data" >
                    
                <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">username user</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="username" required="required" value="<?= $userArray['username']?>" >
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">email user</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input class="form-control" size="4"  type="text" name="email" required="required" value="<?= $userArray['email']?>" >
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">jenis kegiatan</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="role"  required ><br>
                                <option value= <?= $userArray['role']?>> <?= $userArray['role']?></option>
                                <option value= 'public'> public</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <div  class="col-md-6 col-sm-6 offset-md-3">
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
            </div>
        </div>

    <script src="../method/js/rp.js"></script>
    </body>
    </html>

