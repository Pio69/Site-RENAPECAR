<?php
    include("pagina.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Renapecar</title>
    </head>
    <div id="imgIndex">
        <img src="imgs/wall.png" height="100%" width="100%"/>
    </div>
    <div id='index_produtos'>
        <div id="conteudoPagPrinci">
            <div id=tituloIndex>VEICULOS EM DESTAQUE</div>
            <div class=linha_horizontal_index></div>
            <?php
            include ("conectar.php");

            $selectCarro = "select * from carro order by rand() limit 1,8";


            $resultCarro = $conn->query($selectCarro) or die($conn->error);

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
                                <p><div id=veiculosPrecoAno><font id=veiculosAno>$resultadoRegistro[2]</font><font id=veiculosPreco>R$ ".number_format($resultadoRegistro[7], 2, ',', '.')."</font></p></div>
                                
                            </div>
                        </a>";    

             }
            ?>
        </div>
    </div> 
    
    <footer>
        <div class="titulo_rodape">
            <font class="tituloRenape">Renapecar</font>
        </div>
        
        <div class="coluna-1">
            <h4>Informações</h4>
            <span class="l1">RenapeCar - Brasil  </span>
            <br>
            <span class="ln2">CEP 89259-590</span>
            <br>
            <span class="ln3">Rua Isidoro Pedri - 263 -  Jaraguá do Sul</span>
        </div>

        <div class="coluna-2">
            <h4 class="rodape-cont">Contato</h4>
            <span class="cl2_ln1"><font class="Fale_Conosco">Fale Conosco</font></span>
            <br>
            <span class="cl2_ln2">(47) 3241-2719</span>
            <br>
        </div>

        <div class="coluna-3">
            <h4 class="rodape-cont">Cliente</h4>
            <span class="cl3_ln1"><a href="Faq_list.php" class="Fale_Conosco"><font class="Fale_Conosco">Suporte</font></a> </span>
            <br>
            <span class="cl3_ln2"><a href="Faq_list.php" ><font class="Fale_Conosco">FAQ - Perguntas e Respostas</font></a></span>
            <br>
        </div>

        <div class="coluna-4">
            <h4>Redes Sociais</h4>
            <span class="cl4_ln1"><img src="imgs/FB.png"     width="40" height="40"></span>
            <span class="cl4_ln1"><img src="imgs/Wpp.png" width="40" height="40"></span>
            <span class="cl4_ln1"><img src="imgs/Twi.png" width="40" height="40"></span>
        </div>    
    </footer>
</html>
