<?php
include('pagina.php');
?>
<html>
    <head>
        <style>
            #user_form{
                position: relative;
                top:40;    
            }
        </style>
    </head>
    <body>
        <div id='marca_form_produto'>
            <?php 
                $id = (isset($_GET['idMarca']) ? $_GET['idMarca'] : "");

                if(isset($_GET['idMarca'])){
                    include ("conectar.php");


                    if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
                        header("location:login.php?erro=permissao");
                    }

                    $sqlQuery = "select * from marca where idMarca =$id;";

                    $resultDesc = $conn->query($sqlQuery) or die($conn->error);

                    while($result = $resultDesc->fetch_array()){

                        $resultadoRegistro[0] = $id;
                        $resultadoRegistro[1] = $result["nomeMarca"];
                    }

                }else{
                    $resultadoRegistro[0] = "";
                    $resultadoRegistro[1] = "";
                }

                echo "<div class=div_marca_form>";
            
                echo "<form id=user_form action=marca_post.php?idMarca=$id method=post>"; 
            
                echo "<font class=descricao_titulo>Marca</font>";
            
                echo "<p><input id='descFormInput' name='marca' placeholder='Nome da marca' value='$resultadoRegistro[1]'></p>";
            
                echo "<p>
                    <a href='marca_list.php'><button id=marcaBtnVoltar>VOLTAR</button></a> 
                        <input id='usuario_form_enviar'  type=submit value=Enviar>
                    </p>
                    </form>";

                echo "</div>";  
            ?>
        </div>
    </body>

</html>