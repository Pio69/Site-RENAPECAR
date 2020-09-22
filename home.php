<?php
include('pagina.php');
?>
<html>
    <head>
    <style>
   
    </style>
    </head>
<body>
    <?php
    //valida pra n entrar na home sem logar
    if(!(isset($_SESSION['idUsuario']))){
		header("location:login.php?erro=offlogin");
	}
    
    echo "<div id=home_produto>
            <div class=div_home_dentro>
                <div class=div_home_titulo>
                    Informações do usuário
                </div>";

    include("conectar.php");
    
    $sqlQuery = "select * from usuario where idUser=".($_SESSION['idUsuario'])."";
        
    $buscaReg = mysqli_query($conn, $sqlQuery);

    $rowReg = mysqli_fetch_assoc($buscaReg);

    $resultadoRegistro[1]=$rowReg["nome"];
    $resultadoRegistro[2]=$rowReg["login"];
    $resultadoRegistro[3]=$rowReg["cpf"];
    $resultadoRegistro[4]=$rowReg["dataDeNascimento"]; 
    $resultadoRegistro[5]=$rowReg["endereco"];
    $resultadoRegistro[6]=$rowReg["cep"]; 
    
    echo "
   
    <font class=home_letras>Nome</font>
    
    <font class=home_letras_login>Login</font>
    
    <p><font class=home_result>$resultadoRegistro[1]</font>
    
    
    <font class=home_result_login>$resultadoRegistro[2]</font></p>
    
    <font class=home_letras>CPF</font>
    <font class=home_letras_data>Data de nascimento</font>
    
    <p> <font class=home_result>$resultadoRegistro[3]</font>
    
    
     <font class=home_result_data>$resultadoRegistro[4]</font></p>
    
    <font class=home_letras>Endereço</font>
    
    <p> <font class=home_result>$resultadoRegistro[5]</font></p>
    
    <font class=home_letras>CEP</font>
    
    <p> <font class=home_result>$resultadoRegistro[6]</font></p>
    ";
	
	echo "<a href='usuario_form.php?id=".$_SESSION['idUsuario']."'><button class='home_buti'>Editar</button></a>";
        
    echo "</div>";
    
?>

</body>
</html>
