<?php
include 'config.php';
$admin = data("SELECT * FROM admin");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php foreach ($admin as $x){?>
    <?php echo $x['name']?><br>
    <?php echo $x['alamat']?><br>
    <?php echo $x['gender']?><br>
    <?php echo $x['no_hp']?><br>
    
    <?php }?>
</body>
</html>