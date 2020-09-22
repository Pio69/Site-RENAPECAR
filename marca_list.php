<?php
include ("pagina.php");
?>
<html>
    <head>
        <style>
            table {
                position: relative;
                bottom:10px;
            }
            th {
                width: 100px;
            }
        </style>
    </head>
    <body>
        <?php
            include ("conectar.php");

            echo "<div id=Usuario_produto>";

            echo "<div class=div_titulo_font>
                <font id=usuario_titulo>
                Lista de marcas
                </font>
            </div>";

            if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
                header("location:login.php?erro=permissao");
            }

            $selectMarca = "select * from marca";

            $resultMarca = $conn->query($selectMarca) or die($conn->error); 

            echo "<a href='homeAdmin.php'><button class=marcaBtnVoltar>VOLTAR</button></a> ";       
            echo "<a href='marca_form.php'><button class=marcaBtnVoltar>NOVO</button></a> ";       

            echo "<center><table border=1 id=tabela_usuario>";
            echo "<tr class=tr_usuario>";
            echo "<th>";
            echo "ID";
            echo "</th>";
            echo "<th>";
            echo "NOME";
            echo "</th>";
            echo "<th colspan=2>";
            echo "AÇÕES";
            echo "</th>";
            echo "</tr>";
           while($result = $resultMarca->fetch_array()){

                $resultadoRegistro[0]=$result["idMarca"];
                $resultadoRegistro[1]=$result["nomeMarca"];


                echo "<tr class=tr_usuario>";
                echo "<td>";
                echo $resultadoRegistro[0];
                echo "</td>";
                echo "<td bordercolor=black>";
                echo $resultadoRegistro[1];
                echo "</td>";
                echo "<td bordercolor=black>";
                echo "<a href='marca_form.php?idMarca=".$resultadoRegistro[0]."'><img src='imgs/lapis.png' height=40 width=40>";
                echo "</td>";
                echo "<td bordercolor=black>";
                echo "<a href='marca_delete.php?idMarca=".$resultadoRegistro[0]."'><img src='imgs/lixeira.png' height=40 width=40>";
                echo "</td>";
                echo "</tr>";

            }
            echo "</table></center>";


            echo"</div>";
        ?>

    </body>
</html>