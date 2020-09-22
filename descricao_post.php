<?php
    include ("conectar.php");

    session_start();

    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    $itens = $_POST['itens'];
    $idDesc = (isset($_GET['idDesc']) ? $_GET['idDesc'] : "");
    $idVeh = (isset($_GET['idVeh']) ? $_GET['idVeh'] : "");

    if(isset($idDesc) && $idDesc != ""){
        
        $sqlQuery = "update renap.descricao set itens='$itens' where idDesc=$idDesc and carro_idcarro=$idVeh";

        echo $sqlQuery;

        $updateUser = mysqli_query($conn, $sqlQuery);

    }else{

        $sqlQuery = "insert into renap.descricao (itens, carro_idcarro) values ('$itens', $idVeh);";

        echo $sqlQuery;

        $cadDesc = mysqli_query($conn, $sqlQuery);

    }

    header("location:descricao_form.php?idVeh=$idVeh");
?>	