<?php
    include ("conectar.php");

    session_start();

    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    $marca = $_POST['marca'];

    $id = (isset($_GET['id']) ? $_GET['id'] : "");

    if(isset($id) && $id != ""){
        $sqlQuery = "update renap.marca set nomemarca = '$marca' where (idmarca = $id);";

        $updtMarca = mysqli_query($conn, $sqlQuery);

    }else{

        $sqlQuery = "insert into renap.marca (nomemarca) values ('$marca')";

        $insereMarca = mysqli_query($conn, $sqlQuery);

    }

    header("location:marca_list.php");
?>	