<?php
    session_start();

    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    include ("conectar.php");

    $idMarca = $_GET['idMarca'];

    $sqlQuery = "delete from marca where idMarca=$idMarca";

    echo $sqlQuery;

    $deleteUser = mysqli_query($conn, $sqlQuery);

    header("location:marca_list.php");

?>