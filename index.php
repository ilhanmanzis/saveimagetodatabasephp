<?php
require 'connection.php';
if(isset($_POST['submit'])){
    if($_FILES['image']['error']===4){
        echo "<script>alert('error 1');</script>";
    }else{
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $tmpname = $_FILES['image']['tmp_name'];

        $validImageExtension = ['jpg','jpeg','png','svg'];
        $ImageExtension = explode('.', $filename);
        $ImageExtension = strtolower(end($ImageExtension));
        if(!in_array($ImageExtension, $validImageExtension)){
            echo "<script>alert('error 2');</script>";
        }else if ($filesize>1000000){
            echo "<script>alert('error 3');</script>";
        }else{
            $newImageName = uniqid();
            $newImageName .= '.' . $ImageExtension;
            move_uploaded_file($tmpname, 'img/'. $newImageName);
            $query = "INSERT INTO image (id, name) VALUES ('', '$newImageName')";
            mysqli_query($conn, $query);
            echo "<script>window.location.href = 'data.php';</script>";
        }
    }
}
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
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <label for="image">Image :  </label>
        <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .svg">
        <button type="submit" name="submit">Simpan</button>
    </form>
    
</body>
</html>
