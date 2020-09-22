<?php
    session_start();

    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    include ("conectar.php");

    $id = $_GET['id'];

    $sqlQuery = "delete from usuario where idUser=$id";

    $deleteUser = mysqli_query($conn, $sqlQuery);

    header("location:usuario_list.php");

?>