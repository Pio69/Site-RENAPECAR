<?php
    include ("conectar.php");

    session_start();

    if(!(isset($_SESSION['idUsuario'])) && $_SESSION['tipoUsuario'] != "admin"){
        header("location:login.php?erro=permissao");
    }

    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : "usuario");
    $id = (isset($_GET['id']) ? $_GET['id'] : "");
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];

    if($id == ""){

        $ano = $_POST['ano'];
        $mes = $_POST['mes']; 
        $dia = $_POST['dia'];

        $data = $ano."-".$mes."-".$dia;     
    }

    if(isset($id) && $id != ""){
        
        $sqlQuery = "update usuario set nome='$nome',login='$login',senha='$senha',tipo='$tipo',cpf='$cpf',endereco='$endereco',cep='$cep' where idUser=$id";

        $updateUser = mysqli_query($conn, $sqlQuery);

        $desbugamento = 2;

    }else{

        $verificaLogin = "select login from usuario where login='$login'";

        $validaLogin = mysqli_query($conn, $verificaLogin);

        if (mysqli_affected_rows($conn) != 0){
            header("location:usuario_form.php?erro=login");
            exit();
        }else{

            $addUser = "insert into usuario (nome,login,senha,tipo,cpf,dataDeNascimento,endereco,cep) values ('$nome', '$login', '$senha', 'usuario', '$cpf', '$data', '$endereco', '$cep')";

            echo $addUser;

            $cadUser = mysqli_query($conn, $addUser);

            $desbugamento = 1;
        }
    }


    if(isset($_SESSION['idUsuario']) && $_SESSION['idUsuario'] == $id || !(isset($_POST['id']))){
        $_SESSION['idUsuario'] = $id;
        $_SESSION['nomeUsuario'] = $nome;
        $_SESSION['loginUsuario'] = $login;
        $_SESSION['senhaUsuario'] = $senha;
        $_SESSION['tipoUsuario'] = $tipo;
    }

    if ($desbugamento == 1){
       header("location:login.php");
    }else if($desbugamento == 2 
             && ($_SESSION['tipoUsuario'] == "usuario" || $tipo == "usuario")){
       header("location:home.php");
    }else{
       header("location:index.php");
    }

?>	