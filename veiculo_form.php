
<?php
include("pagina.php");
?>
<html>
	<head>
        <meta charset="utf-8"> 
	</head>
	<body>
        <div class=produto_form>
            <?php
                include ("conectar.php");

                if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
                    header("location:login.php?erro=permissao");
                }

                if(isset($_GET['id'])){

                    $id= $_GET['id'];

                    $sqlQuery = "select * from carro where idCarro=$id";

                    $resultCar = $conn->query($sqlQuery) or die($conn->error);

                    while($result = $resultCar->fetch_array()){

                        $resultadoRegistro[0] = $id;
                        $resultadoRegistro[1] = $result["nome"];
                        $resultadoRegistro[2] = $result["preco"];
                        $resultadoRegistro[3] = $result["ano"];
                        $resultadoRegistro[4] = $result["modelo"];
                        $resultadoRegistro[5] = $result["marca_idMarca"];
                        $resultadoRegistro[6] = $result["kilometracao"];

                    }

                    }else{
                    $resultadoRegistro[0] = "";
                    $resultadoRegistro[1] = "";
                    $resultadoRegistro[2] = "";
                    $resultadoRegistro[3] = "";
                    $resultadoRegistro[4] = "";
                    $resultadoRegistro[5] = "";
                    $resultadoRegistro[6] = "";
                }

                echo"
                <center>
                ";

                if(isset($id)){
                    echo " <font class=titulo>ALTERAR VEICULO</font>
                    <form action=veiculo_post.php?id=$id method=post  enctype='multipart/form-data'>";
                }else{
                    echo "<font class=titulo>CADASTRAR VEICULO</font>
                        <form action=veiculo_post.php method=post  enctype='multipart/form-data'>";
                }

                echo " <p>
                            <div id=divLetrasCad>
                                <font class=produto_form_letras>Nome</font>
                            </div>
                        </p>

                <p>
                <input class=produto_form_input name=nome value='$resultadoRegistro[1]'>
                </p>

                <p>
                    <div id=divLetrasCad>
                        <font class=produto_form_letras>Preço</font>
                    </div>
                </p>

                <p>
                <input class=produto_form_input name=preco value='$resultadoRegistro[2]'>
                </p>

                <p>
                <div id=divLetrasCad>
                <font class=produto_form_letras>Ano</font>
                </div>
                </p>

                <p><input class=produto_form_input name=ano value='$resultadoRegistro[3]'></p>

                <p><div id=divLetrasCad><font class=produto_form_letras>Marca</font></div></p>";

                echo "<select class=produto_form_input name='marca'>";

                echo "<option>Selecione...</option>";

                $sqlQuery = "select * from marca";

                $resultMarca = $conn->query($sqlQuery) or die($conn->error);

                while($result = $resultMarca->fetch_array()){
                    $resultadoRegistro[7] = $result["nomeMarca"];
                    $resultadoRegistro[8] = $result["idMarca"];

                    if($resultadoRegistro[5] == $resultadoRegistro[8]) {

                        echo "<option selected='selected' value='$resultadoRegistro[8]'>
                            $resultadoRegistro[8] | $resultadoRegistro[7]
                        </option>";

                        $igual = $resultadoRegistro[8];

                    }

                    if($igual !== $resultadoRegistro[8]){
                        echo "<option value='$resultadoRegistro[8]'  >$resultadoRegistro[8] | $resultadoRegistro[7]</option>";
                    }
                }
                echo "</select>";

                echo "
                <p><div id=divLetrasCad><font class=produto_form_letras>Modelo</font></div></p>

                <p><input class=produto_form_input name=modelo value='$resultadoRegistro[4]'></p>

                <p><div id=divLetrasCad><font class=produto_form_letras>Kilometragem</font></div></p>

                <p><input class=produto_form_input name=kilometracao value='$resultadoRegistro[6]'></p>";


                    echo"<p><div id=divLetrasCad><font class=produto_form_letras>Foto</font></div></p>
                    <p><input class=produto_form_input type=file name=foto></p>
                <p><input type=submit class=produto_form_enviar value=Enviar></p>
                </form>";
                echo "<a href='veiculo_list.php'><button class=produto_form_btnvoltar>Voltar</button></a>";

                if(isset($id)){
                    echo "<a href='descricao_form.php?idVeh=$resultadoRegistro[0]'><button class=produto_form_btnDesc>Descrição</button></a>";
                }

                echo "</center>";
            ?>
        </div>
    </body>
</html>