<?php
session_start();

if(!(isset($_SESSION['idUsuario'])) && $_SESSION['tipoUsuario'] != "admin"){
    header("location:login.php?erro=permissao");
}

include ("conectar.php");

$id = $_GET['id'];

$sqlQuery = "delete from carro where idCarro=$id";

$deleteCar = mysqli_query($conn, $sqlQuery);
header("Location:veiculo_list.php");
?>