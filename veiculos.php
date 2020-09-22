<?php
    include("pagina.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Renapecar</title>
    </head>
<body>
    
    <div id=fundoVeiculo>
        
        <div id=tituloVeiculo>
            <font class="tituloVeiculos">Veiculos Encontrados</font>
        </div>
        
        <div id=fundoOpcoes>
            
            <div class=tituloOpcoes>
                <font class="tituloLetrasOpcoes">Marcas</font>
            </div>
            
            <div class=conteudoOpcoes>
                <?php  
                    include ("conectar.php");    

                    echo "<p>
                        <a href='veiculos.php'>Todas Marcas</a>
                        </p>";

                    $selectMarca = "select * from marca";

                    $resultMarca = $conn->query($selectMarca) or die($conn->error);

                    while($result = $resultMarca->fetch_array()) {

                        $resultadoRegistro[0] = $result["idMarca"];
                        $resultadoRegistro[1] = $result["nomeMarca"];

                        echo "<p>
                        <a href='veiculos.php?marca=$resultadoRegistro[0]'>$resultadoRegistro[1]</a>
                        </p>";
                    }
                ?>
            </div>
            
        </div>
        
        <?php

            $idMarca = (isset($_GET['marca']) ? $_GET['marca'] : "");

            $search = (isset($_GET['buscar']) ? $_GET['buscar'] : "");

            if(isset($_GET['buscar']) && $search == ""){
                header("location:veiculos.php");
            }


            if(isset($_GET['marca'])){

               $selectCarro = "select * from carro where marca_idMarca=$idMarca";

            }else if(isset($_GET['buscar'])){

               $selectCarro = "select * from renap.carro where nome like '%$search%'";

            }else{

               $selectCarro = "select * from renap.carro";

            }

            $resultCarro = $conn->query($selectCarro) or die($conn->error);

            echo "<div id=fundoCarros>";
            while($result = $resultCarro->fetch_array()){

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


                   echo "<a href='veiculo.php?id=".$resultadoRegistro[0]."'>
                                <div class=divVeiculo>
                                    <img src='imgs/carros/".$resultadoRegistro[5]."' height='180px' width='280px'/>
                                    <p><div id=veiculosNome><font id=veiculosFontNome>".$resultadoRegistro[1]."</font></div></p>
                                    <p><div id=veiculosPrecoAno><font id=veiculosAno>$resultadoRegistro[2]</font><font id=veiculosPreco>R$ ".number_format($resultadoRegistro[7], 2, ',', '.')."</font>


                                    </p></div>

                                </div>
                            </a>";    

             }
            echo "</div>";
        ?>
    </div>
</body>
</html>
