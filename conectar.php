<meta charset="utf-8">  
<?php

    $servername = "bancodamassaa.cmu6spr4pz8a.us-east-1.rds.amazonaws.com:3306";
    $database = "renapcar";
    $username = "admin";
    $password = "admin123";

    $conn = new mysqli($servername, $username, $password, $database);

    if (mysqli_connect_error()){
        echo "Falha na conexão: " . mysqli_connect_error();
    }

    $conn->set_charset("utf8");

?> 
