<?php

include "Product/connect.php";

$sql = "SELECT * FROM category";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {

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
    <h3>ID: <?php 
        echo $row['image'];
    }
}
?></h3>
</body>
</html>