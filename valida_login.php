<?php
include ("conectar.php");

$login= addslashes($_POST['login']);
$senha= addslashes($_POST['senha']);

$sqlQuery = "select u.idUser,u.nome,u.login,u.tipo from usuario u where login='$login' and senha='$senha'";

$resultLogin = $conn->query($sqlQuery) or die($conn->error);

echo $resultLogin;

if(mysqli_affected_rows($conn) > 0){
    while($result = $resultLogin->fetch_array()){
        session_start();
        $_SESSION['idUsuario'] = $result["idUser"];
        $_SESSION['nomeUsuario'] = $result["nome"];
        $_SESSION['loginUsuario'] = $result["login"];
        $_SESSION['tipoUsuario'] = $result["tipo"];
        
        echo $result["nome"];        
    }

    header("location:index.php");
}else{
    header("location:login.php?erro=login");
}

?>
