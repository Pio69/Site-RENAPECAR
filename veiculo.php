<?php
include("pagina.php");
?>
<html>
    <head>    
    </head>
    <body>
        <?php

            $id = (isset($_GET['id']) ? $_GET['id'] : "");

            if($id == ""){
                header("location:index.php");    
            }    

            include ("conectar.php"); 

            $selectCarro = "select * from carro where idCarro=".$id."";

            $resultCarro = $conn->query($selectCarro) or die($conn->error);

            $result = mysqli_fetch_assoc($resultCarro);

            $resultadoRegistro[0] = $result["idCarro"];
            $resultadoRegistro[1] = $result["nome"];
            $resultadoRegistro[2] = $result["ano"];
            $resultadoRegistro[3] = $result["modelo"];
            $resultadoRegistro[4] = $result["marca_idMarca"];
            $resultadoRegistro[5] = $result["foto"];
            $resultadoRegistro[6] = $result["kilometracao"];
            $resultadoRegistro[7] = $result["preco"];

            if($resultadoRegistro[5] == ""){
                $resultadoRegistro[5] = "veiculoPadrao.png";
            }

            echo "<div id=fotoVeiculo>
                <img width=850 height=550   src='imgs/carros/$resultadoRegistro[5]'>
            </div>
            ";

            echo "<div id=nomePreco>
                    <div id=nomeAnoKilo>
                        <font>".$resultadoRegistro[1]."</font>
                        <p>
                            <font id=anoKilo>".$resultadoRegistro[2]." - ".$resultadoRegistro[6]."km</font>
                        </p>
                    </div>
                    <div id=divPrecoVeiculo>
                        <font>R$ ".number_format($resultadoRegistro[7], 2, ',', '.')."</font>
                    </div>
                </div>
                <a href='proposta.php?idVeh=$id'>
                <div id=veiculoProposta>
                    <font>Fazer uma proposta</font>
                </div>
                </a>";

            $selectDesc = "select * from descricao where carro_idCarro=".$id."";

            $connDesc = $conn->query($selectDesc) or die($conn->error);

            echo "<div id=veiculoDescDiv>
             <div id=veiculoTituloDesc>Características</div>
                <div id=veiculoLinhaHorizontalDesc></div>";
            echo "<div id=veiculoCaract>";
                while($resultDesc = $connDesc->fetch_array()){
                    echo "<img width=15px height=15px   src='imgs/check.png'>
                    <font id=veiculoDescItens>  ".$resultDesc['itens' ]."  </font>";
                }
            echo "  </div>";
            echo "</div>";

        ?>    
    </body>
</html>
