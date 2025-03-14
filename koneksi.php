<?php 

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "tamu";

    $conn = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($conn));


?>