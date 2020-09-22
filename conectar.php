<meta charset="utf-8">  
<?php

    $servername = "127.0.0.1:3306";
    $database = "renap";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $database);

    if (mysqli_connect_error()){
        echo "Falha na conexão: " . mysqli_connect_error();
    }

    $conn->set_charset("utf8");

?> 