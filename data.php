<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1px">
        <?php
        require 'connection.php';
        $i=1;
        $rows= mysqli_query($conn,"SELECT * FROM image ORDER BY id DESC");
        foreach($rows as $data):
        ?>
        <tr>
            <td><?=$i++;?></td>
            <td><img src="img/<?=$data['name'];?>" alt="" width="100px"></td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>
</html>