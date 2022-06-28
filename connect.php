<?php

    $server = "localhost";
    $username = "root";
    $pass = "";
    $database = "jsecom";

    $conn = mysqli_connect($server, $username, $pass, $database);

    if(!$conn)
    {
        echo "Connection Failed ".mysqli_connect_error();
    }
    else
    {
        echo "Connection Successfull";
    }

?>