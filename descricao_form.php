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
        <div class='usuario_form_produto'>
            <?php 

                if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
                    header("location:login.php?erro=permissao");
                }

                $id = (isset($_GET['idVeh']) ? $_GET['idVeh'] : "");

                $idDesc = (isset($_GET['idDesc']) ? $_GET['idDesc'] : "");

                if((isset($_GET['idDesc'])) || (isset($_GET['idVeh']))){
                    include ("conectar.php");

                    if((isset($_GET['idDesc'])) && (isset($_GET['idVeh']))){
                        $sqlQuery = "select * from descricao where idDesc = $idDesc";
                    }else if(isset($_GET['idVeh'])){
                        $sqlQuery = "select * from descricao where carro_idCarro = $id";
                    }

                    $resultDesc = $conn->query($sqlQuery) or die($conn->error);

                    if($result = $resultDesc->fetch_array()){

                        $resultadoRegistro[0] = $result["idDesc"];
                        $resultadoRegistro[1] = $result["itens"];

                    }else{
                         $resultadoRegistro[0] = $idDesc;
                         $resultadoRegistro[1] = "";    
                    }


                }else{
                    $resultadoRegistro[0] = "";
                    $resultadoRegistro[1] = "";
                }

                echo "<div class=div_desc_form><center>";

                if($idDesc != ""){ 
                    echo "<form id=user_form action=descricao_post.php?idVeh=$id&&idDesc=$idDesc method=post>"; 
                }else{
                    echo "<form id=user_form action=descricao_post.php?idVeh=$id method=post>";     
                }

                    echo "<div id=tituloDescForm>
                            <font class=descricao_titulo>Descrição</font>
                        </div>";
                    echo "<p>
                            <input id='descFormInput' name='itens' placeholder='item' value='$resultadoRegistro[1]'>
                         </p>";
                echo "<p>
                        <input id='descFormEnviar'  type=submit value=Enviar>
                    </p>
                    </center></form>";
                echo "<div id=LinhaHorizontalDescForm></div>
                      <center>";

                $sqlQuery = "select * from descricao where carro_idCarro = $id";

                $resultDesc = $conn->query($sqlQuery) or die($conn->error);

                while($result = $resultDesc->fetch_array()){
                    $idResultDesc = $result['idDesc'];

                  echo "<p>
                            <a href='descricao_form.php?idVeh=$id&&idDesc=$idResultDesc'><font id=veiculoDescItens>".$result['itens' ]."</font></a>
                        </p>";       
                }

                echo "<a href='veiculo_form.php?id=$id'><button id=descBtnVoltar>VOLTAR</button> </a>";

                echo "<a href='veiculo_list.php'><button id=descBtnFina>FINALIZAR</button> </a>";

                echo "</center></div>";  
            ?>
        </div>
    </body>

</html>