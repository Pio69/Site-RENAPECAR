<?php
include('pagina.php');
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styleloko.css">
    </head>
    <body>
        <?php
        include ("conectar.php");
        
        $question = (isset($_GET['questionId']) ? $_GET['questionId'] : "");
        
        $sqlQuery = "SELECT * FROM faq where idFaq = $question;";
        
        $resultPag = $conn->query($sqlQuery) or die($conn->error);

        while($result = $resultPag->fetch_array()){
                $resultadoRegistro[0]=$result["perguntaPt"];    
                $resultadoRegistro[1]=$result["respostaPt"];
                $resultadoRegistro[2]=$result["idFaq"]; 
        }
        echo "<div class=div_faq_titulo_per>Duvidas mais frequentes</div>";

        echo "<div id=faq_duvida_produto>";

        echo "<div class=div_faq_duvida_dentro>"; 

        echo "<div class=div_faq_titulo_duv>$resultadoRegistro[0]</div>";
        echo "<div class=linha_horizontal_faq></div>";    
        echo "<p><div class=pergunta_duvida><font>$resultadoRegistro[1]</font></div>";
        echo "</p>";         
        echo "</div>";
        echo "</div>"; 
        ?>

    </body>
</html>