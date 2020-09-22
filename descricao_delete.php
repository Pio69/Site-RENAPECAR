<?php
    session_start();

    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    include ("conectar.php");

    $idDesc = $_GET['idDesc'];

    $idCar = $_GET['idDesc'];

    $sqlQuery = "delete from descricao where idDesc=$id";

    $deleteUser = mysqli_query($conn, $sqlQuery);

    header("location:veiculo_list.php");
?>