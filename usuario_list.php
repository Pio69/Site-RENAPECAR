<?php
    include ("pagina.php");
?>
<html>
    <body>
        <?php
            include ("conectar.php");

            echo "<div id=Usuario_produto>";

            if(isset($_SESSION['idUsuario']) && $_SESSION['tipoUsuario'] != "admin"){
                header("location:login.php?erro=permissao");
            }

            $selectUser = "select * from usuario";

            $resultUser = $conn->query($selectUser) or die($conn->error);

            echo "<div class=div_titulo_font>
                <font id=usuario_titulo>
                Lista de usuários
                </font>
            </div>";


            echo "<a href='homeAdmin.php'><button id=usuario_btnback>VOLTAR</button> </a>";

            echo "<center><table border=1 id=tabela_usuario>";
            echo "<tr class=tr_usuario>";
            echo "<th>";
            echo "ID";
            echo "</th>";
            echo "<th>";
            echo "NOME";
            echo "</th>";
            echo "<th>";
            echo "LOGIN";
            echo "</th>";
            echo "<th>";
            echo "SENHA";
            echo "</th>";
            echo "<th colspan=2>";
            echo "AÇÕES";
            echo "</th>";
            echo "</tr>";
            while($result = $resultUser->fetch_array()){

                $resultadoRegistro[0]=$result["idUser"];
                $resultadoRegistro[1]=$result["nome"];
                $resultadoRegistro[2]=$result["login"];
                $resultadoRegistro[3]=$result["senha"];


                echo "<tr class=tr_usuario>";
                echo "<td>";
                echo $resultadoRegistro[0];
                echo "</td>";
                echo "<td bordercolor=black>";
                echo $resultadoRegistro[1];
                echo "</td>";
                echo "<td bordercolor=black>";
                echo $resultadoRegistro[2];
                echo "</td>";
                echo "<td bordercolor=black>";
                echo $resultadoRegistro[3];
                echo "</td>";
                echo "<td bordercolor=black>";
                echo "<a href='usuario_form.php?id=".$resultadoRegistro[0]."'><img src='imgs/lapis.png' height=40 width=40>";
                echo "</td>";
                echo "<td bordercolor=black>";
                echo "<a href='usuario_delete.php?id=".$resultadoRegistro[0]."'><img src='imgs/lixeira.png' height=40 width=40>";
                echo "</td>";
                echo "</tr>";

            }
            echo "</table></center>";


            echo"</div>";
        ?>

    </body>
</html>