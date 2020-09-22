<?php
    include ("pagina.php");
?>
<html>
	<head>
        <meta charset="utf-8">
	</head>
	<body>
        <?php
            include ("conectar.php");

            if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
                header("location:login.php?erro=permissao");
            }

            $sqlQuery = "select idCarro,nome,preco,ano,modelo,foto,kilometracao,marca.nomeMarca FROM renap.carro,renap.marca where marca.idMarca = marca_idMarca";

            $resultCar = $conn->query($sqlQuery) or die($conn->error);

            echo "<div id=produto_list>";

            echo "<div class=pag_produto_titulo>";      
            echo "<font id=titulo>LISTA DE VEICULOS</font><br><br>";
            echo "</div>";    

                    echo "<div class=pag_produto_button>";  
             echo "<a href='homeAdmin.php'><button class=produto_btnvoltar>VOLTAR</button></a> ";       
            echo "<a href='veiculo_form.php'><button class=produto_btnvoltar>NOVO</button></a> ";         
             echo "</div>";  

            echo "<center>"; 

            echo "<table id=tabela border=1px>";     
            echo "<tr>";
            echo "<th class=tab>";
            echo "<font class=thtable>id</font>";
            echo "</th>";
            echo "<th class=tab>";
            echo "<font class=thtable>foto</font>";
            echo "</th>"; 
            echo "<th class=tab>";
            echo "<font class=thtable>nome</font>";
            echo "</th>";
            echo "<th class=tab>";
            echo "<font class=thtable>preço</font>";
            echo "</th>";
            echo "<th class=tab>";
            echo "<font class=thtable>kilometração</font>";
            echo "</th>";
            echo "<th class=tab>";
            echo "<font class=thtable>ano</font>";
            echo "</th>";
            echo "<th class=tab>";
            echo "<font class=thtable>modelo</font>";
            echo "</th>";
            echo "<th class=tab>";
            echo "<font class=thtable>marca</font>";
            echo "</th>";
            echo "<th colspan=2  class=tab>";
            echo "<font class=thtable>ações</font>";
            echo "</th>";
            echo "</tr>";   
            while($result = $resultCar->fetch_array()) {

                $resultadoRegistro[0]=$result["idCarro"];
                $resultadoRegistro[1]=$result["nome"];
                $resultadoRegistro[2]=$result["preco"];
                $resultadoRegistro[3]=$result["kilometracao"];
                $resultadoRegistro[4]=$result["ano"];
                $resultadoRegistro[5]=$result["modelo"];
                $resultadoRegistro[6]=$result["nomeMarca"];
                $resultadoRegistro[7]=$result["foto"];
                if($resultadoRegistro[7] == ""){
                    $resultadoRegistro[7] = "produto.png";
                }   

                echo "<tr class=tr_tabela>";     
                echo "<td class=tab>";
                echo $resultadoRegistro[0];
                echo "</td>";
                echo "<td  class=tab >";
                echo "<img width=55 height=55 src='imgs/carros/$resultadoRegistro[7]'>";
                echo "</td>";
                echo "<td  class=tab >";
                echo "<a href=veiculo.php?id=$resultadoRegistro[0]>";
                echo $resultadoRegistro[1];
                echo "</a></td>";
                echo "<td  class=tab >";
                echo $resultadoRegistro[2];
                echo "</td>";
                echo "<td  class=tab >";
                echo $resultadoRegistro[3];
                echo "</td>";
                echo "<td  class=tab >";
                echo $resultadoRegistro[4];
                echo "</td>";
                echo "<td  class=tab >";
                echo $resultadoRegistro[5];
                echo "<td  class=tab >";
                echo $resultadoRegistro[6];
                echo "</td>";    
                echo "<td  class=tab >";
                echo "<a href='veiculo_form.php?id=".$resultadoRegistro[0]."'><img src='imgs/lapis.png' height=40 width=40></a>";
                echo "</td>";
                echo "<td  class=tab >";
                echo "<a href='veiculo_delete.php?id=".$resultadoRegistro[0]."'><img src='imgs/lixeira.png' height=40 width=40></a>";
                echo "</td>";
                echo "</tr>";

            }
            echo "</table>";
            echo"</center>"; 
            echo "</div>";
        ?>
    </body>
</html>